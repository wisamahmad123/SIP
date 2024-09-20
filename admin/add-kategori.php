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
$kategori_user_id = $_SESSION['kategori_user_id'];
$kategori_id = $_GET['kategori_id'] ?? null;
$category = $kategori_id ? $crud->readKategoriSoalById($kategori_id) : null;
$questions = $kategori_id ? $crud->readSurveySoalByKategoriId($kategori_id) : [];
$action = $kategori_id ? "edit" : "add";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori_nama = $_POST['kategori_nama'];
    if ($action == "add") {
        $crud->createKategoriSoal($kategori_user_id, $kategori_nama);
    } else {
        $crud->updateKategoriSoal($kategori_nama, $kategori_id);
    }
    header("Location: manajemen-survey.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Manajemen Survey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table-responsive {
            padding: 20px;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .table .btn {
            margin: 2px;
        }
    </style>
</head>
<body>
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo $action == 'add' ? 'Tambah Kategori' : 'Edit Kategori'; ?></h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body table-responsive">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="kategori_nama">Nama Kategori:</label>
                                <input type="text" id="kategori_nama" name="kategori_nama" class="form-control" value="<?php echo $category['kategori_nama'] ?? ''; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        <?php if ($kategori_id): ?>
                            <h3>Daftar Soal</h3>
                            <a href="soal-add.php?kategori_id=<?php echo $kategori_id; ?>" class="btn btn-success btn-sm">+ Tambah Soal</a>
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Soal</th>
                                        <th>Pengaturan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($questions as $index => $question): ?>
                                        <tr>
                                            <td><?php echo $index + 1; ?></td>
                                            <td><?php echo $question['soal_nama']; ?></td>
                                            <td>
                                                <a href="soal-edit.php?soal_id=<?php echo $question['soal_id']; ?>" class="btn btn-success btn-xs">Edit</a>
                                                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete" data-href="soal-delete.php?soal_id=<?php echo $question['soal_id']; ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this item?</p>
                    <p style="color:red;">Be careful! This item will be permanently deleted.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    </script>
</body>
</html>
