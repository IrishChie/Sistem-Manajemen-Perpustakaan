<?php
session_start();
$conn = new mysqli('localhost', '', 'root', '$dbname');

// Tangkap data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah user dengan email tersebut ada
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        // Arahkan ke halaman daftar buku
        header("Location: daftarbuku.php");
        exit();
    } else {
        // Password salah
        $_SESSION['error'] = "Password salah.";
        header("Location: login.php");
        exit();
    }
} else {
    // Email tidak ditemukan
    $_SESSION['error'] = "Email tidak ditemukan.";
    header("Location: login.php");
    exit();
}

$conn->close();
?>
