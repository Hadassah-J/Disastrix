<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div id="map" class="mt-4" style="height: 400px;"></div>

        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/services/services-web.min.js"></script>
        <script>
            var map = tt.map({
                key: 'RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw',
                container: 'map',
                center: [{{ $incident->longitude }}, {{ $incident->latitude }}], // Center on the incident location
                zoom: 10
            });

            var incidentCoordinates = [{{ $incident->longitude }}, {{ $incident->latitude }}];

            // Define starting coordinates (e.g., the location of the emergency responders)
            var startCoordinates = [0,0]; // Replace with actual coordinates

            // Create a route
            map.on('load', function(){
                new tt.Marker().setLngLat(startCoordinates).addTo(map);
                new tt.Marker().setLngLat(incidentCoordinates).addTo(map);

                tt.services.calculateRoute({
                key: 'RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw',
                locations: [startCoordinates, incidentCoordinates]
            }).then(function (routeData) {
                var geojson = routeData.toGeoJson();
                map.addLayer({
                    id: 'route',
                    type: 'line',
                    source: {
                        type: 'geojson',
                        data: geojson
                    },
                    paint: {
                        'line-color': '#FFFFFF',
                        'line-width': 6
                    }
                });

                new tt.Marker().setLngLat(startCoordinates).addTo(map);
                new tt.Marker().setLngLat(incidentCoordinates).addTo(map);
            }).catch(function (error) {
                console.error('Error calculating route:', error);
            });
            });

        </script>
    </x-authentication-card>
</x-guest-layout>
