<template>
    <div>
        <div v-if="isSchedules" class="">
            <table class="table table-borderless">
                <tr v-for="(schedule, index) in schedules" :key="index">
                    <td class="col text-center">
                        <h4 class="text-left ml-2 mt-2"><a :href="link + schedule.id">{{schedule.title}}</a></h4>
                        <div class="col my-3">
                            {{schedule.content}}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div v-else>
            <p class="alert alert-warning text-center my-4">{{atTime}}の予定はありません</p>
        </div>
    </div>
</template>

<script>
const moment = require('moment')

export default {
    data(){
        return{
            link: '/schedule/',
        }
    },
    methods:{
    },
    computed:{
        isSchedules(){
            if(this.schedules.length === 0){
                return false;
            }
            return true;
        },
    },
    mounted(){
    },
    props: ["schedules", "atTime",],
}
</script>

<style scoped>
    a{
        color: #2c3e50;
        text-decoration-color: #bdc3c7;
    }
    td{
        border-bottom: solid gainsboro 0.5px;
    }
</style>