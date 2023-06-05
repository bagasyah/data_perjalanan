<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perjalanan");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan data yang diupdate dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$alamat_awal = $_POST['alamat_awal'];
$alamat_tujuan = $_POST['alamat_tujuan'];
$km_awal = $_POST['km_awal'];
$km_akhir = $_POST['km_akhir'];

// Cek apakah ada file gambar yang diupload
if ($_FILES['gambar']['name'] != '') {
    $gambar = $_FILES['gambar']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);

    // Update data laporan termasuk gambar
    $query = "UPDATE laporan_perjalanan SET gambar='$gambar', nama='$nama', tanggal='$tanggal', alamat_awal='$alamat_awal', alamat_tujuan='$alamat_tujuan', km_awal='$km_awal', km_akhir='$km_akhir' WHERE id='$id'";
} else {
    // Update data laporan tanpa mengubah gambar
    $query = "UPDATE laporan_perjalanan SET nama='$nama', tanggal='$tanggal', alamat_awal='$alamat_awal', alamat_tujuan='$alamat_tujuan', km_awal='$km_awal' , km_akhir='$km_akhir' WHERE id='$id'";
}

$result = mysqli_query($conn, $query);

// Mengalihkan kembali ke halaman utama setelah data diupdate
header("Location: index.php");
exit();

// Tutup koneksi ke database
mysqli_close($conn);
?>