<template>
  <div>
      <h1 class="text-center">Mis Tareas</h1>
      <hr>
      <button type="submit" class="btn btn-primary">Crear Tarea</button>
      <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Título</th>
            <th scope="col">Descripción</th>
            <th scope="col" colspan="2" classes="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="tarea in tareas" :key="tarea.id">
            <th scope="row">{{ tarea.id }}</th>
            <td>{{ tarea.title }}k</td>
            <td>{{ tarea.description }}</td>
            <td>
                <button classes="btn btn-warning">Editar</button>
            </td>
            <td>
                <button @click="erase(tarea.id)" classes="btn btn-danger">Eliminar</button>
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
    mounted(){
        this.list();
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
    

       
}
</script>
