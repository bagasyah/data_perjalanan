<?php
include 'inc/db.php';

$id = $_GET['id'];

$query = "DELETE FROM laporan_perjalanan WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    header("Location: proses_registrasi.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>