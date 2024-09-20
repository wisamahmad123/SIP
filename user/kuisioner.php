<?php 
session_start();
include 'sidebar.php';
require_once '../config.php';
require_once '../crud.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$crud = new Crud();
$db = new Database();
$conn = $db->__construct();

// Fetch survey categories
$sql = "SELECT DISTINCT k.kategori_id, k.kategori_nama
        FROM kategori_soal k
        INNER JOIN survey_soal s ON k.kategori_id = s.kategori_id
        INNER JOIN kategori_user ku ON k.kategori_user_id = ku.kategori_user_id
        WHERE ku.kategori_user_id = ?";

        $stmt = $conn->prepare($sql);
        $kategori_user_id = $_SESSION['kategori_user_id']; // Assuming this is set during login
        $stmt->bind_param("i", $kategori_user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $categories = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $selected_category_id = null;
        $questions = [];

if (isset($_GET['kategori_id'])) {
    $selected_category_id = $_GET['kategori_id'];

    // Fetch questions for the selected category
    $sql = "SELECT s.soal_id, s.soal_nama 
            FROM survey_soal s
            WHERE s.kategori_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $selected_category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $questions = $result->fetch_all(MYSQLI_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $selected_category_id) {
    // Save answers based on user category
    foreach ($questions as $question) {
        $jawaban = $_POST['jawaban_' . $question['soal_id']];
        $soal_id = $question['soal_id'];

        // Determine the appropriate table and id based on user category
        switch ($kategori_user_id) {
            case 2:
                $responden_id = $_SESSION['responden_dosen_id'];
                $table = 'jawaban_dosen';
                $responden_column = 'responden_dosen_id';
                break;
            case 3:
                $responden_id = $_SESSION['responden_tendik_id'];
                $table = 'jawaban_tendik';
                $responden_column = 'responden_tendik_id';
                break;
            case 4:
                $responden_id = $_SESSION['responden_mahasiswa_id'];
                $table = 'jawaban_mahasiswa';
                $responden_column = 'responden_mahasiswa_id';
                break;
            case 5:
                $responden_id = $_SESSION['responden_alumni_id'];
                $table = 'jawaban_alumni';
                $responden_column = 'responden_alumni_id';
                break;
            case 6:
                $responden_id = $_SESSION['responden_ortu_id'];
                $table = 'jawaban_ortu';
                $responden_column = 'responden_ortu_id';
                break;
            case 7:
                $responden_id = $_SESSION['responden_industri_id'];
                $table = 'jawaban_industri';
                $responden_column = 'responden_industri_id';
                break;
            default:
                die("Invalid user category");
        }

        $insertSql = "INSERT INTO $table ($responden_column, soal_id, jawaban) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("iis", $responden_id, $soal_id, $jawaban);
        $insertStmt->execute();
    }
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuisioner</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
        }
        .card-header {
            font-size: 1.25rem;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .card-body {
            font-size: 1.25rem;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="radio"] {
            margin-right: 10px;
        }
        .form-group textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="header">
            <h1>Kuisioner</h1>
        </div>
        <div class="card">
            <div class="card-header">Pilihan Survey</div>
            <div class="card-body">
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <li><a href="?kategori_id=<?php echo $category['kategori_id']; ?>"><?php echo $category['kategori_nama']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
        <?php if ($selected_category_id): ?>
            <form method="POST" action="">
                <div class="card">
                    <div class="card-header">Penilaian Pembelajaran</div>
                    <div class="card-body">
                        <?php foreach ($questions as $question): ?>
                            <div class="form-group">
                                <label for="soal_<?php echo $question['soal_id']; ?>"><?php echo $question['soal_nama']; ?></label><br>
                                <input type="radio" name="jawaban_<?php echo $question['soal_id']; ?>" value="1" required> Tidak Setuju
                                <input type="radio" name="jawaban_<?php echo $question['soal_id']; ?>" value="2"> Kurang Setuju
                                <input type="radio" name="jawaban_<?php echo $question['soal_id']; ?>" value="3"> Cukup Setuju
                                <input type="radio" name="jawaban_<?php echo $question['soal_id']; ?>" value="4"> Sangat Setuju
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn">Simpan</button>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
