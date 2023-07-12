<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika pengguna belum login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Daftar Perjalanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: white;
            /* Ganti dengan warna latar belakang yang Anda inginkan */
        }

        .table-container {
            padding: 40px;
        }

        .table {
            color: black;
            background: white;
            box-shadow: 0 15px 25px rgba(143, 124, 236, 0.7);
            border-radius: 10px;
        }

        h2 {
            color: white;
        }

        .search-form {
            margin-bottom: 10px;
        }

        .search-form .form-group {
            margin-right: 10px;
        }

        .logout-btn {
            margin-top: 10px;
            margin-left: 10px;
        }

        .add-report-btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div>
        <?php
        include 'inc/db.php';

        $user_id = $_SESSION['user_id'] ?? null;
        $role = $_SESSION['role'] ?? null;
        echo "<a href='logout.php' class='btn btn-danger'>Logout</a>";
        $query = "SELECT * FROM laporan_perjalanan WHERE user_id='$user_id'";
        $result = $conn->query($query);
        echo "<a href='add.php' class='btn btn-primary'>Buat Laporan</a>";
        echo "<h2>Laporan Perjalanan</h2>";
        if ($result && $result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Alamat Awal</th>";
            echo "<th>Alamat Tujuan</th>";
            echo "<th>KM Awal</th>";
            echo "<th>KM Akhir</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['alamat_awal'] . "</td>";
                echo "<td>" . $row['alamat_tujuan'] . "</td>";
                echo "<td>" . $row['km_awal'] . "</td>";
                echo "<td>" . $row['km_akhir'] . "</td>";
                echo "<td>";
                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
                echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Belum ada laporan perjalanan.";
        }
        ?>
    </div>

</body>

</html>