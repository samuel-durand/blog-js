<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit;
}

$user = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
</head>
<body>
  <h1>Bienvenue, <?php echo $user['login']; ?>!</h1>
  <p>Vous êtes maintenant connecté.</p>
</body>
</html>
