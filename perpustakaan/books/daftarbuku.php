<?php
session_start();
$conn = new mysqli('localhost', '', 'root', '$dbname');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$user_name = $_SESSION['user_name']; // Pastikan nama pengguna sudah tersimpan dalam session saat login

// Tanggal saat ini
$current_date = date('d F Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 20px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .logout-button {
            text-align: right;
            margin-bottom: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .book-list {
            max-width: 900px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .book-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .book-list li {
            background-color: #f5f5f5;
            margin: 15px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .book-list li:hover {
            background-color: #e0e0e0;
        }

        .book-list li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .book-list li a:hover {
            color: #0056b3;
        }

        .book-list li span {
            display: block;
            margin-top: 5px;
            font-size: 0.9rem;
            color: #666;
        }

        .book-list .actions {
            display: flex;
            gap: 10px;
        }

        .book-list .actions button {
            background-color: #512da8;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .book-list .actions button:hover {
            background-color: #3c3cff;
        }
    </style>
</head>
<body>
    <div class='logout-button'>
        <a href='logout.php' class='btn btn-danger'>Logout</a>
    </div>

    <!-- Tambahkan ucapan selamat datang dan tanggal -->
    <h2>Hallo, <?php echo $user_name; ?>! Hari ini tanggal <?php echo $current_date; ?></h2>

    <h1>Daftar Buku</h1>
    <div class='book-list'>

    <?php
    // Untuk anggota: dapat meminjam dan mengembalikan buku
    if ($user_role == 'anggota') {
        echo "<h2>Buku yang tersedia untuk dipinjam</h2>";
        $result = $conn->query("SELECT * FROM books WHERE available = 1");
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['title'] . " oleh " . $row['author'] . " (" . $row['publication_year'] . ") 
            <span><a href='borrow_book.php?book_id=" . $row['id'] . "'>Pinjam</a></span></li>";
        }
        echo "</ul>";

        // Buku yang sedang dipinjam oleh pengguna
        echo "<h2>Buku yang sedang Anda pinjam</h2>";
        $result = $conn->query("SELECT b.title, bb.id as borrow_id FROM borrowed_books bb 
                                JOIN books b ON bb.book_id = b.id 
                                WHERE bb.user_id = '$user_id' AND bb.return_date IS NULL");
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['title'] . " 
            <span><a href='return_book.php?borrow_id=" . $row['borrow_id'] . "'>Kembalikan</a></span></li>";
        }
        echo "</ul>";
    }
    // Untuk pustakawan: bisa mengedit buku
    elseif ($user_role == 'pustakawan') {
        echo "<h2>Buku yang dapat diedit</h2>";
        $result = $conn->query("SELECT * FROM books");
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['title'] . " oleh " . $row['author'] . " (" . $row['publication_year'] . ") 
            <span><a href='edit_book.php?id=" . $row['id'] . "'>Edit</a></span></li>";
        }
        echo "</ul>";
    }

    $conn->close();
    ?>
    </div>
    <style>
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
    <footer>© Copyright 2024</footer>
</body>
</html>
