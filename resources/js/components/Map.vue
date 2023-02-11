<template>
<div class="col-md-12 col-md-offset-0 text-left">
    <div class="row mt-3" >
        <div class="col-md-8 animate-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-wrap">
                        <div class="tab">
                            <div class="tab-content">
                                <MapComponent 
                                    :marker_coords="marker_coords" 
                                    :places="places" 
                                    :city_info="city_info" 
                                    :lon="lon" 
                                    :lat="lat" 
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <Weather 
                        :weather="weather" 
                    />
                </div>
            </div>
        </div>
        <div class="col-md-4 animate-box">
            <div class="form-wrap place-box-overflow">
                <div class="tab">
                    <div class="tab-content">
                        <div class="tab-content-inner active" >
                            <h3>Choose a {{ place_name }} in {{ city }}</h3>
                                <PlacesList 
                                    :places="places" 
                                    @coordinates="getMarkerCoordinates"
                                />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import MapComponent from '../components/MapComponent.vue';
import Weather from '../components/Weather.vue';
import PlacesList from '../components/PlacesList.vue';
export default {
    name: 'map',
    data(){
        return {
            city         : "",
            place_filter : "",
            place_name   : "",
            city_info    : [],
            places       : [],
            lon          : 0,
            lat          : 0,
            weather      : [],
            marker_coords: []
        }
    },
    components: {
        Weather,
        MapComponent,
        PlacesList
    },  
    watch: {
        place_filter(){
            this.getCity();
        },
        city_info(){
            this.getPlaces();
        },
        city(){
            this.getWeather();
        }
    },
    mounted(){
        this.city         = this.$route.query.city;
        this.place_filter = this.$route.query.place_filter;
        this.place_name   = this.$route.query.place_name;
    },
    methods:{
        handleSampleFunction(s){
            this.sample = s;
        },
        getMarkerCoordinates(coordinates){
            this.marker_coords = coordinates;
        },
        getCity(){
            this.axios.get('/api/cities/' + this.city)
            .then(response=>{
                this.city_info = response.data;
                this.lon = response.data.features[0].geometry.coordinates[0];
                this.lat = response.data.features[0].geometry.coordinates[1];
            }).catch(error=>{
                console.log(error)
            })
        },

        getPlaces(){
            this.axios.get('/api/places', {params: {
                category: this.place_filter,
                lon     : this.lon,
                lat     : this.lat
            }})
            .then(response=>{
                this.places = response.data.features;
                
            }).catch(error=>{
                console.log(error)
            })
        },

        getWeather(){
            this.axios.get('/api/weather', {params: {
                city: this.city,
            }})
            .then(response=>{
                this.weather = response.data;
                
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>