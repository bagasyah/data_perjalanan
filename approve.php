<?php
$conn = new mysqli("localhost", "root", "", "perjalanan");

if ($conn->connect_errno) {
    echo "Gagal terhubung ke MySQL: " . $conn->connect_error;
    // Keluar dari skrip atau lakukan tindakan lain sesuai kebutuhan
}

$id = $_GET['id'];

$query = "UPDATE users SET status='approved' WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    $conn->close();
    header("Location: proses_registrasi.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>