<?php

include('./connect.php');



// Connexion à la base de données
$db = new PDO("mysql:host=localhost;dbname=blog_js", "root", "");

// Ajout de la colonne "register_date" à la table "users"
$stmt = $db->prepare("ALTER TABLE users ADD register_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP");
$stmt->execute();

// Récupération du dernier id_role
$stmt = $db->query("SELECT id_role FROM users ORDER BY id DESC LIMIT 1");
$last_id_role = $stmt->fetchColumn();

// Incrémentation du dernier id_role
$new_id_role = $last_id_role + 1;

// Hashage du mot de passe
$hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Insertion du nouvel enregistrement avec le nouveau id_role et l'heure d'inscription
$stmt = $db->prepare("INSERT INTO users (email, login, password, id_role, register_date) VALUES (:email, :login, :password, :id_role, NOW())");
$stmt->execute(array(
    "email" => $_POST["email"],
    "login" => $_POST["login"],
    "password" => $hashed_password,
    "id_role" => $new_id_role
));

echo "Enregistrement ajouté avec succès.";





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
<form id="inscription-form">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="login">Login:</label>
    <input type="text" name="login" required>
    
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Ajouter utilisateur</button>
</form>

<script>
    const form = document.getElementById('inscription-form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(form);
        
        fetch('register.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                window.location.href = 'login.php';
            }
        })
        .catch(error => console.error(error));
    });
</script>

</body>
</html>
