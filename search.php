<!DOCTYPE html>
<html>

<head>
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="mt-4 ml-4 mr-4">
        <h2>Hasil Pencarian</h2>
        <?php
        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "perjalanan");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Mendapatkan keyword pencarian dari form
        $keyword = $_GET['keyword'];

        // Cari laporan berdasarkan keyword
        $query = "SELECT * FROM laporan_perjalanan WHERE nama LIKE '%$keyword%' OR alamat_awal LIKE '%$keyword%' OR alamat_tujuan LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";
        $result = mysqli_query($conn, $query);

        // Tampilkan hasil pencarian
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Gambar</th>";
            echo "<th>Nama</th>";
            echo "<th>Tanggal</th>";
            echo "<th>Alamat Awal</th>";
            echo "<th>Alamat Tujuan</th>";
            echo "<th>KM Awal</th>";
            echo "<th>KM Akhir</th>";
            echo "<th>Total KM</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                $row['km_total'] = $row['km_akhir'] - $row['km_awal'];
                echo "<tr>";
                echo "<td><img src='uploads/{$row['gambar']}' width='50'></td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['tanggal']}</td>";
                echo "<td>{$row['alamat_awal']}</td>";
                echo "<td>{$row['alamat_tujuan']}</td>";
                echo "<td>{$row['km_awal']}</td>";
                echo "<td>{$row['km_akhir']}</td>";
                echo "<td>{$row['km_total']}</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Tidak ada hasil yang ditemukan.";
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
        ?>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
</body>

</html>