<?php

session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: ./dashboard.php');
}

require 'dbconexion.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $message = 'Por favor, introduce un correo electrónico válido';

  } else {
    if (strlen($_POST['password']) < 6) {
      $message = 'La contraseña debe tener al menos 6 caracteres';

    } else {
      $records = $conn->prepare('SELECT user_id, email, password FROM users WHERE email = :email');
      $records->bindParam(':email', $_POST['email']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['user_id'];
        header("Location: ./dashboard.php");

      } else {
        $message = 'Lo siento, esas credenciales no coinciden';
      
        }
    }
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
        <h2 class="form-title">Login</h2>
        <form action="login.php" method="POST">
            <input type="email" placeholder="Correo" name="email" id="email" require>
            <input type="password" placeholder="Contraseña" name="password" id="password" require>
            <button type="submit" name="submit" onclick="submitMessageL();">Enviar</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>