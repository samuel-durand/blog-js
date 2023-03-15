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
<script>
document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  // Récupération des données du formulaire
  var email = document.getElementsByName('email')[0].value;
  var password = document.getElementsByName('password')[0].value;
  
  // Création d'un objet FormData pour envoyer les données via AJAX
  var formData = new FormData();
  formData.append('email', email);
  formData.append('password', password);
  
  // Envoi de la requête AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'login.php', true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      // Succès de la requête AJAX, vérification de la réponse
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        // Connexion réussie, redirection vers la page profil.php
        window.location.href = 'profil.php';
      } else {
        // Connexion échouée, affichage d'un message d'erreur
        alert('Email ou mot de passe incorrect.');
      }
    } else {
      // Erreur de la requête AJAX, affichage d'un message d'erreur
      alert('Une erreur est survenue lors de la connexion.');
    }
  };
  xhr.send(formData);
});
</script>

</body>
</html>
