<template>
    <div>
        <div v-if="isSchedule" class="is-schedule text-success text-truncate mt-2">
            予定あり
        </div>
    </div>
</template>

<script>
const moment = require('moment')

export default {
    data(){
        return{
            // isSchedule: true
        }
    },
    methods:{
    },
    computed:{
        isSchedule(){
            const strDate = String(this.year) + '-' + String(this.month) + '-' + String(this.date);
            const calendarDate = moment(strDate);
            for(let key in this.schedules){
                let scheduledDate = moment(this.schedules[key].scheduledDate);
                if(
                    calendarDate.year() === scheduledDate.year() &&
                    calendarDate.month() === scheduledDate.month() &&
                    calendarDate.date() === scheduledDate.date()
                ){
                    return true;
                }
            }
            return false;
        }
    },
    mounted(){
    },
    props: ["schedules", "year", "month", "date"],
}
</script>

<style scoped>
.is-schedule{
    width: 80px;
    height: 40px;
    font-size: 0.8em;
}
</style>