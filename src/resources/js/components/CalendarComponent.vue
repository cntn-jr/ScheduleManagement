<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="col text-center">{{currentDate.month() + 1}}月</div>
                    </div>

                    <div class="card-body">
                        <table id="calendar-table" class="mx-auto my-4">
                            <thead>
                                <tr class="row">
                                    <td class="col px-4 py-3">日</td><td class="col px-4 py-3">月</td><td class="col px-4 py-3">火</td><td class="col px-4 py-3">水</td><td class="col px-4 py-3">木</td><td class="col px-4 py-3">金</td><td class="col px-4 py-3">土</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="row" v-for="(week, index) in getCalendar" :key="index">
                                    <td class="col p-4" v-for="(date, index) in week" :key="index">
                                        {{date}}
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
const moment = require('moment')

export default {
    data(){
        return {
            currentDate: moment(),
        }
    },
    method:{
    },
    computed:{
        getCalendar(){
            let calendarAry = [];
            let calendarAryByWeek = [];

            const startDayNum = moment().startOf('month').day();
            const beforeMonth = moment().add(-1, 'M');
            let lastDateNum = beforeMonth.endOf('month').date();
            for(let i = 0; i < startDayNum; i++){
                calendarAry.unshift(lastDateNum);
                lastDateNum--;
            }

            const endDate =  moment().endOf('month').date();
            for(let date = 1; date <= endDate; date++){
                calendarAry.push(date);
            }

            const endDayNum = moment().endOf('month').day();
            let nextMonthDate = 1;
            for(let i = endDayNum; i <  6; i++){
                calendarAry.push(nextMonthDate);
                nextMonthDate++;
            }

            const weekCount = calendarAry.length / 7;
            for(let i = 0; i < weekCount; i++){
                calendarAryByWeek.push(calendarAry.splice(0,7));
            }

            return calendarAryByWeek;
        }

    },
    mounted(){
    }
}
</script>

<style scoped>
    #calendar-table{
        border-collapse: collapse;
    }

    td,th{
        border: 2px solid #eee;
    }
</style>