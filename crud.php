<?php
require_once 'config.php';
class Crud
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    // Akun 
    // Create Akun $level = 'admin' / 'user'
    public function createAcc($username, $kategori_user_id, $email, $password, $level)
    {       
        $query = "INSERT INTO user(kategori_user_id, username, email, password, level) VALUES('$kategori_user_id', '$username', '$email', '$password', '$level')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Read Akun
    public function readAccount()
    {
        $query = "SELECT * FROM user";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 
    // Read By Username
    public function readByUsername($username)
    {
        $query = "SELECT * FROM user WHERE username = $username";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    // Update Password Akun / Forgot Password
    public function updateAcc($password, $email)
    {
        $query = "UPDATE user SET password ='$password' WHERE email =$email";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function createJawabanDosen($responden_dosen_id, $soal_id, $jawaban)
    {
        $query = "INSERT INTO jawaban_dosen(responden_dosen_id, soal_id, jawaban) VALUES('$responden_dosen_id', '$soal_id', '$jawaban')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Create jawaban Tendik
    public function createJawabanTendik($responden_tendik_id, $soal_id, $jawaban)
    {
        $query = "INSERT INTO jawaban_Tendik(responden_tendik_id, soal_id, jawaban) VALUES('$responden_tendik_id', '$soal_id', '$jawaban')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Create jawaban Mahasiswa
    public function createJawabanMahasiswa($responden_mahasiswa_id, $soal_id, $jawaban)
    {
        $query = "INSERT INTO jawaban_mahasiswa(responden_mahasiswa_id, soal_id, jawaban) VALUES('$responden_mahasiswa_id', '$soal_id', '$jawaban')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Create jawaban Alumni
    public function createJawabanAlumni($responden_alumni, $soal_id, $jawaban)
    {
        $query = "INSERT INTO jawaban_alumni(responden_alumni_id, soal_id, jawaban) VALUES('$responden_alumni', '$soal_id', '$jawaban')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Create jawaban Ortu
    public function createJawabanOrtu($responden_ortu_id, $soal_id, $jawaban)
    {
        $query = "INSERT INTO jawaban_ortu(responden_ortu_id, soal_id, jawaban) VALUES('$responden_ortu_id', '$soal_id', '$jawaban')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Create jawaban Industri
    public function createJawabanIndustri($responden_industri_id, $soal_id, $jawaban)
    {
        $query = "INSERT INTO jawaban_industri(responden_industri_id, soal_id, jawaban) VALUES('$responden_industri_id', '$soal_id', '$jawaban')";
        $result = $this->db->conn->query($query);
        return $result;
    }



    //  Read
    //  Read jawaban Dosen
    public function readjawabanDosen()
    {
        $query = "SELECT * FROM jawaban_dosen";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //  Read jawaban Tendik
    public function readjawabanTendik()
    {
        $query = "SELECT * FROM jawaban_tendik";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //  Read jawaban Mahasiswa
    public function readjawabanMahasiswa()
    {
        $query = "SELECT * FROM jawaban_mahasiswa";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //  Read jawaban Alumni
    public function readjawabanAlumni()
    {
        $query = "SELECT * FROM jawaban_alumni";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //  Read jawaban Ortu
    public function readjawabanOrtu()
    {
        $query = "SELECT * FROM jawaban_ortu";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    //  Read jawaban Industri
    public function readjawabanIndustri()
    {
        $query = "SELECT * FROM jawaban_industri";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }



    // Update 
    // Update Jawaban Dosen
    public function updateJawabanDosen($jawaban_dosen_id, $jawaban)
    {
        $query = "UPDATE jawaban_dosen SET jawaban ='$jawaban' WHERE jawaban_dosen_id = $jawaban_dosen_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update Jawaban Tendik
    public function updateJawabanTendik($jawaban_tendik_id, $jawaban)
    {
        $query = "UPDATE jawaban_tendik_id SET jawaban ='$jawaban' WHERE jawaban_tendik_id = $jawaban_tendik_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update Jawaban Mahasiswa
    public function updateJawabanMahasiswa($jawaban_mahasiswa_id, $jawaban)
    {
        $query = "UPDATE jawaban_mahasiswa_id SET jawaban ='$jawaban' WHERE jawaban_mahasiswa_id = $jawaban_mahasiswa_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update Jawaban Alumni
    public function updateJawabanAlumni($jawaban_alumni_id, $jawaban)
    {
        $query = "UPDATE jawaban_alumni_id SET jawaban ='$jawaban' WHERE jawaban_alumni_id = $jawaban_alumni_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update Jawaban Ortu
    public function updateJawabanOrtu($jawaban_ortu_id, $jawaban)
    {
        $query = "UPDATE jawaban_ortu_id SET jawaban ='$jawaban' WHERE jawaban_ortu_id = $jawaban_ortu_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update Jawaban Industri
    public function updateJawabanIndustri($jawaban_industri_id, $jawaban)
    {
        $query = "UPDATE jawaban_industri_id SET jawaban ='$jawaban' WHERE jawaban_industri_id = $jawaban_industri_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    public function createKategoriSoal($kategori_user_id, $kategori_nama)
    {
        $query = "INSERT INTO kategori_soal(kategori_user_id, kategori_nama) VALUES('$kategori_user_id', '$kategori_nama')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    //  Read Kategori Soal
    public function readKategoriSoal()
    {
        $query = "SELECT * FROM kategori_soal";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

        // Method to read a specific category by ID
    public function readKategoriSoalById($kategori_id)
    {
        $query = "SELECT * FROM kategori_soal WHERE kategori_id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $kategori_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update Kategori Soal
    public function updateKategoriSoal($kategori_nama_baru, $kategori_nama_lama)
    {
        $query = "UPDATE kategori_soal SET kategori_nama ='$kategori_nama_baru' WHERE kategori_nama =$kategori_nama_lama";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete Kategori Soal
    public function deleteKategoriSoal($kategori_id)
    {
        $query = "DELETE FROM kategori_soal WHERE kategori_id = '$kategori_id'";
        return $this->db->conn->query($query);
    }

    public function createKategoriUser($kategori_nama)
    {
        $query = "INSERT INTO kategori_user(kategori_nama) VALUES('$kategori_nama')";
        $result = $this->db->conn->query($query);
        return $result;
    }
    
    //  Read Kategori User
    public function readKategoriUser()
    {
        $query = "SELECT * FROM kategori_user";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    // Update Kategori User
    public function updateKategoriUser($kategori_nama_baru, $kategori_nama_lama)
    {
        $query = "UPDATE kategori_user SET kategori_nama ='$kategori_nama_baru' WHERE kategori_nama =$kategori_nama_lama";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete Kategori User
    public function deleteKategoriUser($kategori_nama)
    {
        $query = "DELETE FROM kategori WHERE kategori_nama =$kategori_nama";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function createLaporanJawaban($jawaban_dosen_id, $jawaban_tendik_id, $jawaban_mahasiswa_id, $jawaban_alumni_id, $jawaban_ortu_id, $jawaban_industri_id, $soal_id, $soal_nama, $jawaban, $nilai_cf_user)
    {
        $query = "INSERT INTO laporan_jawaban(jawaban_dosen_id, jawaban_tendik_id, jawaban_mahasiswa_id, jawaban_alumni_id, jawaban_ortu_id, jawaban_industri_id, soal_id, soal_nama, jawaban, nilai_cf_user) VALUES('$jawaban_dosen_id, '$jawaban_tendik_id', '$jawaban_mahasiswa_id', '$jawaban_alumni_id', '$jawaban_ortu_id', '$jawaban_industri_id', '$soal_id', '$soal_nama', '$jawaban', '$nilai_cf_user')";
        $result = $this->db->conn->query($query);
        return $result;
    }


    // Read Laporan Jawaban
    public function readLaporanJawaban()
    {
        $query = "SELECT * FROM laporan_jawaban";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 

    
    // Update nilai cf user
    public function updateCfUser($laporan_jawaban_id, $nilai_cf_user)
    {
        $query = "UPDATE laporan_jawaban SET nilai_cf_user ='$nilai_cf_user' WHERE laporan_jawaban_id = $laporan_jawaban_id";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function createRespondenDosen($survey_id, $responden_tanggal, $responden_nip, $responden_nama, $responden_unit) 
    {
        $query = "INSERT INTO responden_dosen(survey_id, responden_tanggal, responden_nip, responden_nama, responden_unit) VALUES ($survey_id, $responden_tanggal, $responden_nip, $responden_nama, $responden_unit)";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Responden Tendik
    public function createRespondenTendik($survey_id, $responden_tanggal, $responden_nopeg, $responden_nama, $responden_unit) 
    {
        $query = "INSERT INTO responden_tendik(survey_id, responden_tanggal, responden_nopeg, responden_nama, responden_unit) VALUES ($survey_id, $responden_tanggal, $responden_nopeg, $responden_nama, $responden_unit)";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Responden Mahasiswa
    public function createRespondenMahasiswa($survey_id, $responden_tanggal, $responden_nim, $responden_nama, $responden_prodi, $responden_email, $responden_hp, $tahun_masuk) 
    {
        $query = "INSERT INTO responden_mahasiswa(survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_masuk) VALUES ($survey_id, $responden_tanggal, $responden_nim, $responden_nama, $responden_prodi, $responden_email, $responden_hp, $tahun_masuk)";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Responden Alumni
    public function createRespondenAlumni($survey_id, $responden_tanggal, $responden_nim, $responden_nama, $responden_prodi, $responden_email, $responden_hp, $tahun_lulus) 
    {
        $query = "INSERT INTO responden_alumni(survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus) VALUES ($survey_id, $responden_tanggal, $responden_nim, $responden_nama, $responden_prodi, $responden_email, $responden_hp, $tahun_lulus)";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Responden Ortu
    public function createRespondenOrtu($survey_id, $responden_tanggal, $responden_nama, $responden_jk, $responden_umur, $responden_hp, $responden_pendidikan, $responden_pekerjaan, $responden_penghasilan, $mahasiswa_nim, $mahasiswa_nama, $mahasiswa_prodi) 
    {
        $query = "INSERT INTO responden_ortu(survey_id, responden_tanggal, responden_nama, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, responden_penghasilan, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi) VALUES ($survey_id, $responden_tanggal, $responden_nama, $responden_jk, $responden_umur, $responden_hp, $responden_pendidikan, $responden_pekerjaan, $responden_penghasilan, $mahasiswa_nim, $mahasiswa_nama, $mahasiswa_prodi)";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Responden Dosen
    public function createRespondenIndustri($survey_id, $responden_tanggal, $responden_nama, $responden_jabatan, $responden_perusahaan, $responden_email, $responden_hp, $responden_kota) 
    {
        $query = "INSERT INTO responden_industri(survey_id, responden_tanggal, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota) VALUES ($survey_id, $responden_tanggal, $responden_nama, $responden_jabatan, $responden_perusahaan, $responden_email, $responden_hp, $responden_kota)";
        $result = $this->db->conn->query($query);
        return $result;
    }

    // Read Responden
    //  Read Dosen
// Read Responden Dosen
public function readDosen()
{
    $query = "SELECT responden_nama as email, responden_tanggal FROM responden_dosen";
    $result = $this->db->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Read Responden Tendik
public function readTendik()
{
    $query = "SELECT responden_nama as email, responden_tanggal FROM responden_tendik";
    $result = $this->db->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Read Responden Mahasiswa
public function readMahasiswa()
{
    $query = "SELECT responden_email as email, responden_tanggal FROM responden_mahasiswa";
    $result = $this->db->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Read Responden Alumni
public function readAlumni()
{
    $query = "SELECT responden_email as email, responden_tanggal FROM responden_alumni";
    $result = $this->db->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Read Responden Ortu
public function readOrtu()
{
    $query = "SELECT responden_nama as email, responden_tanggal FROM responden_ortu";
    $result = $this->db->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Read Responden Industri
public function readIndustri()
{
    $query = "SELECT responden_email as email, responden_tanggal FROM responden_industri";
    $result = $this->db->conn->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}



    // Update Responden
    // Update dosen
    public function updateDosen($responden_dosen_id, $survey_id, $responden_nip, $responden_nama, $responden_unit)
    {
        $query = "UPDATE responden_dosen SET responden_nip = '$responden_nip' AND responden_nama = '$responden_nama' AND responden = '$responden_unit' WHERE responden_dosen_id = '$responden_dosen_id'";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update tendik
    public function updateTendik($responden_tendik_id, $responden_nopeg, $responden_nama, $responden_unit)
    {
        $query = "UPDATE responden_tendik SET responden_nopeg = '$responden_nopeg' AND responden_nama = '$responden_nama' AND responden = '$responden_unit' WHERE responden_tendik_id = '$responden_tendik_id'";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update mahasiswa
    public function updateMahasiswa($responden_mahasiswa_id, $responden_nim, $responden_nama, $responden_prodi, $responden_email, $responden_hp, $tahun_masuk)
    {
        $query = "UPDATE responden_mahasiswa SET responden_nim = '$responden_nim' AND responden_nama = '$responden_nama' AND responden_prodi = '$responden_prodi' AND responden_email = '$responden_email' AND responden_hp = '$responden_hp' AND tahun_masuk = '$tahun_masuk' WHERE responden_mahasiswa_id = $responden_mahasiswa_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update dosen
    public function updateAlumni($responden_alumni_id, $responden_nim, $responden_nama, $responden_prodi, $responden_email, $responden_hp, $tahun_lulus)
    {
        $query = "UPDATE responden_alumni SET responden_nim ='$responden_nim' AND  responden_nama ='$responden_nama' AND responden_prodi = '$responden_prodi' AND responden_email = '$responden_email' AND responden_hp = '$responden_hp' AND tahun_lulus = '$tahun_lulus' WHERE responden_alumni_id = $responden_alumni_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update dosen
    public function updateOrtu($responden_ortu_id, $responden_nama, $responden_jk, $responden_umur, $responden_hp, $responden_pendidikan, $responden_pekerjaan, $responden_penghasilan, $mahasiswa_nim, $mahasiswa_nama, $mahasiswa_prodi)
    {
        $query = "UPDATE responden_ortu SET responden_nama ='$responden_nama' AND responden_jk = '$responden_jk' AND responden_umur = '$responden_umur' AND responden_hp = '$responden_hp' AND responden_pendidikan = '$responden_pendidikan' AND responden_pekerjaan = '$responden_pekerjaan' AND responden_penghasilan = '$responden_penghasilan' AND  mahasiswa_nim = '$mahasiswa_nim' AND mahasiswa_nama = '$mahasiswa_nama' AND mahasiswa_prodi = '$mahasiswa_prodi' WHERE responden_ortu_id = $responden_ortu_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Update dosen
    public function updateIndustri($responden_industri_id, $respoden_nama, $responden_jabatan, $responden_perusahaan, $responden_email, $responden_hp, $responden_kota)
    {
        $query = "UPDATE responden_industri SET responden_nama = '$respoden_nama' AND responden_jabatan = '$responden_jabatan' AND  responden_perusahaan = '$responden_perusahaan' AND responden_email = '$responden_email' AND responden_hp = '$responden_hp' AND responden_kota = '$responden_kota' WHERE responden_industri_id = $responden_industri_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    

    // Delete Responden
    // Delete dosen
    public function deleteDosen($responden_dosen_id)
    {
        $query = "DELETE FROM responden_dosen WHERE responden_dosen_id = $responden_dosen_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete tendik
    public function deleteTendik($responden_tendik_id)
    {
        $query = "DELETE FROM responden_tendik WHERE responden_tendik_id = $responden_tendik_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete mahasiswa
    public function deleteMahasiswa($responden_mahasiswa_id)
    {
        $query = "DELETE FROM responden_mahasiswa WHERE responden_mahasiswa_id = $responden_mahasiswa_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete alumni
    public function deleteAlumni($responden_alumni_id)
    {
        $query = "DELETE FROM responden_alumni WHERE responden_alumni_id = $responden_alumni_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete ortu
    public function deleteOrtu($responden_ortu_id)
    {
        $query = "DELETE FROM responden_ortu WHERE responden_ortu_id = $responden_ortu_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete industri
    public function deleteIndustri($responden_industri_id)
    {
        $query = "DELETE FROM responden_industri WHERE responden_industri_id = $responden_industri_id";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function createRuleCf($kategori_id, $soal_id, $soal_nama, $nilai_pakar)
    {
        $query = "INSERT INTO rule_cf(kategori_id, soal_id, soal_nama, nilai_pakar) VALUES('$kategori_id', '$soal_id', '$soal_nama', '$nilai_pakar')";
        $result = $this->db->conn->query($query);
        return $result;
    }


    // Read Rule CF
    public function readRuleCf()
    {
        $query = "SELECT * FROM rule_cf";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 

    
    // Update Rule CF
    public function updateRuleCf($rule_cf_id, $kategori_id, $soal_id, $soal_nama, $nilai_pakar)
    {
        $query = "UPDATE rule_cf SET kategori_id ='$kategori_id' AND soal_id = '$soal_id' AND soal_nama = '$soal_nama' AND nilai_pakar = '$nilai_pakar' WHERE rule_cf_id = $rule_cf_id";
        $result = $this->db->conn->query($query);
        return $result;
    }


    // Delete Rule CF
    public function deleteRuleCf($rule_cf_id)
    {
        $query = "DELETE FROM rule_cf WHERE rule_cf_id =$rule_cf_id";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function createSbp($laporan_jawaban_id, $rule_cf_id, $kategori_id, $soal_nama, $nilai_user, $nilai_pakar, $cf_gabungan, $hasil_cf)
    {
        $query = "INSERT INTO sbp(laporan_jawaban_id, rule_cf_id, kategori_id, soal_nama, nilai_user, nilai_pakar, cf_gabungan, hasil_cf) VALUES('$laporan_jawaban_id', '$rule_cf_id', '$kategori_id', '$soal_nama', '$nilai_user', '$nilai_pakar', '$cf_gabungan', '$hasil_cf')";
        $result = $this->db->conn->query($query);
        return $result;
    }


    // Read SBP
    public function readSbp()
    {
        $query = "SELECT * FROM sbp";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } 

    
    // Update SBP
    public function updateSbp($sbp_id, $cf_gabungan, $hasil_cf)
    {
        $query = "UPDATE sbp SET cf_gabungan = '$cf_gabungan' AND hasil_cf = '$hasil_cf' WHERE sbp_id = $sbp_id";
        $result = $this->db->conn->query($query);
        return $result;
    }


    // Delete SBP
    public function deleteSbp($sbp_id)
    {
        $query = "DELETE FROM sbp WHERE sbp_id = $sbp_id";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function createSurvey($user_id, $survey_jenis, $survey_kode, $survey_nama, $survey_deskripsi, $survey_tanggal)
    {
        $query = "INSERT INTO survey(user_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal) VALUES($user_id, $survey_jenis, $survey_kode, $survey_nama, $survey_deskripsi, $survey_tanggal)";
        $result = $this->db->conn->query($query);
        return $result;
    }
    //  Read Survey
    public function readSurvey()
    {
        $query = "SELECT * FROM survey";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    // Update Survey
    public function updateSurvey($user_id, $survey_jenis, $survey_nama, $survey_deskripsi)
    {
        $query = "UPDATE survey SET survey_jenis ='$survey_jenis' AND  survey_nama ='$survey_nama' AND survey_deskripsi = '$survey_deskripsi' WHERE user_id = $user_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Delete Survey
    public function deleteSurvey($user_id)
    {
        $query = "DELETE FROM survey WHERE user_id =$user_id";
        $result = $this->db->conn->query($query);
        return $result;
    }
    // Create Survey Soal
    public function createSurveySoal($kategori_id, $no_urut, $soal_nama)
    {
        $query = "INSERT INTO survey_soal (kategori_id, no_urut, soal_nama) VALUES (?, ?, ?)";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("iis", $kategori_id, $no_urut, $soal_nama);
        return $stmt->execute();
    }
    //  Read Survey Soal
    public function readSurveySoal()
    {
        $query = "SELECT * FROM survey_soal";
        $result = $this->db->conn->query($query);
        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    //Read Survey Soal By Id
        public function readSurveySoalById($soal_id)
    {
        $query = "SELECT * FROM survey_soal WHERE soal_id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $soal_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Read Survey Soal By Kategori Id
    public function readSurveySoalByKategoriId($kategori_id)
{
    $query = "SELECT * FROM survey_soal WHERE kategori_id = ?";
    $stmt = $this->db->conn->prepare($query);
    $stmt->bind_param("i", $kategori_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

    // Update Survey Soal
    public function updateSurveySoal($kategori_id, $no_urut, $soal_nama)
    {
        $query = "UPDATE survey_soal SET no_urut = ?, soal_nama = ? WHERE soal_id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("isi", $no_urut, $soal_nama, $soal_id);
        return $stmt->execute();
    }
    
    // Delete Survey Soal
    public function deleteSurveySoal($soal_id)
    {
        $query = "DELETE FROM survey_soal WHERE soal_id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $soal_id);
        return $stmt->execute();
    }

    // Delete all questions by category ID
public function deleteSurveySoalByCategoryId($kategori_id)
{
    $query = "DELETE FROM survey_soal WHERE kategori_id = ?";
    $stmt = $this->db->conn->prepare($query);
    $stmt->bind_param("i", $kategori_id);
    $result = $stmt->execute();
    return $result;
}

    // Read Kategori Soal by Name
public function readKategoriSoalByName($kategori_nama)
{
    $query = "SELECT * FROM kategori_soal WHERE kategori_nama = '$kategori_nama'";
    $result = $this->db->conn->query($query);
    return $result->fetch_assoc();
}



// Read Survey Soal by Category ID
public function readSurveySoalByCategory($kategori_id)
{
    $query = "SELECT * FROM survey_soal WHERE kategori_id = '$kategori_id'";
    $result = $this->db->conn->query($query);
    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// Delete Kategori Soal by Name
public function deleteKategoriSoalByName($kategori_nama)
{
    $query = "DELETE FROM kategori_soal WHERE kategori_nama = '$kategori_nama'";
    $result = $this->db->conn->query($query);
    return $result;
}

}
