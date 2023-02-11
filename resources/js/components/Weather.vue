<template>

    <!-- <h3>Weather</h3>
    {{ weather }} -->
    <div class="weather-wrapper">
    <div class="weather-card">
        <div class="weather-icon" :class="iconClass"></div>
        <h1 style="color: gray;">{{temperature}}º</h1>
        <p>{{ weather.name }}</p>
    </div>
</div>

</template>

<script>
export default {
    name: "Weather",
    data(){
        return {
            cityName : "",
            iconClass: "sun",
            temperature: 0
        }
    },
    components: {
        
    },
    props: [
        'weather'
    ],
    watch:{
        weather(){
            this.setUpWeatherData();
        }
    },
    mounted() {

    },
    methods:{
        setUpWeatherData(){
            let skyStat          = this.weather.weather[0].main;
                skyStat          = skyStat.toLowerCase();
                this.temperature = Math.round(this.weather.main.temp);
            
            if(skyStat == "clouds")
                this.iconClass = "cloud";
            else if(skyStat == "rain")
                this.iconClass = "rain";
            else
                this.iconClass = "sun";
            
            
            
        }
    }
}
</script>
<style lang="scss">
@import "../../css/app.scss";
</style>