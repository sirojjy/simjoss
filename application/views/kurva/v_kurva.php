<div class="page-content">

  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <h5 class="mb-0 text-uppercase"><b>Kurva S</b></h5>
    <div class="ms-auto">
      <div class="btn-group">
        <a href="#"><button type="button" class="btn btn-primary">Tambah Data</button></a>
      </div>
    </div>
  </div>
  <hr/>
  <div class="row">
   <div class="col-12 col-lg-12">
      <div class="card radius-10">
        <div class="card-body">
          <h5 class="card-title">Kurva S Progres Konstruksi</h5><br>
          <div id="kurvas" style="height: 430px;"></div>
        </div>

      </div>
    </div>
  </div>

</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
  Highcharts.chart('kurvas', {
    chart: {
      type: 'areaspline'
    },
    title: {
      text: ''
    },
    legend: {
      layout: 'vertical',
      align: 'left',
      verticalAlign: 'top',
      x: 150,
      y: 100,
      floating: true,
      borderWidth: 1,
      backgroundColor:
      Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
    },
    xAxis: {
      categories: [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
      ],

    },
    yAxis: {
      title: {
        text: '% Progres'
      }
    },
    legend: {
      align: 'center',
      verticalAlign: 'bottom',
      x: 0,
      y: 0
    },
    tooltip: {
      shared: true,
      valueSuffix: ' %'
    },
    credits: {
      enabled: false
    },
    plotOptions: {
      areaspline: {
        fillOpacity: 0.4
      },

    },
    series: [{
      name: 'Lahan',
      data: [10, 15, 20, 27, 31, 42, 55, 67, 75, 82, 87, 92],
      color : '#FF4343',

    }, {
      name: 'Konstruksi',
      data: [5, 10, 15, 20, 30, 34, 47, 62, 70, 80, 90, 92],
      color : '#0C6DFF'
    }]
  });

  

  
</script>