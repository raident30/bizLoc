<template>
   <div v-for="place in placesArr" class="row ">
        <div class="col-md-12">            
            <div class="thumbnail place-box-button" @click.prevent="handleClick(place.geometry.coordinates[0], place.geometry.coordinates[1])">
                <div class="caption">
                    <h4>{{ place.properties.address_line1 }}</h4>
                    <p>{{ place.properties.address_line2 }}</p>
                </div>
            </div>
        </div>
   </div>
</template>

<script>
export default {
    name: "PlacesList",
    data(){
        return {
            placesArr: [],
            longitude: null,
            latitude : null,
            isActive : false
        }
    },
    props: [
        'places'
    ],
    watch: {
        places: function(new_value) { 
            this.init();
        },
    },
    mounted() {

    },
    methods:{
        init(){
            this.placesArr = this.places
        },

        handleClick(long, lat){
            let coordinates = {
                long: long,
                lat: lat
            };
            this.isActive = false
            this.$emit("coordinates", coordinates);
        }
    }
}
</script>