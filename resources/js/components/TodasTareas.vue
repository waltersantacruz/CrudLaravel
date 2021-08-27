<template>
    <div> 
      <h1 class="text-center">Todas las tareas</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de vencimiento</th>
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
                </tr>
                
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            tareas: [],
        }
        
    },
    methods:{

        async list(){
            const res = await axios.get('tareas/consultar'); //lista las tareas
            this.tareas=res.data;
        },
    },
    created(){
        this.list();
    }
}
</script>
