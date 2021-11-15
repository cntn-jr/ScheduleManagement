<template>
    <div>
        <div v-if="weatherData">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item flex-fill daily-box">
                    <p class="text-center text-line">日時</p>
                    <p class="text-center weather-img">
                    </p>
                    <p class="text-center text-line">天気</p>
                    <p class="text-center text-danger text-line">最高気温</p>
                    <p class="text-center text-primary text-line">最低気温</p>
                    <p class="text-center text-secondary text-line">降水確率</p>
                </li>
                <li class="list-group-item flex-fill daily-box" v-for="(weather, index) in weatherData['daily']" :key="index">
                    <p class="text-center text-line">{{dates[index]}}</p>
                    <p class="text-center weather-img"><img :src="`http://openweathermap.org/img/w/${weather['weather'][0]['icon']}.png`"></p>
                    <p class="text-center text-line">{{weather['weather'][0]["description"]}}</p>
                    <p class="text-center text-danger text-line">{{Math.round(weather['temp']["max"])}}℃</p>
                    <p class="text-center text-primary text-line">{{Math.round(weather['temp']["min"])}}℃</p>
                    <p class="text-center text-secondary text-line">
                        {{Math.round(weather['pop'] * 10) * 10}}％
                    </p>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    data(){
        return{
            search: '',
            weatherData: null,
            lat: null,
            lon: null,
            apiUrl: 'http://api.openweathermap.org/data/2.5/onecall',
            apiKey:'69b5c460238e603abf7d863af98e301f',
        }
    },
    methods:{
        getLocation() {
            navigator.geolocation.getCurrentPosition(position => {
                console.log('position: ', position);
                this.lat = position.coords.latitude
                this.lon = position.coords.longitude
                this.getWeatherByCoords()
            })
        },
        getWeatherByCoords() {
            this.$axios.get(`${this.apiUrl}?lat=${this.lat}&lon=${this.lon}&appid=${this.apiKey}&units=metric&lang=ja&exclude=current,hourly,minutely`)
        　　　　.then(response => {
                this.weatherData = response.data
                console.log(this.weatherData);

            })
        },
    },
    computed:{
    },
    mounted(){
        this.getLocation();
    },
    props: ['dates'],
}
</script>

<style scoped>
    .text-line{
        height: 3em;
    }
    .weather-img{
        height: 6em;
    }
    .daily-box{
        width: 8em;
    }
</style>