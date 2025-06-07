<?php
// Koneksi ke database
$koneksi = new mysqli ("localhost", "root", "", "db_cms");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$fullname     = $_POST['fullname'];
$birth_date   = $_POST['birth_date'];
$address      = $_POST['address'];
$school       = $_POST['school'];
$grade        = $_POST['grade'];
$parent       = $_POST['parent'];
$parent_job   = $_POST['parent_job'];
$parent_phone = $_POST['parent_phone'];
if (!preg_match('/^[0-9]+$/', $parent_phone)) {
    echo "Nomor HP hanya boleh berisi angka!";
    exit;
}


// Simpan ke tabel registration
$sql = "INSERT INTO registration 
(fullname, birth_date, address, school, grade, parent, parent_job, parent_phone) 
VALUES 
('$fullname', '$birth_date', '$address', '$school', '$grade', '$parent', '$parent_job', '$parent_phone')";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil disimpan!";
} else {
    echo "Gagal menyimpan data: " . $koneksi->error;
}

$koneksi->close();

?>