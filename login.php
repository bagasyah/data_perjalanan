<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perjalanan");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data yang di-submit dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengecek kecocokan username dan password dalam database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil, simpan informasi pengguna dalam session
        $_SESSION['username'] = $username;

        // Redirect ke halaman utama setelah login berhasil
        header("Location: index.php");
        exit();
    } else {
        echo "Username atau password salah.";
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Login Pengguna</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>