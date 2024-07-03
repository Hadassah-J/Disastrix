<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="ms-3">
        <div id="map" style="height: 400px; width:full;"></div>
        </div>



        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/services/services-web.min.js"></script>
        <script>
        var incidentCoordinates = [{{ $incident->longitude }}, {{ $incident->latitude }}];

    // Replace with actual starting coordinates
    var startCoordinates = [{{$nearestOrganization->longitude}}, {{$nearestOrganization->latitude}}];

    // Initialize the map
    var map = tt.map({
      key: 'RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw',
      container: 'map',
      center: incidentCoordinates,
      zoom: 10
    });

    // Create markers
    function addMarkers() {
      new tt.Marker().setLngLat(startCoordinates).addTo(map);
      new tt.Marker().setLngLat(incidentCoordinates).addTo(map);
    }

    // Function to calculate route and display it
    function calculateAndDisplayRoute() {
      tt.services.calculateRoute({
        key: 'RjAqQpQ9rqBdykGlcbflQi1JwNOpVAtw',
        locations: [startCoordinates, incidentCoordinates]
      })

      .then(function (routeData) {
        var geojson = routeData.toGeoJson();

        if (map.getSource('route')) {
          map.getSource('route').setData(geojson);
        } else {
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
        }

        var summary = routeData.routes[0].summary;
        var distance = summary.lengthInMeters;
        var travelTime = summary.travelTimeInSeconds;

        console.log('Distance: ' + distance + ' meters');
        console.log('Travel Time: ' + travelTime + ' seconds');
      })
      .catch(function (error) {
        console.error('Error calculating route:', error);
      });
    }

    map.on('load', function() {
      addMarkers();
      calculateAndDisplayRoute();
    });
        </script>
    </x-authentication-card>
</x-guest-layout>
