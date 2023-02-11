<template>
    <div class="map-container" ref="mapID"></div>
</template>

<script>
import maplibre from 'maplibre-gl';
export default {
    name: "MapComponent",
    data(){
        return {
            map       : {},
            marker    : {},
            longitude : 0,
            latitude  : 0,
            placesData: []
        }
    },
    props: [
        'places', 'city_info', 'lon', 'lat', 'marker_coords'
    ],
    watch: {
        lon: function(new_value) { 
            this.init();
        },
        marker_coords: function(new_value) { 
            this.longitude  = this.marker_coords.long;
            this.latitude   = this.marker_coords.lat;
            this.getInitialMap(true);
        },
    },
    mounted(){
        
    },
    methods: {
        init(){
            this.longitude  = this.lon
            this.latitude   = this.lat
            this.placesData = this.places
            this.getInitialMap();
            
        },
        getInitialMap(remove = false) {
            const myAPIKey = import.meta.env.VITE_API_KEY;
            const mapStyle = import.meta.env.VITE_MAP_STYLE_URL;
            
            if(remove)
                this.map.remove();

            this.map = new maplibre.Map({
                container: this.$refs.mapID,
                style: `${mapStyle}?apiKey=${myAPIKey}`,
                center: [this.longitude, this.latitude],
                zoom: 10,

            });
            this.map.scrollZoom.disable();
            this.map.doubleClickZoom.disable();
            if(this.marker_coords.long){
                this.marker = new maplibre.Marker({offset: [10,10]})
                    .setLngLat([this.longitude, this.latitude + .5])
                    .addTo(this.map);
            }

        },

    }
}
</script>