<?php
session_start();
require_once("src/class/usersGestion.php");
$user = new usersGestion;


//var_dump($_SESSION);

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $user->connection($email, $password);

    }

//   if (isset($_SESSION["username"])) {  
//       header("Location: index.php");
//   }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <?php include('header.php') ?>
    <main class="form-main">
        <form method="post">

        <label for="email">Email :</label>
        <input type="email" name="email" id="email">

        <label for="password">password :</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="submit" >Se Connecter</button>

        <a href="register.php">Pas encore inscrit ?</a>

        </form>
    </main>
    <?php include('footer.php') ?>
</body>
</html>