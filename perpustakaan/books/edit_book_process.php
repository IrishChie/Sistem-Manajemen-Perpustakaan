<?php
$conn = new mysqli('localhost', '', 'root', '$dbname');
$book_id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$publication_year = $_POST['publication_year'];

$sql = "UPDATE books SET title = '$title', author = '$author', publication_year = '$publication_year' WHERE id = '$book_id'";
$conn->query($sql);

echo "Buku berhasil diupdate";
$conn->close();
?>
