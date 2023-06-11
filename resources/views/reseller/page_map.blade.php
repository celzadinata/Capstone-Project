@extends('layouts_reseller.app')
@section('title', 'Produk')
@section('content')
    <section class="profile">
        <div class="container">
            <hr class="hr-profile opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row">
                <h1>Map</h1>
                <h1 id="keyword">{{ $produk->nama_produk }}</h1>
                <div id="lokasi"></div>
                <style>
                    #lokasi {
                        height: 600px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&libraries=places">
        </script>
        <script>
            var katakunci = document.getElementById('keyword').innerHTML;

            function initMap() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert('Geolocation is not supported by this browser.');
                }

                function showPosition(position) {
                    var latLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                    var map = new google.maps.Map(document.getElementById('lokasi'), {
                        center: latLng,
                        zoom: 13
                    });

                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        icon: {
                            path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                            scale: 8,
                            fillColor: '#CE3ABD', // Ganti dengan warna yang diinginkan
                            fillOpacity: 1.0,
                            strokeColor: 'black',
                            strokeWeight: 2,

                        },
                        title: 'Lokasi Saya'
                    });

                    var circle = new google.maps.Circle({
                        strokeColor: '#CE3ABD',
                        strokeOpacity: 0.2,
                        strokeWeight: 2,
                        fillColor: '#CE3ABD',
                        fillOpacity: 0.2,
                        map: map,
                        center: latLng,
                        radius: 5000 // Radius dalam meter (5 km)
                    });
                    var request = {
                        location: latLng,
                        radius: '5000', // Radius dalam meter (5 km)
                        keyword: katakunci // Kata kunci yang ingin dicari
                    };


                    var service = new google.maps.places.PlacesService(map);
                    service.nearbySearch(request, callback);

                    function callback(results, status) {
                        if (status == google.maps.places.PlacesServiceStatus.OK) {
                            for (var i = 0; i < results.length; i++) {
                                createMarker(results[i]);
                            }
                        }
                    }

                    function createMarker(place) {
                        var marker = new google.maps.Marker({
                            map: map,
                            position: place.geometry.location,
                            title: place.name
                        });

                        var infowindow = new google.maps.InfoWindow({
                            content: place.name
                        });

                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    }
                }
            }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&libraries=places&callback=initMap&t={{ time() }}">
        </script>
    </section>
@endsection
