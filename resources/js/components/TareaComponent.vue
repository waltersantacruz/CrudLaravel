<template>
  <div>
      <h1 class="text-center">Administracion de tareas</h1>
      <hr>
        <!-- Button trigger modal -->
        <button @click="modificar=false; openModal();" type="button" class="btn btn-primary my-4">
        Nueva Tarea
        </button>

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
                        <input v-model="tarea.title"type="text" class="form-control" id="title" placeholder="Título de la terea">
                    </div>

                    <div class="my-4">
                        <label for="description">Descripción</label>
                        <input v-model="tarea.description"type="text" class="form-control" id="description" placeholder="Descripción de la terea">
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
                        <input v-model="tarea.due_date" type="text" class="form-control" id="description" placeholder="fecha de vencimiento">
                    </div>
                    


                </div>
                <div class="modal-footer">
                    <button @click="closeModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button @click="save();"type="button" class="btn btn-primary">Save</button>
                </div>
                </div>
            </div>
        </div>


      <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Título</th>
            <th scope="col">Descripción</th>
            <th scope="col" colspan="2" class="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="tarea in tareas" :key="tarea.id">
                <th scope="row">{{ tarea.id }}</th>
                <td>{{ tarea.title }}k</td>
                <td>{{ tarea.description }}</td>
                <td>
                    <button @click="modificar=true; openModal(tarea);" class="btn btn-warning">Editar</button>
                </td>
                <td>
                    <button @click="erase(tarea.id)" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            
        </tbody>
    </table>
  </div>
</template>

<script>
export default {
    props: ['user'],
    data(){
        return {
            tarea:{
                title:'',
                description:'',
                finished:0,
                due_date:'2019-06-08',
                user_id: this.user.id
                
            },
            modificar:true,
            modal: 0,
            titleModal: ' ',
            tareas: [],
        }
    
    },
    methods: {
        async list(){
            const res = await axios.get('tareas/consultar'); //lista las tareas
            this.tareas=res.data;
        },

        async erase(id){
            const res = await axios.delete('tareas/'+id); //borra la tarea del id ingresado
            this.list();
        },

        async save(id){
            const fin = parseInt(this.tarea.finished, 10)
            const params ={
                title: this.tarea.title,
                description: this.tarea.description,
                finished: fin,
                due_date: this.tarea.due_date,
                user_id: this.tarea.user_id
            }
            if(this.modificar){

            }else{
                console.log(params)
                const res = await axios.post('tareas/crear', params); //guardar una tarea
            }
            console.log('sali al else')
            this.closeModal();
            this.list();
        },
        async openModal(data={}){ //abre el modal
            this.modal = 1;
            if(this.modificar){
                this.titleModal='Editar Tarea'
                this.tarea.title=data.title,
                this.tarea.description=data.description,
                this.tarea.finished=data.finished,
                this.tarea.due_date=data.due_date
            }else{
                this.titleModal='Crear Tarea'
                this.tarea.title='',
                this.tarea.description='',
                this.tarea.finished=0,
                this.tarea.due_date=data.due_date    
            }
        },
        async closeModal(){ //cierra el modal
            this.modal = 0;
        }
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
    background: rgba(44,38,75,0.8);
}
</style>
