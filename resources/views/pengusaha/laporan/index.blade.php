@extends('layouts_pengusaha.app')
@section('title', 'Laporan')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card_header">
            Grafik Pendapatan Perbulan
        </div>
        <div id="grafik"></div>
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