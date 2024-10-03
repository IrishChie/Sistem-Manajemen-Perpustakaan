<?php
session_start();
$conn = new mysqli('localhost', '', 'root', '$dbname');

// Cek koneksi ke database
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tangkap data dari form register
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hashing password untuk keamanan
$role = $_POST['role'];

// Cek apakah email sudah terdaftar
$email_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = $conn->query($email_check_query);
if ($result->num_rows > 0) {
    // Jika email sudah ada, simpan pesan error ke session dan kembali ke halaman register
    $_SESSION['error'] = "Email sudah terdaftar. Gunakan email lain.";
    header("Location: register.php");
    exit();
}

// Query untuk memasukkan data anggota/pustakawan baru ke database
$sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    // Jika data berhasil dimasukkan, arahkan pengguna ke halaman login
    header("Location: login.php");
    exit(); // Menghentikan eksekusi script agar redirect berjalan
} else {
    // Jika terjadi kesalahan dalam proses INSERT, simpan pesan error
    $_SESSION['error'] = "Registrasi gagal. Silakan coba lagi.";
    header("Location: register.php");
    exit();
}

$conn->close();
?>
