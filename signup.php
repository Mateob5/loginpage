<?php 
require 'dbconexion.php';

$message = '';

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = "Successfull";
    } else {
        $message = "Error";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/style.css">
        <title>LoginPage</title>
    </head>
    <body>
        <!-- Comprobante envio de informacion - dudoso-->
        <?php if(!empty($message)):?>
            <p><?= $message ?></p>
        <?php endif; ?>
        
        
        <div class="header">
            <nav class="nav-bar">
                <h2 class="logo"><a href="index.php">LoginPage</a></h2>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./login.php">Login</a></li>
                    <li><a href="./signup.php">Sign-Up</a></li>
                </ul>
                <button type="submit">Contact</button>
            </nav>
        </div>
        <div class="form-div">
            <h2 class="form-title">Sign Up</h2>
            <form action="signup.php" method="POST">
                <input type="text" placeholder="Nombre" name="name" id="name" require>
                <input type="text" placeholder="Apellido" name="lastname" id="lastname">
                <input type="email" placeholder="Correo" name="email" id="email" require>
                <input type="password" placeholder="Contraseña" name="password" id="password" require>
                <button type="submit" name="submit">Enviar</button>
                <br><br>
            </form>
        </div>
    </body>
</html>