<?php 
session_start();
include 'sidebar.php';
require_once '../config.php';
include '../crud.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$crud = new Crud();
$db = new Database();
$conn = $db->__construct();

$kategori_user_id = $_SESSION['kategori_user_id'];
$user_id = $_SESSION['user_id'];

$table = '';
$id_column = '';
$fields = [];

switch ($kategori_user_id) {
    case 2:
        $table = 'responden_dosen';
        $id_column = 'responden_dosen_id';
        $fields = ['responden_nip', 'responden_nama', 'responden_email', 'responden_hp', 'responden_unit'];
        break;
    case 3:
        $table = 'responden_tendik';
        $id_column = 'responden_tendik_id';
        $fields = ['responden_nopeg', 'responden_nama', 'responden_email', 'responden_hp', 'responden_unit'];
        break;
    case 4:
        $table = 'responden_mahasiswa';
        $id_column = 'responden_mahasiswa_id';
        $fields = ['responden_nim', 'responden_nama', 'responden_email', 'responden_hp', 'tahun_masuk', 'responden_prodi'];
        break;
    case 5:
        $table = 'responden_alumni';
        $id_column = 'responden_alumni_id';
        $fields = ['responden_nim', 'responden_nama', 'responden_email', 'responden_hp', 'tahun_lulus', 'responden_prodi'];
        break;
    case 6:
        $table = 'responden_ortu';
        $id_column = 'responden_ortu_id';
        $fields = ['responden_nama', 'responden_email', 'responden_hp', 'responden_jk', 'responden_umur', 'responden_pendidikan', 'responden_pekerjaan', 'responden_penghasilan', 'mahasiswa_nim', 'mahasiswa_nama', 'mahasiswa_prodi'];
        break;
    case 7:
        $table = 'responden_industri';
        $id_column = 'responden_industri_id';
        $fields = ['responden_nama', 'responden_email', 'responden_hp', 'responden_jabatan', 'responden_perusahaan', 'responden_kota'];
        break;
    default:
        die("Invalid user category");
}

// Insert or update survey entry
$survey_sql = "INSERT INTO survey (user_id, kategori_user_id) VALUES (?, ?) ON DUPLICATE KEY UPDATE user_id = VALUES(user_id), kategori_user_id = VALUES(kategori_user_id)";
$survey_stmt = $conn->prepare($survey_sql);
$survey_stmt->bind_param("ii", $user_id, $kategori_user_id);
$survey_stmt->execute();
$survey_id = $conn->insert_id; // Get the survey ID
$survey_stmt->close();

// Fetch existing data
$field_list = implode(', ', $fields);
$sql = "SELECT $field_list FROM $table WHERE $id_column = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$existing_data = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_values = [];
    foreach ($fields as $field) {
        $post_values[$field] = $_POST[$field] ?? '';
    }

    $columns_str = implode(',', array_merge([$id_column, 'survey_id'], $fields));
    $placeholders_str = implode(',', array_fill(0, count($fields) + 2, '?'));
    $update_str = implode(',', array_map(function($col) { return "$col = VALUES($col)"; }, $fields));

    $sql = "INSERT INTO $table ($columns_str) VALUES ($placeholders_str)
            ON DUPLICATE KEY UPDATE $update_str";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($post_values) + 2), $user_id, $survey_id, ...array_values($post_values));

    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">
    <title>Survey Kepuasan Pelanggan Polinema</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-right: 10px;
        }
        .container {    
            margin-top: 20px;
            padding-right: 90px;
        }
        .profile-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            padding-right: 70px;
        }
        .profile-form label {
            font-weight: bold;
            padding-right: 90px;
        }
        .profile-form .form-control {
            margin-bottom: 15px;
            padding-right: 90px;
        }
        .profile-form button {
            background-color: #007bff;
            color: #fff;
            padding-right: 90px;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="profile-form">
            <h2>Profil</h2>
            <form method="POST" action="">
                <?php foreach ($fields as $field): ?>
                <div class="form-group">
                    <label for="<?php echo $field; ?>"><?php echo ucfirst(str_replace('_', ' ', $field)); ?></label>
                    <input type="text" class="form-control" id="<?php echo $field; ?>" name="<?php echo $field; ?>" placeholder="Masukkan <?php echo ucfirst(str_replace('_', ' ', $field)); ?>" value="<?php echo $existing_data[$field] ?? ''; ?>" required>
                </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
