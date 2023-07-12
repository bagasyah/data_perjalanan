<?php
include 'inc/db.php';

$id = $_GET['id'];

$query = "UPDATE users SET status='rejected' WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    header("Location: proses_registrasi.php");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
?>