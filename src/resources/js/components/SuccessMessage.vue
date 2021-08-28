<template>
    <div>
        <transition name="fade">
            <div v-show="is_show" class="alert alert-success text-center">
                {{ message }}
                <button type="button" class="close" @click="close_message">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data(){
        return{
            is_show : false,
        }
    },
    methods:{
        close_message(){
            this.is_show = false;
        }
    },
    computed:{
    },
    mounted(){
        if(this.message){
            this.is_show = true;
        }
    },
    props: ["message"],
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>