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

// Ambil data dari form registrasi
$user = $_POST['username'];
$pass = $_POST['password'];

// Simpan data ke database
$sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil, silakan login!";
    // Redirect ke halaman login setelah registrasi berhasil
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
