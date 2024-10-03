<?php
session_start();
$conn = new mysqli('localhost', '', 'root', '$dbname');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah tabel books kosong, dan tambahkan beberapa buku jika kosong
$result = $conn->query("SELECT COUNT(*) as total FROM books");
$row = $result->fetch_assoc();
if ($row['total'] == 0) {
    // Tambahkan beberapa buku contoh jika tabel kosong
    $conn->query("INSERT INTO books (title, author, publication_year, available) VALUES 
    ('The Great Gatsby', 'F. Scott Fitzgerald', 1925, 1),
    ('1984', 'George Orwell', 1949, 1),
    ('To Kill a Mockingbird', 'Harper Lee', 1960, 1),
    ('Pride and Prejudice', 'Jane Austen', 1813, 1),
    ('Moby Dick', 'Herman Melville', 1851, 1)");
}

// Mendapatkan ID buku dari URL
$book_id = $_GET['book_id'];
$user_id = $_SESSION['user_id'];

// Periksa apakah buku masih tersedia
$result = $conn->query("SELECT available FROM books WHERE id = '$book_id'");
$book = $result->fetch_assoc();

if ($book['available'] == 1) {
    // Tandai buku sebagai dipinjam
    $conn->query("UPDATE books SET available = 0 WHERE id = '$book_id'");
    
    // Catat peminjaman di borrowed_books
    $borrow_date = date('Y-m-d');
    $conn->query("INSERT INTO borrowed_books (user_id, book_id, borrow_date) VALUES ('$user_id', '$book_id', '$borrow_date')");
    
    echo "Buku berhasil dipinjam!";
} else {
    echo "Buku sudah dipinjam.";
}

$conn->close();

// Arahkan kembali ke daftar buku
header("Location: daftarbuku.php");
exit();
?>
