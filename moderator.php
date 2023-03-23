<?php

session_start();
require_once("usersGestion.php");

if (!empty($_SESSION['username']) && $_SESSION['rights'] != "moderator"){ // si l'utilisateur n'est pas modérator ou administrator, il est rediriger vers la page d'accueil.php
    header("Location: usersGestion.php");
    exit;
} else if (empty($_SESSION)) {
    header("Location: usersGestion.php");
    exit;
}

//$user = new usersGestion;
    
    // var_dump($id_user);
    // var_dump($_POST["role_id"]);

    $request = $user->getData()->prepare('SELECT u.`id` , `email` , `username` , `role_id` , `register_date` , `rights`, `description` FROM users u INNER JOIN roles ON roles.id = u.role_id ORDER BY `register_date` DESC ');
    $request->execute();
    $displayUserAndRight = $request->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($displayUserAndRight);
    
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <header>
        <nav style="display: flex; justify-content: center; justify-content: space-evenly; font-family: monospace; border: 1px solid; flex-wrap:wrap;">
            <h1>Moderation</h1>
            <h2><a href="logout.php">logout </a></h2><h2>connecté en tant que :<?= $_SESSION["username"]; ?> droit : <?= $_SESSION["rights"] ?></h2>
        </nav>
    </header>
    <section>

        <table border style="margin : auto;">
            <thead>
                <tr>
                    <th>email</th>
                    <th>username</th>
                    <th>register_date</th>
                    <th>droit</th>
                    <th>description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($displayUserAndRight as $user): ?>
                    <tr>            
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($user['register_date'])) ?></td>
                        <td><?= $user['rights'] ?></td>
                        <td><?= $user['description'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </section>
</body>
</html>