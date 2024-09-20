<?php
session_start();
require_once '../config.php';
include '../crud.php';

if (!isset($_SESSION['user_id']) || $_SESSION['kategori_user_id'] != 1) {
    header("Location: ../../login.php");
    exit();
}

$crud = new Crud();
$soal_id = $_GET['soal_id'] ?? null;
$question = $crud->readSurveySoalById($soal_id);
$kategori_id = $question['kategori_id'];

if ($soal_id) {
    $crud->deleteSurveySoal($soal_id);
}

header("Location: kategori-add.php?kategori_id=$kategori_id");
exit();
?>
