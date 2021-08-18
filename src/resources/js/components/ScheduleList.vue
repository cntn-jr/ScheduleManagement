<template>
    <div>
        <div v-if="isSchedules" class="">
            <table class="table table-borderless">
                <tr v-for="(schedule, index) in schedules" :key="index">
                    <td class="col text-center">
                        <h5>{{schedule.title}}</h5>
                    </td>
                </tr>
            </table>
        </div>
        <div v-else>
            <p class="alert alert-warning text-center my-4">今日の予定はありません</p>
        </div>
    </div>
</template>

<script>
const moment = require('moment')

export default {
    data(){
        return{
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
        }
    },
    mounted(){
    },
    props: ["schedules"],
}
</script>

<style scoped>
</style>