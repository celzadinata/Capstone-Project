@extends('layouts_reseller.app')
@section('title', 'Produk')
@section('content')
    <section class="profile">
        <div class="container">
            <hr class="hr-profile opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row">
                <h1>map</h1>

                {{-- <h1>{{ $user_location->latitude }},</h1> --}}

                <div class="my-2">
                    <input type="text" id="search-input" placeholder="Cari lokasi">
                </div>

                <div id="lokasi"></div>
                <style>
                    #lokasi {
                        height: 600px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&"></script>
        <script>
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
                        zoom: 12
                    });

                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map,
                        title: 'Your Location'
                    });
                }
            }
        </script>
        {{-- <script>
            function initMap() {
                var map = new google.maps.Map(document.getElementById('lokasi'), {
                    center: {
                        lat: {{ auth()->user()->lokasi->latitude }},
                        lng: {{ auth()->user()->lokasi->longitude }}
                    }, // Ganti dengan koordinat yang diinginkan
                    zoom: 12 // Ganti dengan level zoom yang diinginkan
                });
                @foreach ($lokasi as $l)
                var marker = new google.maps.Marker({
                    position: {
                        lat: {{ $l->latitude }},
                        lng: {{ $l->longitude }}
                    }, // Ganti dengan koordinat yang diinginkan
                    map: map,
                    title: '{{ auth()->user()->alamat }}',
                });
                @endforeach

                // Tambahkan marker di lokasi tertentu
                var marker = new google.maps.Marker({
                    position: {
                        lat: {{ auth()->user()->lokasi->latitude }},
                        lng: {{ auth()->user()->lokasi->longitude }}
                    }, // Ganti dengan koordinat yang diinginkan
                    map: map,
                    title: '{{ auth()->user()->alamat }}',
                    icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                });
            }
        </script> --}}
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&callback=initMap&libraries=&v=weekly">
        </script>
    </section>
@endsection
