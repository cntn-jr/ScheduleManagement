<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <button class="page-link text-reset ml-5" @click="reduceMonth">&laquo;</button>
                            <div class="col text-center mt-2">{{currentDate.year()}}年 {{currentDate.month() + 1}}月</div>
                            <button class="page-link text-reset mr-5" @click="addMonth">&raquo;</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- <div v-for="(schedule, key) in schedules" :key="key">
                            {{schedule.title}}
                        </div> -->
                        <table id="calendar-table" class="mx-auto my-4">
                            <thead>
                                <tr class="row">
                                    <td class="col text-primary text-center py-2">日</td><td class="col text-center py-2">月</td><td class="col text-center py-2">火</td><td class="col text-center py-2">水</td><td class="col text-center py-2">木</td><td class="col text-center py-2">金</td><td class="col text-center py-2 text-danger">土</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="row" v-for="(week, index) in calendar" :key="index">
                                    <td v-for="(date, index) in week" :key="index" class="col date-box">
                                        <span :class="date.class">{{date.date}}</span>
                                        <is-schedule :schedules="schedules" :year="currentDate.year()" :month="currentDate.month() + 1" :date="date.date"></is-schedule>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import IsSchedule from './IsSchedule.vue';
const moment = require('moment')

export default {
    components: { IsSchedule },
    data(){
        return {
            currentDate: moment(),
        }
    },
    methods:{
        getCalendar(){
            let calendarAry = [];
            let calendarAryByWeek = [];
            const currentDate = this.currentDate;

            const startDayNum = currentDate.startOf('month').day();
            const beforeMonth = currentDate.add(-1, 'M');
            let lastDateNum = beforeMonth.endOf('month').date();
            for(let i = 0; i < startDayNum; i++){
                calendarAry.unshift({ date: lastDateNum, class: 'notThisMonth' });
                lastDateNum--;
            }

            currentDate.add(1, 'M');
            const endDate =  currentDate.endOf('month').date();
            for(let date = 1; date <= endDate; date++){
                if(currentDate.month() == moment().month() && date === moment().date()){
                    calendarAry.push({ date: date, class: 'today' } );
                }else{
                    calendarAry.push({ date: date, class: '' } );
                }
            }

            const endDayNum = currentDate.endOf('month').day();
            let nextMonthDate = 1;
            for(let i = endDayNum; i <  6; i++){
                calendarAry.push({ date: nextMonthDate, class: 'notThisMonth' });
                nextMonthDate++;
            }

            const weekCount = calendarAry.length / 7;
            for(let i = 0; i < weekCount; i++){
                const week = calendarAry.splice(0,7);
                week[0].class += ' text-primary';
                week[6].class += ' text-danger';
                calendarAryByWeek.push(week);
            }

            return calendarAryByWeek;
        },
        addMonth(){
            this.currentDate = moment(this.currentDate).add(1, 'M');
            this.getCalendar();
        },
        reduceMonth(){
            this.currentDate = moment(this.currentDate).add(-1, 'M');
            this.getCalendar();
        },
    },
    computed:{
        calendar(){
            return this.getCalendar();
        }
    },
    mounted(){
        console.log(this.schedules);
    },
    props: ["schedules"],
}
</script>

<style scoped>
    #calendar-table{
        border-collapse: collapse;
    }

    td,th{
        border: 2px solid #eee;
        height: 50px;
        width: 100px;
    }
    .notThisMonth{
        opacity: 0.4;
    }
    .today{
        font-weight: bold;
        font-size: 1.2em;
    }
    .date-box{
        width: 100px;
        height: 100px
    }
</style>