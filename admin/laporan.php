<?php
session_start();
require_once '../config.php';
include '../crud.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['kategori_user_id'] != 1) {
    header("Location: ../../login.php");
    exit();
}

$crud = new Crud();

// Fetch data from all respondent tables
$dosenData = $crud->readDosen();
$tendikData = $crud->readTendik();
$mahasiswaData = $crud->readMahasiswa();
$alumniData = $crud->readAlumni();
$ortuData = $crud->readOrtu();
$industriData = $crud->readIndustri();

$allData = array_merge(
    array_map(function($item) {
        return ['email' => $item['email'], 'status' => 'Dosen', 'tanggal' => $item['responden_tanggal']];
    }, $dosenData),
    array_map(function($item) {
        return ['email' => $item['email'], 'status' => 'Tendik', 'tanggal' => $item['responden_tanggal']];
    }, $tendikData),
    array_map(function($item) {
        return ['email' => $item['email'], 'status' => 'Mahasiswa', 'tanggal' => $item['responden_tanggal']];
    }, $mahasiswaData),
    array_map(function($item) {
        return ['email' => $item['email'], 'status' => 'Alumni', 'tanggal' => $item['responden_tanggal']];
    }, $alumniData),
    array_map(function($item) {
        return ['email' => $item['email'], 'status' => 'Ortu', 'tanggal' => $item['responden_tanggal']];
    }, $ortuData),
    array_map(function($item) {
        return ['email' => $item['email'], 'status' => 'Industri', 'tanggal' => $item['responden_tanggal']];
    }, $industriData)
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Survey</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

  <section class="content-header">
    <div class="content-header-left">
      <h1>Laporan Survey</h1>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-body table-responsive">
            <table id="surveyReport" class="table table-bordered table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($allData as $data): ?>
                  <tr>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
