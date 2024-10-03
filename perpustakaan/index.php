<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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

        nav {
            background-color: #512da8;
            width: 100%;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        nav a {
            float: right;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #333; /* Change text color to black */
            margin-bottom: 20px;
        }

        .bulletin {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
            font-size: 16px;
        }

        .bulletin li {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }

        .btn-primary {
            background-color: #5d5dff;
        }

        .btn-primary:hover {
            background-color: #3c3cff;
        }

        .btn-secondary {
            background-color: #5d5dff;
        }

        .btn-secondary:hover {
            background-color: #3c3cff;
        }

        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav>
        <a href="register.php" class="btn btn-primary">Register</a>
        <a href="login.php" class="btn btn-secondary">Login</a>
    </nav>

    <div class="container">
        <h1>Selamat datang di Sistem Manajemen Perpustakaan</h1>
        <p>Sistem ini memungkinkan Anda untuk meminjam buku jika Anda terdaftar sebagai anggota, atau mengelola buku jika Anda terdaftar sebagai pustakawan.</p>
        
        <ul class="bulletin">
            <li>1. Index yang terdapat button Register untuk Mendaftar dan button Login untuk masuk ke halaman selanjutnya.</li>
            <li>2. Daftar Buku, Di dalam Daftar Buku akan terlihat buku yang tersedia untuk di pinjam dan buku yang sedang anda pinjam.</li>
            <li>3. Sebagai Pustakawan pada Daftar Buku Pustakawan bisa mengedit mulai dari judul buku,pengarang dan tahun penerbitan buku.</li>
        </ul>
    </div>

    <footer>© Copyright 2024</footer>
</body>
</html>
