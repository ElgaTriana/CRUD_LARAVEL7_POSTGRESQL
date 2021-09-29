@extends('layouts.app')
 
@section('content')
    <div id="map" style="width: 100%; height: 300px;"></div>  
@endsection

@section('js')
    
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script type="text/javascript">
    
        function initialize() {

            var map_canvas = document.getElementById('map_canvas');

            // Initialise the map
            var map_options = {
                center: location,
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(map_canvas, map_options)

            // Put all locations into array
            var locations = [
            @foreach ($locations as $location)
                [ {{ $location->LATITUDE }}, {{ $location->LONGITUDE }} ]     
            @endforeach
            ];

            for (i = 0; i < locations.length; i++) {
                var location = new google.maps.LatLng(locations[i][0], locations[i][1]);

                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                }); 
            }
            // google.maps.event.addDomListener(window, 'load', initialize);
            // marker.setMap(map); // Probably not necessary since you set the map above
        }
    </script>
@endsection