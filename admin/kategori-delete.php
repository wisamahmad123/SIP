<?php
session_start();
require_once '../config.php';
include '../crud.php';

if (!isset($_SESSION['user_id']) || $_SESSION['kategori_user_id'] != 1) {
    header("Location: ../../login.php");
    exit();
}

$crud = new Crud();
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : null;

if ($kategori_id) {
    // Delete all questions related to this category
    $crud->deleteSurveySoalByCategoryId($kategori_id);
    // Delete the category
    $crud->deleteKategoriSoal($kategori_id);
}

header("Location: survey.php");
exit();
?>
