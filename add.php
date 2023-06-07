<!DOCTYPE html>
<html>

<head>
    <title>Tambah Laporan Perjalanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #131315;
            /* Ganti dengan warna latar belakang yang Anda inginkan */
        }

        .container {
            position: absolute;
            top: 45%;
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
        <h2>Tambah Laporan Perjalanan</h2>
        <form method="POST" action="insert.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" name="gambar" id="gambar" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
            </div>
            <div class="form-group">
                <label for="alamat_awal">Alamat Awal</label>
                <input type="text" class="form-control" name="alamat_awal" id="alamat_awal" required>
            </div>
            <div class="form-group">
                <label for="alamat_tujuan">Alamat Tujuan</label>
                <input type="text" class="form-control" name="alamat_tujuan" id="alamat_tujuan" required>
            </div>
            <div class="form-group">
                <label for="km_awal">KM Awal</label>
                <input type="number" step="0.01" class="form-control" name="km_awal" id="km_awal" required>
            </div>
            <div class="form-group">
                <label for="km_akhir">KM Akhir</label>
                <input type="number" step="0.01" class="form-control" name="km_akhir" id="km_akhir" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Laporan</button>
        </form>
    </div>
</body>

</html>