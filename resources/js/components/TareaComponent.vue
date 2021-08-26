<template>
  <div>
      <h1 class="text-center">Administracion de tareas</h1>
      <hr>
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
                    <button class="btn btn-warning">Editar</button>
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
    data(){
        return {
            tareas: [],
        }
    
    },
    methods: {
        async list(){
            const res = await axios.get('tareas');
            this.tareas=res.data;
        },
        async erase(id){
            const res = await axios.delete('tareas/'+id);
            this.list();
        }
    },
    created(){
        this.list();
    }
       
}
</script>
