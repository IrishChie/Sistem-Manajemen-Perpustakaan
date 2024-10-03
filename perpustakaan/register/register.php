<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  <!-- Link to the CSS file -->
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="password"], select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #512da8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color:  #3c3cff;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #5d5dff;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
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
    <a href="index.php" class="back-button">Kembali</a>

    <form action="register_process.php" method="POST">
        <h1>Register</h1>
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role" required>
            <option value="anggota">Anggota</option>
            <option value="pustakawan">Pustakawan</option>
        </select>
        <button type="submit">Register</button>
    </form>

    <footer>© Copyright 2024</footer>
</body>
</html>
