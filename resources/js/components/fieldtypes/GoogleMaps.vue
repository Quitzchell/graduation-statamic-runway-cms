<template>
    <div class="space-y-4">
        <div ref="map" class="w-full h-100"></div>
        <text-input
            :type="inputType"
            ref="input"
            :value="displayAddress"
            v-model="searchQuery"
            @input="loadGooglePlaces"
        />
    </div>
</template>

<script>
import {Loader} from "@googlemaps/js-api-loader";

export default {
    mixins: [Fieldtype],

    props: {
        apiKey: {
            type: String,
            required: true,
        },
        mapId: {
            type: String,
            required: true,
        },
        value: {
            type: Object,
        },
    },

    data() {
        return {
            map: null,
            marker: null,
            autocomplete: null,
            searchQuery: "",
            loader: null,
        };
    },

    computed: {
        coordinates() {
            return this.value?.coordinates ?? {lat: -33.8688, lng: 151.2195};
        },
        displayAddress() {
            return this.value?.formatted_address ?? "";
        },
    },

    mounted() {
        this.loader = new Loader({
            apiKey: this.meta.apiKey,
            version: "weekly"
        });

        // Load Google Maps and Places API
        this.loadGoogleMaps(this.loader);
        this.loadGooglePlaces(this.loader);
    },

    methods: {
        async loadGoogleMaps(loader) {
            try {
                const libraries = await Promise.all([
                    loader.importLibrary("maps"),
                    loader.importLibrary("marker"),
                ]);

                const [{Map}, {Marker}] = libraries;
                this.initializeMap(Map);
                this.initializeMarker(Marker);
            } catch (error) {
                console.error("Google Maps API failed to load:", error);
            }
        },

        initializeMap(Map) {
            const {lat, lng} = this.coordinates;

            this.map = new Map(this.$refs.map, {
                zoom: 14,
                center: {lat, lng},
                mapId: this.meta.mapId
            });

            console.log("Map initialized");
        },

        initializeMarker(Marker) {
            const {lat, lng} = this.coordinates;
            this.marker = new Marker({
                position: {lat, lng},
                map: this.map,
            })
        },

        async loadGooglePlaces() {
            const input = this.$refs.input.$el.querySelector('input');
            if (!input || this.searchQuery.length < 3 || this.autocomplete) return;

            try {
                const {Autocomplete} = await this.loader.importLibrary("places");
                this.autocomplete = new Autocomplete(input);
                this.autocomplete.addListener("place_changed", this.onPlaceChanged);

            } catch (error) {
                console.error("Google Places API failed to load:", error);
            }
        },

        async onPlaceChanged() {
            const place = this.autocomplete.getPlace();

            if (!place.geometry) {
                console.error("Place geometry is missing:", place);
                return;
            }

            const {formatted_address, geometry} = place;
            const {lat, lng} = geometry.location;

            const address = {
                formatted_address,
                coordinates: {lat: lat(), lng: lng()},
            };

            this.displayAddress = formatted_address;
            this.coordinates = address.coordinates;

            this.map.setCenter(address.coordinates);
            this.marker.setPosition(address.coordinates);

            this.$emit("input", address);
        },
    },
};
</script>
