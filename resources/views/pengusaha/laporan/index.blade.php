@extends('layouts_pengusaha.app')
@section('title', 'Laporan')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="card text-white bg-dark ml-3 mb-3" style="max-width: 18rem;">
            <div class="card-header"><h3><b>Produk</b></h3></div>
            <div class="card-body">
              <h5 class="card-title">Total produk yang dimiliki</h5>
              <h2 class="card-text">{{ $produk }}</h2>
            </div>
          </div>
          <div class="card text-white bg-dark ml-3 mb-3" style="max-width: 18rem;">
            <div class="card-header"><h3><b>Transaksi</b></h3></div>
            <div class="card-body">
              <h5 class="card-title">Total Transaksi yang dimiliki</h5>
              <h2 class="card-text">{{ $transaksi }}</h2>
            </div>
          </div>
        </div>
        <hr>
        <div id="grafik"></div>
        <hr>
        <div class="card">
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Total pendapatan</th>
                </tr>
                @foreach ($total_harga as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ($tanggal[$key]->tahun) }}</td>
                        <td>{{ ($tanggal[$key]->bulan) }}</td>
                        <td>Rp. {{ number_format($item), 0, ',', '.' }}</td>
                    </tr>
                @endforeach
            </table>
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