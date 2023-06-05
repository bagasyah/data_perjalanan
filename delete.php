<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perjalanan");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan ID laporan dari URL
$id = $_GET['id'];

// Hapus data laporan berdasarkan ID
$query = "DELETE FROM laporan_perjalanan WHERE id='$id'";
$result = mysqli_query($conn, $query);

// Mengalihkan kembali ke halaman utama setelah data dihapus
header("Location: index.php");
exit();

// Tutup koneksi ke database
mysqli_close($conn);
?>