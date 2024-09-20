<?php
session_start();
require_once '../config.php';
include '../crud.php';
include 'includes/header.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['kategori_user_id'] != 1) {
    header("Location: ../../login.php");
    exit();
}

$crud = new Crud();
$categories = $crud->readKategoriSoal(); // Fetch categories from database
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
            <h1>Manajemen Survey</h1>
        </div>
        <div class="content-header-right">
            <a href="kategori-add.php" class="btn btn-success btn-sm">+ Tambah Kategori</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $index => $category): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo $category['kategori_nama']; ?></td>
                                        <td>
                                            <a href="add-kategori.php?kategori_id=<?php echo $category['kategori_id']; ?>" class="btn btn-success btn-xs">Tambah Soal</a>
                                            <a href="kategori-edit.php?kategori_id=<?php echo $category['kategori_id']; ?>" class="btn btn-success btn-xs">Edit</a>
                                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#confirm-delete" data-href="kategori-delete.php?kategori_id=<?php echo $category['kategori_id']; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
                    <p style="color:red;">Be careful! This will delete all questions associated with this category.</p>
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
