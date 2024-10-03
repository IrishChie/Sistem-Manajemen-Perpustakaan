<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Buku</title>
</head>
<body>
    <div class="container">
        <h1>Edit Buku</h1>
        <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', '', 'root', '$dbname');
        $book_id = $_GET['id'];
        $result = $conn->query("SELECT * FROM books WHERE id = '$book_id'");
        $book = $result->fetch_assoc();
        ?>
        <form action="edit_book_process.php" method="POST">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <input type="text" name="title" value="<?= $book['title'] ?>" required>
            <input type="text" name="author" value="<?= $book['author'] ?>" required>
            <input type="text" name="publication_year" value="<?= $book['publication_year'] ?>" required>
            <button type="submit">Update</button>
        </form>
        <?php $conn->close(); ?>
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
