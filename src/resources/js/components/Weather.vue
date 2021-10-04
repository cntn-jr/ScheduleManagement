<template>
    <div>
        <div class="card mt-3 mx-auto text-center text- bg-light" style="max-width: 18rem;" v-if="weatherData">
            <div class="card-header bg-transparent">{{weatherData['name']}}</div>
            <div class="card-body">
                <p class="card-title">{{weatherData['weather'][0]['description']}}</p>
                <p class="card-text">
                    <img :src="`http://openweathermap.org/img/w/${weatherData['weather'][0]['icon']}.png`">
                </p>
            </div>
            <div class="card-footer bg-transparent">{{weatherData['main']['temp']}}℃</div>
        </div>
        <div v-if="weatherData">
            <img :src="`http://openweathermap.org/img/w/${weatherData['weather'][0]['icon']}.png`">
            <ul v-for="(w,index) in weatherData" :key="index">
                <li>{{index}}:{{w}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            search: '',
            weatherData: null,
            lat: null,
            lon: null,
            apiUrl: 'http://api.openweathermap.org/data/2.5/weather',
            // apiUrl: 'http://api.openweathermap.org/data/2.5/forecast',
            apiKey:'69b5c460238e603abf7d863af98e301f',
        }
    },
    methods:{
        getLocation() {
            navigator.geolocation.getCurrentPosition(position => {
                console.log('position: ', position);
                // console.log(this.apiUrl);
                // console.log(this.$axios);
                this.lat = position.coords.latitude
                this.lon = position.coords.longitude
                this.getWeatherByCoords()
            })
        },
        getWeatherByCoords() {
            this.$axios.get(`${this.apiUrl}?lat=${this.lat}&lon=${this.lon}&appid=${this.apiKey}&units=metric&lang=ja`)
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
    props: [],
}
</script>

<style scoped>
</style>