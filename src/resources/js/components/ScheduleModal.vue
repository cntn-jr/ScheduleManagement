<template>
    <div>
        <transition name="modal" appear>
            <div class="card modal-box">
                <div class="card-header bg-primary text-white">{{year}}/{{month}}/{{date.date}}の予定</div>

                <div class="card-body">
                    <div class="mt-2 mb-4 text-right">
                        <a class="btn btn-outline-danger btn-sm rounded-pill" href="/schedule/create">
                            ＋予定追加
                        </a>
                    </div>
                    <div class="mb-5">
                        <schedule-list :schedules='getDaySchedules' :at-time="year+'/'+month+'/'+date.date"></schedule-list>
                    </div>
                </div>
            </div>
        </transition>
        <div id="modal-bg" @click="exitModal"></div>
    </div>
</template>

<script>
import ScheduleList from './ScheduleList.vue';
const moment = require('moment')
export default {
    components:{
        ScheduleList
    },
    data(){
        return {}
    },
    methods:{
        exitModal(){
            this.$emit('exitModal', false);
        }
    },
    computed:{
        getDaySchedules(){
            const daySchedules = [];
            const strDate = String(this.year) + '-' + String(this.month) + '-' + String(this.date.date);
            const calendarDate = moment(strDate);
            for(let key in this.schedules){
                let scheduledDate = moment(this.schedules[key].scheduledDate);
                if(
                    calendarDate.year() === scheduledDate.year() &&
                    calendarDate.month() === scheduledDate.month() &&
                    calendarDate.date() === scheduledDate.date()
                ){
                    daySchedules.push(this.schedules[key]);
                }
            }
            return daySchedules;
        }
    },
    created(){
        console.log(this.getDaySchedules);
    },
    props:['schedules', "year", "month", "date"]
}
</script>

<style scoped>
    .modal-box{
        position: fixed;
        z-index: 2;
        width: 40%;
        height: 40%;
        top: 20%;
        left: 30%;
        border-radius: .5rem;
        overflow: scroll;
        border: 1px solid #ccc;
    }
    #modal-bg{
        z-index: 1;
        height: 150%;
        width: 150%;
        top: 0;
        left: 0;
        background: #ddd;
        opacity: 0.4;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .modal-enter{
    opacity: 0;
    transform: translateY(-20px);
    }
    .modal-leave{
        opacity: 0;
    }
    .modal-enter-active{
        transition: opacity 300ms ease-in, transform 300ms ease-in;
    }
    .modal-leave-active{
        transition: opacity 500ms ease-out, transform 500ms ease-out;
    }
    .modal-leave-to{
        opacity: 0;
        transform: scale(1);
    }
</style>