<template>
    <div>
        <button type="button" class="btn btn-danger mr-4" @click="show">削除</button>
        <div class="card" v-show="showModal">
            <div class="card-body rounded" id="modal-box">
                <form :action="'/schedule/' + schedule_id" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="_method" value="delete">
                    <h5 class="card-title text-left">確認</h5>
                    <p class="card-text text-center">本当に削除してもよろしいですか？</p>
                    <button type="submit" class="btn btn-primary">削除</button>
                    <button class="btn btn-primary" type="button" @click="exit">戻る</button>
                </form>
            </div>
        </div>
        <div id="back" v-show="showModal">
        </div>
    </div>
</template>

<script>

export default {
    data(){
        return{
            showModal: false,
        }
    },
    methods:{
        show(){
            this.showModal = true;
        },
        exit(){
            this.showModal = false;
        }
    },
    computed:{
    },
    mounted(){
    },
    props: ['schedule_id', 'csrf'],
}
</script>

<style scoped>
    #back{
        z-index: 1;
        height: 150%;
        width: 150%;
        top: 0;
        left: 0;
        background: #000;
        opacity: 0.7;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #modal-box{
        position: fixed;
        z-index: 2;
        background: #ddd;
        width: 30%;
        top: 30%;
        left: 35%;
    }
</style>