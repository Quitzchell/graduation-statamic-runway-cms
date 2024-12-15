import GoogleMaps from "./components/fieldtypes/GoogleMaps.vue";

Statamic.booting(() => {
    Statamic.$components.register('google_maps-fieldtype', GoogleMaps);
});
