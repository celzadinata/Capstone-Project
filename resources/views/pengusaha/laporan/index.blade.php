@extends('layouts_pengusaha.app')
@section('title', 'Laporan')
@section('title_top', 'LAPORAN')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <p class="card-category">Paket Usaha</p>
                                    <h3 class="card-title">{{ $paket }}
                                        {{-- <small>Paket</small> --}}
                                    </h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-box-open"></i>
                                    </div>
                                    <p class="card-category">Supply</p>
                                    <h3 class="card-title">{{ $supply }}</h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-money-bill-transfer"></i>
                                    </div>
                                    <p class="card-category">Transaksi</p>
                                    <h3 class="card-title">{{ $transaksi }}</h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-primary card-header-icon">
                                    <div class="card-icon">
                                        <i class="fa-solid fa-comments"></i>
                                    </div>
                                    <p class="card-category">Review</p>
                                    <h3 class="card-title">{{ $review }}</h3>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Grafik --}}
                    <div id="grafik"></div>
                    {{-- End Grafik --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col text-right">
                                        <input class="table-filter py-2 px-2 mr-2" type="text" id="myInput"
                                            data-table="table" placeholder="Cari"><i
                                            class="fa-solid fa-magnifying-glass px-3 py-3" id="cari"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th class="text-center" width="5%">No</th>
                                        <th>Tahun</th>
                                        <th>Bulan</th>
                                        <th width="20%">Jumlah Transaksi</th>
                                        <th width="40%">Total</th>
                                    </thead>
                                    @foreach ($months as $index => $month)
                                        <tbody>
                                            <tr style="color: #CE3ABD; background-color: white; font-weight: 500;">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $years[$index] }}</td>
                                                <td>{{ $month }}</td>
                                                <td>{{ $transactionCounts[$index] }}</td>
                                                <td>Rp. {{ number_format($totalPrices[$index]), 0, ',', '.' }}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var pendapatan = <?php echo json_encode($total_harga); ?>;
        var bulan = <?php echo json_encode($bulan); ?>;
        Highcharts.chart('grafik', {
            title: {
                text: 'Grafik pendapatan Bulanan'
            },
            xAxis: {
                categories: bulan
            },
            yAxis: {
                title: {
                    text: 'Nominal Pendapatan Bulanan'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Nominal Pendapatan',
                data: pendapatan
            }]
        })
    </script>
@endsection
