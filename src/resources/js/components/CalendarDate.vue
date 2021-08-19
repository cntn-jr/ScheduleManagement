<template>
    <div>
        <a v-bind:href="link">
            <div class="date-box col">
                <span :class="date.class">{{date.date}}</span>
                <div v-if="isSchedule" class="is-schedule text-truncate mt-2">
                    予定あり
                </div>
            </div>
        </a>
    </div>
</template>

<script>
const moment = require('moment')

export default {
    data(){
        return{
            link: '/calendar/' + this.year + '/' + this.month + '/' + this.date.date
        }
    },
    methods:{
    },
    computed:{
        isSchedule(){
            const strDate = String(this.year) + '-' + String(this.month) + '-' + String(this.date.date);
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

.notThisMonth{
    opacity: 0.4;
}

.sunday{
    color: #3498db;
}

.saturday{
    color: #e74c3c;
}

.weekday{
    color: #2c3e50;
}

.today{
    font-weight: bold;
    font-size: 1.2em;
    color: #e67e22;
}

.date-box{
    width: 100px;
    height: 100px
}

.is-schedule{
    width: 80px;
    height: 40px;
    font-size: 0.8em;
}

a{
    color: #2ecc71;
    text-decoration-color: #bdc3c7;
}

</style>