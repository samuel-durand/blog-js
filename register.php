<?php

include('classuser.php');

//verif form 

if(isset($_POST['submit'])) {

    if($_POST['email'] && $_POST['username'] && $_POST['password']){

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$register_date = date('Y-m-d-H:i:s');


$hash = password_hash($password, PASSWORD_BCRYPT);


//inseret la requette 

$user = new usersGestion ;
$user->register($email,$username,$hash);

    }else {
        echo "veuiller remplir les champs";
    }

}


    





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
<form id="inscription-form" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="username">Login:</label>
    <input type="text" name="username" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>
    
    <button name="submit" type="submit">Ajouter utilisateur</button>
</form>

<script>

</script>

</body>
</html>