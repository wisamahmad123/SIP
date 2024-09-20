<?php
session_start();
require_once '../config.php';
require_once '../crud.php';
include 'includes/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$crud = new Crud();
$db = new Database();
$conn = $db->__construct();

// Fetch the aggregated answers for all surveys
$sql = "SELECT jawaban, COUNT(*) as count FROM laporan_jawaban GROUP BY jawaban";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}
$stmt->execute();
$result = $stmt->get_result();
$answer_data = [];
while ($row = $result->fetch_assoc()) {
    $answer_data[$row['jawaban']] = $row['count'];
}
$stmt->close();

// Prepare data for the pie chart
$labels = json_encode(array_keys($answer_data));
$data = json_encode(array_values($answer_data));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis Survey</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            width: 40%; /* Adjust the percentage to resize the chart */
            margin: auto;
        }
    </style>
</head>
<body>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Analisis Survey</h1>
        </div><br><br>
        <div style="text-align: center;">
            <h4>Rekapitulasi Presentase Kepuasan</h4>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body chart-container">
                        <canvas id="evaluationChart"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Data for the chart
    const labels = <?php echo $labels; ?>;
    const data = {
        labels: labels,
        datasets: [{
            label: 'Jawaban Survey:',
            backgroundColor: [
                'rgba(54, 162, 235, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1,
            data: <?php echo $data; ?>
        }]
    };

    // Config for the chart
    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true
        }
    };

    // Render the chart
    window.onload = function() {
        const ctx = document.getElementById('evaluationChart').getContext('2d');
        new Chart(ctx, config);
    };
    </script>
</body>
</html>
