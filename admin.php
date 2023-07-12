<!DOCTYPE html>
<html>

<head>
    <title>Laporan Daftar Perjalanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
            /* Ubah menjadi putih */
        }

        .table-container {
            padding: 40px;
        }

        .table {
            color: white;
            background: #2d2632;
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

        .registration-btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Daftar Laporan Perjalanan</h2>

        <div class="text-right mb-3">
            <form method="GET" action="search.php" class="form-inline search-form">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari...">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <a href="add.php" class="btn btn-success add-report-btn">Tambah Laporan</a>
            <a href="logout.php" class="btn btn-danger logout-btn">Logout</a>
            <a href="proses_registrasi.php" class="btn btn-info registration-btn">Proses Registrasi</a>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Alamat Awal</th>
                        <th>Alamat Tujuan</th>
                        <th>KM Awal</th>
                        <th>KM Akhir</th>
                        <th>Total KM</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $conn = mysqli_connect("localhost", "root", "", "perjalanan");
                    if (!$conn) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    // Ambil data laporan dari database
                    $query = "SELECT * FROM laporan_perjalanan";
                    $result = mysqli_query($conn, $query);

                    // Tampilkan data dalam tabel
                    while ($row = mysqli_fetch_assoc($result)) {
                        $row['km_total'] = $row['km_akhir'] - $row['km_awal'];
                        echo "<tr>";
                        echo "<td><img src='uploads/{$row['gambar']}' width='100'></td>";
                        echo "<td>{$row['nama']}</td>";
                        echo "<td>{$row['tanggal']}</td>";
                        echo "<td>{$row['alamat_awal']}</td>";
                        echo "<td>{$row['alamat_tujuan']}</td>";
                        echo "<td>{$row['km_awal']}</td>";
                        echo "<td>{$row['km_akhir']}</td>";
                        echo "<td>{$row['km_total']}</td>";
                        echo "<td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-primary'>Edit</a> 
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>
                        </td>";
                        echo "</tr>";
                    }

                    // Tutup koneksi ke database
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>