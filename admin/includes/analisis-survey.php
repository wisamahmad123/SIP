<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Analisis Survey</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <section class="content-header">
    <div class="content-header-left">
      <h1>Analisis Survey</h1>
    </div><br><br>
    <div style="text-align: center;">
      <h4>Rekapitulasi Presentase Evaluasi Penyelenggaraan Kegiatan</h4>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-body">
            <canvas id="evaluationChart"></canvas>    
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
  // Data for the chart
  const labels = ['Sangat Setuju', 'Setuju', 'Cukup', 'Tidak Setuju'];
  const data = {
    labels: labels,
    datasets: [{
        label: 'Kurikulum',
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        data: [85, 75, 60, 40, 20], // Example data in percentage
      },
      {
        label: 'Fasilitas Pembelajaran',
        backgroundColor: 'rgba(75, 192, 192, 0.5)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        data: [70, 65, 50, 30, 15], // Example data in percentage
      },
      {
        label: 'Sarana Pra Sarana',
        backgroundColor: 'rgba(255, 159, 64, 0.5)',
        borderColor: 'rgba(255, 159, 64, 1)',
        borderWidth: 1,
        data: [60, 55, 45, 25, 10], // Example data in percentage
      }
    ]
  };

  // Config for the chart
  const config = {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
      scales: {
        x: {
          beginAtZero: true,
        },
        y: {
          beginAtZero: true,
          max: 100,
          ticks: {
            callback: function(value) {
              return value + "%";
            },
            stepSize: 10,
          }
        }
      }
    },
  };

  // Render the chart
  window.onload = function() {
    const ctx = document.getElementById('evaluationChart').getContext('2d');
    new Chart(ctx, config);
  };
  </script>

</body>

</html>