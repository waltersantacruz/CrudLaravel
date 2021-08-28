<template>
  <div>
    <button v-if="todas === 0" @click="verTodas();" type="button" class="btn btn-outline-primary">
                Ver todas las tareas
    </button>
    <button v-else @click="verTodas();" type="button" class="btn btn-outline-primary">
                Mis tareas
    </button>

    <div v-if="todas === 0">
        <mis-tareas v-bind:user="user" ></mis-tareas>
    </div>

    <!-- Consultar todas las tareas -->
    <div v-else>
        <consultar-tareas />
    </div>
  </div>
</template>

<script>
import MisTareas from './MisTareas.vue';
import ConsultarTareas from './TodasTareas.vue';


export default {
    components: { ConsultarTareas, MisTareas },
    props: ['user'],
    data(){
        return {
            todas: 0,
        } 
    },
    methods: {
        verTodas(){
            if(this.todas===0){
                this.todas=1;          
            }else{
                this.todas=0;
            }
        },
    }, 
}
</script>