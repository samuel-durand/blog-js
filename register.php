<?php
session_start();

if (isset($_SESSION["username"])) {  
    header("Location: index.php");
}

require_once("src/class/usersGestion.php");
$user = new usersGestion;

if (isset($_POST['submit'])) {

    if ($_POST['email'] && $_POST['username'] && $_POST['password']) {
        
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user->register($email, $username, $password);

    } else {
        echo "veuillez remplir tout les champs"; 
    } 
} 


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body>

    <?php include('header.php') ?>
    <main class="form-main">
        <form  method="post" class="formulaire-register">

            <label for="email">Email :</label>
            <input type="email" name="email" id="email">

            <label for="username">username :</label>
            <input type="text" name="username" id="username">

            <label for="password">password :</label>
            <input type="password" name="password" id="password">

            <button type="submit" name="submit">s'inscrire</button>

            <a href="login.php">Déja inscrit ?</a>

        </form>
    </main>

    <?php include('footer.php') ?>
    
</body>
</html>