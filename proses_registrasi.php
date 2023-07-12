<!DOCTYPE html>
<html>

<head>
    <title>Laporan Perjalanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Laporan Perjalanan</h1>

        <?php
        $conn = new mysqli("localhost", "root", "", "perjalanan");

        // Memeriksa apakah koneksi berhasil
        if ($conn->connect_errno) {
            echo "Gagal terhubung ke MySQL: " . $conn->connect_error;
            // Keluar dari skrip atau lakukan tindakan lain sesuai kebutuhan
        }

        echo "<a href='logout.php' class='btn btn-danger'>Logout</a>";
        $query = "SELECT * FROM users WHERE status_user ='pending'";
        $result = $conn->query($query);

        echo "<h2>Daftar Registrasi User</h2>";
        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Username</th>";
            echo "<th>Status</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['status_user'] . "</td>";
                echo "<td>";
                echo "<a href='approve.php?id=" . $row['id'] . "' class='btn btn-success'>Approve</a> ";
                echo "<a href='reject.php?id=" . $row['id'] . "' class='btn btn-warning'>Reject</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Tidak ada registrasi user yang menunggu persetujuan.";
        }

        // Menutup koneksi mysqli
        $conn->close();
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>