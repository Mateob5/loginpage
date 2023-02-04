<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: ./login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="header">
        <nav class="nav-bar">
            <h2 class="logo"><a href="#">LoginPage</a></h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <button type="submit">Contact</button>
        </nav>
    </div>
    <h1 class="menu-title">Logout</h1>
    <main>
    </main>
    <script src="index.js"></script>
</body>
</html>
