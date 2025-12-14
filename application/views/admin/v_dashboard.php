<div id="content">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Total Jemaat -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Jemaat</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_jemaat; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Acara Mendatang -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Acara Mendatang</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_acara; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Area Chart -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 mb-4">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-area">
              <canvas id="pengunjungChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistik Jenis Kelamin, Umur, Pendidikan, Pekerjaan -->
    <div class="row">
      <!-- Pie Chart Jenis Kelamin -->
      <div class="col-xl-3 col-lg-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Jenis Kelamin</h6>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="jenisKelaminChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart Umur -->
      <div class="col-xl-3 col-lg-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Umur</h6>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="umurChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart Pendidikan -->
      <div class="col-xl-3 col-lg-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Pendidikan</h6>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="pendidikanChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Pie Chart Pekerjaan -->
      <div class="col-xl-3 col-lg-6 mb-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Pekerjaan</h6>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="pekerjaanChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Debugging: Cetak data jenis kelamin ke console
    console.log('Jenis Kelamin:', <?php echo json_encode($jenis_kelamin); ?>);
    console.log('Umur:', <?php echo json_encode($statistik_umur); ?>);
    console.log('Pendidikan:', <?php echo json_encode($statistik_pendidikan); ?>);
    console.log('Pekerjaan:', <?php echo json_encode($statistik_pekerjaan); ?>);

    // Fungsi untuk menginisialisasi pie chart
    function initPieChart(canvasId, labels, data, backgroundColors, hoverBackgroundColors) {
      var ctx = document.getElementById(canvasId).getContext('2d');
      var chartData = {
        labels: labels,
        datasets: [{
          data: data,
          backgroundColor: backgroundColors,
          hoverBackgroundColor: hoverBackgroundColors
        }]
      };
      new Chart(ctx, {
        type: 'pie',
        data: chartData,
        options: {
          responsive: true
        }
      });
    }

    // Inisialisasi Pie Chart Jenis Kelamin
    var jenisKelaminLabels = [];
    var jenisKelaminData = [];
    <?php foreach ($jenis_kelamin as $jk): ?>
      jenisKelaminLabels.push('<?php echo $jk['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan'; ?>');
      jenisKelaminData.push(<?php echo $jk['jumlah']; ?>);
    <?php endforeach; ?>
    initPieChart('jenisKelaminChart', jenisKelaminLabels, jenisKelaminData, ['#FF6384', '#36A2EB'], ['#FF6384', '#36A2EB']);

    // Inisialisasi Pie Chart Umur
    var umurLabels = [];
    var umurData = [];
    <?php foreach ($statistik_umur as $umur): ?>
      umurLabels.push('<?php echo $umur['umur']; ?>');
      umurData.push(<?php echo $umur['jumlah']; ?>);
    <?php endforeach; ?>
    initPieChart('umurChart', umurLabels, umurData, ['#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB'], ['#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384', '#36A2EB']);

    // Inisialisasi Pie Chart Pendidikan
    var pendidikanLabels = [];
    var pendidikanData = [];
    <?php foreach ($statistik_pendidikan as $pendidikan): ?>
      pendidikanLabels.push('<?php echo $pendidikan['pendidikan_terakhir']; ?>');
      pendidikanData.push(<?php echo $pendidikan['jumlah']; ?>);
    <?php endforeach; ?>
    initPieChart('pendidikanChart', pendidikanLabels, pendidikanData, ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'], ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']);

    // Inisialisasi Pie Chart Pekerjaan
    var pekerjaanLabels = [];
    var pekerjaanData = [];
    <?php foreach ($statistik_pekerjaan as $pekerjaan): ?>
      pekerjaanLabels.push('<?php echo $pekerjaan['pekerjaan']; ?>');
      pekerjaanData.push(<?php echo $pekerjaan['jumlah']; ?>);
    <?php endforeach; ?>
    initPieChart('pekerjaanChart', pekerjaanLabels, pekerjaanData, ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'], ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']);
  </script>

  <script>
    // Data dari controller
    var pengunjungData = <?php echo json_encode($statistik_pengunjung); ?>;

    // Mengambil bulan dan jumlah dari data
    var labels = pengunjungData.map(function(item) {
      return item.bulan;
    });

    var data = pengunjungData.map(function(item) {
      return item.jumlah;
    });

    // Inisialisasi chart
    var ctx = document.getElementById('pengunjungChart').getContext('2d');
    var pengunjungChart = new Chart(ctx, {
      type: 'bar', // Jenis chart, bisa diganti dengan 'line', 'pie', dll.
      data: {
        labels: labels,
        datasets: [{
          label: 'Jumlah Pengunjung',
          data: data,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1
            }
          }
        },
        plugins: {
          legend: {
            display: true,
            position: 'top'
          }
        }
      }
    });
  </script>