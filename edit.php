<!DOCTYPE html>
<html>

<head>
    <title>Edit Laporan Perjalanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #131315;
            /* Ganti dengan warna latar belakang yang Anda inginkan */
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1200px;
            padding: 40px;
            transform: translate(-50%, -50%);
            color : white;
            background: #2d2632;
            box-shadow: 0 15px 25px rgba(143, 124, 236, 0.7);
            border-radius: 10px;
        }
        </style>
</head>

<body>
    <div class="container mt-4">
        <?php
        // Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "perjalanan");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // Mendapatkan ID laporan dari URL
        $id = $_GET['id'];

        // Mendapatkan data laporan berdasarkan ID
        $query = "SELECT * FROM laporan_perjalanan WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Menampilkan form edit
        ?>
        <h2>Edit Laporan Perjalanan</h2>
        <form method="POST" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" name="gambar" id="gambar">
                <img src="uploads/<?php echo $row['gambar']; ?>" width="50">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal"
                    value="<?php echo $row['tanggal']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat_awal">Alamat Awal</label>
                <input type="text" class="form-control" name="alamat_awal" id="alamat_awal"
                    value="<?php echo $row['alamat_awal']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat_tujuan">Alamat Tujuan</label>
                <input type="text" class="form-control" name="alamat_tujuan" id="alamat_tujuan"
                    value="<?php echo $row['alamat_tujuan']; ?>">
            </div>
            <div class="form-group">
                <label for="km_awal">KM Awal</label>
                <input type="number" step="0.01" class="form-control" name="km_awal" id="km_awal"
                    value="<?php echo $row['km_awal']; ?>">
            </div>
            <div class="form-group">
                <label for="km_akhir">KM Akhir</label>
                <input type="number" step="0.01" class="form-control" name="km_akhir" id="km_akhir"
                    value="<?php echo $row['km_akhir']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update Laporan</button>
        </form>
    </div>
</body>

</html>