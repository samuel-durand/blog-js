<?php


// Connexion à la base de données
$db = new PDO("mysql:host=localhost;dbname=blog_js", "root", "");

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Récupération de l'utilisateur avec l'email donné
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Vérification du mot de passe
    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie, redirection vers la page d'accueil ou autre page
        header('Location: profil.php');
        exit;
    } else {
        // Connexion échouée, affichage d'un message d'erreur
        echo 'Email ou mot de passe incorrect.';
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
    <title>Connexion</title>
</head>
<body>
<form method="post" id="login-form">

    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Se connecter</button>
</form>


</body>
</html>
