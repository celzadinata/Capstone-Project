@extends('layouts_reseller.app')
@section('title', 'Detail Produk')
@section('content')
    <style>
        #lokasi {
            border-radius: 5px;
            height: 600px;
            width: 100%;
        }
    </style>
    {{-- Detail Produk --}}
    <section class="detail-produk">
        <div class="container">
            <hr class="my-2 hr-detail opacity-100" data-aos="flip-right" data-aos-delay="100">
            <div class="row mt-3 py-2">
                <div class="col-md-3 col-lg-5">
                    <img src="{{ asset('assets/img/reseller/paket/paket-adidas.jpg') }}" class="card-img-top" alt="...">
                </div>
                <div class="col-md-5 col-lg-7 pt-2">
                    <h4 class="title">{{ $produk->nama_produk }}</h4>
                    <table class="mb-3">
                        <tbody class="rating">
                            <tr>
                                <td>
                                    @if ($rating == null)
                                        0
                                    @else
                                        <u>{{ str_replace('...', '', Str::limit($rating, 3)) }}</u>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating)
                                                <i class="fa fa-star checked"></i>
                                            @endif
                                        @endfor
                                    @endif
                                </td>
                                <td>&nbsp|&nbsp</td>
                                <td>{{ $nilai }} Penilaian</td>
                                <td>&nbsp|&nbsp</td>
                                <td>{{ $terjual }} Terjual</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="price p-4">
                        <h2>Rp {{ number_format($produk->harga, 0, '.', '.') }}</h2>
                    </div>
                    <div class="my-3">
                        {{-- <a href="{{ route('map', $produk->id) }}" class="btn-resell"><i class="fa-solid fa-location-dot"></i> Lihat Lokasi</a> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn-resell" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-location-dot"></i> Lihat Lokasi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Lokasi Anda</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="location" id="lokasi"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn-resell" data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('keranjang.add', $produk->id) }}" class="btn-resell"><i
                                class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> Masukkan Keranjang</a>
                    </div>
                </div>
            </div>

            <style>
                .checked {
                    color: #CE3ABDe;
                }
            </style>

            <div class="description row my-2 py-2">
                <h4 class="title">Deskripsi</h4>
                <p class="isi">{{ $produk->deskripsi }}</p>
            </div>

            <div class="review row mb-3 py-2">
                <h4>Penilaian Produk</h4>

                @livewire('review', ['produk_id' => $produk->id])

            </div>
        </div>
    </section>
    {{-- End Detail Produk --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoNyOpCm5oQ4vlUSfaQX5_dDd06ZNGQR4&libraries=places">
    </script>
    <script>
        // var katakunci = document.getElementById('keyword').innerHTML;

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
                    styles: [{
                            elementType: "geometry",
                            stylers: [{
                                color: "#242f3e"
                            }]
                        },
                        {
                            elementType: "labels.text.stroke",
                            stylers: [{
                                color: "#242f3e"
                            }]
                        },
                        {
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#746855"
                            }]
                        },
                        {
                            featureType: "administrative.locality",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#d59563"
                            }],
                        },
                        {
                            featureType: "poi",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#d59563"
                            }],
                        },
                        {
                            featureType: "poi.park",
                            elementType: "geometry",
                            stylers: [{
                                color: "#263c3f"
                            }],
                        },
                        {
                            featureType: "poi.park",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#6b9a76"
                            }],
                        },
                        {
                            featureType: "road",
                            elementType: "geometry",
                            stylers: [{
                                color: "#38414e"
                            }],
                        },
                        {
                            featureType: "road",
                            elementType: "geometry.stroke",
                            stylers: [{
                                color: "#212a37"
                            }],
                        },
                        {
                            featureType: "road",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#9ca5b3"
                            }],
                        },
                        {
                            featureType: "road.highway",
                            elementType: "geometry",
                            stylers: [{
                                color: "#746855"
                            }],
                        },
                        {
                            featureType: "road.highway",
                            elementType: "geometry.stroke",
                            stylers: [{
                                color: "#1f2835"
                            }],
                        },
                        {
                            featureType: "road.highway",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#f3d19c"
                            }],
                        },
                        {
                            featureType: "transit",
                            elementType: "geometry",
                            stylers: [{
                                color: "#2f3948"
                            }],
                        },
                        {
                            featureType: "transit.station",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#d59563"
                            }],
                        },
                        {
                            featureType: "water",
                            elementType: "geometry",
                            stylers: [{
                                color: "#17263c"
                            }],
                        },
                        {
                            featureType: "water",
                            elementType: "labels.text.fill",
                            stylers: [{
                                color: "#515c6d"
                            }],
                        },
                        {
                            featureType: "water",
                            elementType: "labels.text.stroke",
                            stylers: [{
                                color: "#17263c"
                            }],
                        },
                    ],
                    icon: '{{ asset('assets/img/icon/user_lokasi.png') }}',
                    animation: google.maps.Animation.BOUNCE,
                    title: 'Lokasi Saya'
                });
                //
                var circle = new google.maps.Circle({
                    strokeColor: '#CE3ABD',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#CE3ABD',
                    fillOpacity: 0.1,
                    map: map,
                    center: latLng,
                    radius: 5000 // Radius dalam meter (5 km)
                });
                var request = {
                    location: latLng,
                    radius: '5000', // Radius dalam meter (5 km)
                    keyword: '{{ $produk->nama_produk }}' // Kata kunci yang ingin dicari
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
                        icon: '{{ asset('assets/img/icon/shop_lokasi.png') }}',
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
@endsection
