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
        $user = mysqli_fetch_assoc($result);
        if ($user['status'] == 0) {
            echo "<script>alert('Akun Anda masih diproses oleh admin. Silakan ditunggu balasan dari admin.');</script>";
        } else {
            // Login berhasil, simpan informasi pengguna dalam session
            $_SESSION['username'] = $username;

            // Redirect ke halaman sesuai peran pengguna setelah login berhasil
            if ($user['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: user.php");
            }
            exit();
        }
    } else {
        echo "<script>alert('Username atau password salah.');</script>";
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-box">

        <h2>Login Pengguna</h2>
        <center>
            <button onclick="toggle()">
                light Mode 🔦
            </button>
        </center>

        <form method="POST" action="login.php">
            <div class="user-box">
                <input type="text" class="form-control" name="username" id="username" style="color: white;" required>
                <label for="username">Username</label>

            </div>
            <div class="user-box">
                <input type="password" class="form-control" name="password" id="password" style="color: white;"
                    required>
                <label for="password">Password</label>
            </div>

            <div class="button-form">
                <button id="submit" type="submit" class="btn btn-primary">Login</button>
                <div id="register">
                    Dont have an account ?
                    <a href="register.php"> Register</a>
                </div>
            </div>
        </form>
    </div>
    <script src="java.js"></script>
</body>

</html>