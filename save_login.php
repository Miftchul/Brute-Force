<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_login";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$user = $_POST['username'];
$pass = $_POST['password'];

// Cek apakah username dan password cocok dengan database
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Success Login!";
    // Di sini bisa dialihkan ke halaman lain jika login berhasil, misal:
    // header("Location: dashboard.php");
} else {
    echo "Failed Login! Username atau password salah.";
}

$conn->close();
?>
