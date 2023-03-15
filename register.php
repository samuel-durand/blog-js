<?php

include('classuser.php');

//verif form 

if(isset($_POST['submit'])) {

    if($_POST['email'] && $_POST['username'] && $_POST['password']){

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$register_date = date('Y-m-d-H:i:s');


//hash le password 

$hash = password_hash($password, PASSWORD_BCRYPT);


//inseret la requette 

$user = new usersGestion ;
$user->register($email,$username,$hash);

    }else {
        echo "veuiller remplir les champs";
    }
    header('location:login.php');
    exit();

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
<form id="formulaire" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="username">Login:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    
    <button name="submit" id="submit" type="submit">Ajouter utilisateur</button>
</form>

<script  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous">
$(document).ready(function(){
    $('#formulaire').submit(function(event){
        // empecher la soumission du formulaire
        event.preventDefault();

        // recuperer les données du formulaire
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();

        //envoyer les donner via ajax

        $.ajax({
            url: 'register.php', // form script
            type: 'POST',
            data: {
                email: email,
                username: username,
                password: password,
            },
            success: function(data){
                //si l'inscription marche
                window.location.href = 'login.php';
            },
            error: function(){
                //afficher erreur
            }
        });
    });
});

</script>

</body>
</html>