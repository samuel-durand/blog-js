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
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

    <?php include('header.php') ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" class="p-5 rounded shadow-lg">
                    <h1 class="text-center mb-4">Inscription</h1>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur :</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary d-block w-100 mt-4">S'inscrire</button>

                    <p class="text-center mt-4">Déjà inscrit ? <a href="login.php">Se connecter</a></p>
                </form>
            </div>
        </div>
    </main>

    <?php include('footer.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
