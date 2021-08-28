<template>
  <div>
          <!-- Tareas propias -->
          <div class="text-center">
                <h1>Mis Tareas</h1>
                <hr>
                <!-- Button trigger modal -->
                <button @click="modificar=false; openModal();" type="button" width="20px" class="btn btn-primary btn-lg btn-block my-4">
                Nueva Tarea
                </button>
          </div>
        

            <!-- Modal -->
            <div class="modal fade" :class="{show: modal}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{titleModal}}</h4>
                        <button @click="closeModal();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="my-4">
                            <label for="title">Título</label>
                            <input v-model="tarea.title" type="text" class="form-control" id="title" placeholder="Título de la tarea">
                        </div>

                        <div class="my-4">
                            <label for="description">Descripción</label>
                            <input v-model="tarea.description" type="text" class="form-control" id="description" placeholder="Descripción de la terea">
                        </div>
                        <div class="my-4">
                            <label for="finished">Tarea Finalizada</label>
                            <select v-model="tarea.finished" id="finished" name="finished">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="my-4">
                            <label for="description">Fecha de vencimiento</label>
                            <datepicker  v-model="tarea.due_date" :format="customDate"></datepicker>
                            
                            <!--<input v-model="tarea.due_date" type="text" class="form-control" id="due_date" placeholder="fecha de vencimiento">-->
                        </div>
                        


                    </div>
                    <div class="modal-footer">
                        <button @click="closeModal(); mostrar();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="save();" type="button" class="btn btn-primary">Save</button>
                    </div>
                    </div>
                </div>
            </div>

        <!-- Tabla de tareas -->
        <table class="table" id="tablaMisTareas">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de vencimiento</th>
                <th scope="col" colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tarea in tareas" :key="tarea.id">
                    <th scope="row">{{ tarea.id }}</th>
                    <td>{{ tarea.title }}</td>
                    <td>{{ tarea.description }}</td>
                    <td v-if="tarea.finished === 0"> En proceso </td>
                    <td v-else> Finalizada </td>
                    <td>{{ tarea.due_date }}</td>
                    <div class="text-center">
                        <td>
                            <button @click="modificar=true; openModal(tarea);" class="btn btn-warning">Editar</button>
                        </td>
                        <td>
                            <button @click="erase(tarea.id)" class="btn btn-danger">Eliminar</button>
                        </td>
                    </div>
                </tr>
                
            </tbody>
        </table>
    </div>
</template>


<script>
import datepicker from 'vuejs-datepicker'
import moment from 'moment'

export default {
    components:{
        datepicker
    },
    props: ['user'],
    data(){
        return {
            tarea:{
                title:'',
                description:'',
                finished:0,
                due_date:'hola',
                user_id: this.user.id
                
            },
            id:0,
            modificar:true,
            modal: 0,
            titleModal: ' ',
            tareas: [],
        }
    
    },
    methods: {
        customDate(date){
            return this.tarea.due_date = moment(this.tarea.due_date).format('YYYY-MM-DD');     
        },

        //mostrar tareas
        async list(){
            const res = await axios.get('tareas/consultar?id='+this.user.id); //lista las tareas
            this.tareas=res.data;
            
        },

        //borrar tareas
        async erase(id){
            const res = await axios.delete('tareas/borrar/'+id); //borra la tarea del id ingresado
            this.list();
        },

        mostrar(){
            console.log(this.tarea.due_date);
        },
        //crear tareas
        async save(){
            const fin = parseInt(this.tarea.finished, 10)
            const params ={
                title: this.tarea.title,
                description: this.tarea.description,
                finished: fin,
                due_date: this.tarea.due_date,
                user_id: this.tarea.user_id
            }
            if(this.modificar){
                const res = await axios.put('tareas/actualizar/'+this.id, this.tarea);
            }else{
                const res = await axios.post('tareas/crear', params); //guardar una tarea
            }
            this.closeModal();
            this.list();
        },

        //abrir modal para editar o crear tarea
        openModal(data={}){
            this.modal = 1;
            if(this.modificar){
                this.titleModal='Editar Tarea'
                this.id=data.id
                this.tarea.title=data.title,
                this.tarea.description=data.description,
                this.tarea.finished=data.finished,
                this.tarea.due_date=data.due_date
            }else{
                this.titleModal='Crear Tarea'
                this.tarea.title='',
                this.tarea.description='',
                this.tarea.finished=0,
                this.tarea.due_date=''    
            }   
        },

        //cerrar Modal
        closeModal(){ 
            this.modal = 0;
        },
    },
    created(){
        this.list();
    }   
       
}
</script>


<style>
.show{
    display: list-item;
    opacity: 1;
    background: rgba(117, 120, 167, 0.8);
}
</style>