<?php
session_start();
require_once '../config.php';
include '../crud.php';

if (!isset($_SESSION['user_id']) || $_SESSION['kategori_user_id'] != 1) {
    header("Location: ../../login.php");
    exit();
}

$crud = new Crud();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori_id = $_POST['kategori_id'];
    $kategori_nama = $_POST['kategori_nama'];
    $crud->updateKategoriSoal($kategori_id, $kategori_nama);
    header("Location: survey.php");
}
$kategori_nama = isset($_GET['kategori_nama']) ? $_GET['kategori_nama'] : null;
$kategori_soal = $crud->readKategoriSoalByName($kategori_nama); // Assuming you have this method to read categories by name
$soal_list = $crud->readSurveySoalByCategory($kategori_soal['kategori_id']); // Assuming you have this method to read questions by category ID
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Edit Kategori</title>
</head>
<body>
<section class="content-header">
    <div class="content-header-left">
        <h1>Manajemen Survey</h1>
    </div>
</section>

<div class="container" style="padding:20px;">
    <div class="content" style="border: 3px solid #ccc; padding: 10px;">
        <h4>Edit Kategori</h4>
        <form method="post" style="padding:15px;">
            <input type="hidden" name="kategori_id" value="<?php echo $kategori_soal['kategori_id']; ?>">
            <div class="form-group">
                <label for="kategori_nama">Nama Kategori:</label>
                <input type="text" id="kategori_nama" name="kategori_nama" class="form-control" value="<?php echo $kategori_soal['kategori_nama']; ?>" required>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        <h4>Edit Soal</h4>
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Soal</th>
                    <th>Pengaturan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($soal_list as $index => $soal): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $soal['soal_nama']; ?></td>
                        <td>
                            <a href="soal-edit.php?soal_id=<?php echo $soal['soal_id']; ?>" class="btn btn-warning btn-xs">Edit</a>
                            <a href="soal-delete.php?soal_id=<?php echo $soal['soal_id']; ?>" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
