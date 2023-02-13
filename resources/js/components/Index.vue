<template>
<div class="col-md-12 col-md-offset-0 text-left">
    <div class="row row-mt-15em">
        <div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
            <h1>Planning a Trip To Anywhere in Japan?</h1>	
        </div>
        <div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
            <div class="form-wrap">
                <div class="tab">
                    
                    <div class="tab-content">
                        <div class="tab-content-inner active" >
                            <h3>Choose a destination</h3>
                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label >City</label>
                                        <select class="form-control" v-model="city" >
                                            <option value="">Choose a city...</option>
                                            <option v-for="city in cities" :value="city.name">{{ city.name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label >Looking for?</label>
                                        <select class="form-control" v-model="place_filter"  @change="setPlaceName($event)">
                                            <option value="">Choose a place...</option>
                                            <option v-for="place in places_filters" :value="place.filter_code" >{{ place.filter_name }}</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <!-- <input type="submit" class="btn btn-primary btn-block" value="Submit"> -->
                                        <button v-if="submit" @click.prevent="handleSubmit" class="btn btn-primary btn-block" style="color: white;">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>	
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>

export default {
    name: 'index',
    data(){
        return {
            cities        : [],
            places_filters: [],
            city          : "",
            place_filter  : "",
            place_name    : "",
            submit        : false
        }
    },

    watch: {
        place_filter(){
            if(this.city.length > 0 && this.place_filter.length > 0)
                this.submit = true;
        }
    },

    mounted(){
        this.getCities();
        this.getFilters();
    },
    methods:{
        getCities(){
            this.axios.get('/api/cities')
            .then(response=>{
                this.cities = response.data;
            }).catch(error=>{
                console.log(error)
            })
        },
        getFilters(){
            this.axios.get('/api/places_filters')
            .then(response=>{
                this.places_filters = response.data;
            }).catch(error=>{
                console.log(error)
            })
        },
        handleSubmit() {
            this.$router.push({
                name: "map",
                query: { city: this.city, place_filter: this.place_filter, place_name: this.place_name }
            });
        },
        setPlaceName(e){
            this.place_name = e.target.options[e.target.options.selectedIndex].text;
        }

    }
}
</script>
