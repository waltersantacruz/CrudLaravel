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
            </tr>
        </thead>
        <tbody>
            <tr v-for="tarea in tareas" :key="tarea.id">
            <th scope="row">{{ tarea.id }}</th>
            <td>{{ tarea.title }}k</td>
            <td>{{ tarea.description }}</td>
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
        }
    },
    created(){
        this.list();
    }
       
}
</script>
