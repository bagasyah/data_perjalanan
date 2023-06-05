<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perjalanan");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan data yang ditambahkan dari form
$gambar = $_FILES['gambar']['name'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$alamat_awal = $_POST['alamat_awal'];
$alamat_tujuan = $_POST['alamat_tujuan'];
$km_awal = $_POST['km_awal'];
$km_akhir = $_POST['km_akhir'];
$km_total = $_POST['km_total'];

// Upload gambar
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);

// Menyimpan data laporan ke database
$query = "INSERT INTO laporan_perjalanan (gambar, nama, tanggal, alamat_awal, alamat_tujuan, km_awal, km_akhir, km_total)
          VALUES ('$gambar', '$nama', '$tanggal', '$alamat_awal', '$alamat_tujuan', '$km_awal','$km_akhir', '$km_total')";
$result = mysqli_query($conn, $query);

// Mengalihkan kembali ke halaman utama setelah data ditambahkan
header("Location: index.php");
exit();

// Tutup koneksi ke database
mysqli_close($conn);
?>