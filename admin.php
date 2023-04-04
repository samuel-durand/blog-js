<?php

session_start();
require_once("src/class/usersGestion.php");

    if (!empty($_SESSION['username']) && $_SESSION['rights'] != "administrator"){ // si l'utilisateur n'est pas modérator ou administrator, il est rediriger vers la page d'accueil.php
        header("Location: usersGestion.php");
        exit;
    } else if (empty($_SESSION)) {
        header("Location: usersGestion.php");
        exit;
    }


$user = new usersGestion;

//    var_dump($_POST);

    if (isset($_POST["submit"])) {
        
        $right = $_POST['right']; //sa valeur dépend du form avec option entre subscribed, moderator, administrator.
        $_POST["role_id"]; 
        $id_user = $_POST["user_id"];

        if ( $right == "subscribed") {
            $_POST["role_id"] = 3;
        } else if ($right == "moderator") {
            $_POST["role_id"] = 2;
        } else if ($right == "administrator") {
            $_POST["role_id"] = 1;
        }

        $id_role = $_POST["role_id"];

        $requestRight = $user->getData()->prepare('UPDATE users SET role_id = (?) WHERE id = (?)');
        $requestRight->execute(array($id_role, $id_user));
        //header('Refresh:0');
        
    }
    
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
            <h1>Admin</h1>
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
                    <th></th>
                    <th>changement de droit</th>
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
                    <?php if($user['username'] == 'admin'): ?>
                        <td>toi meme tu sais</td>
                    <?php else: ?>
                        <td><a href="delete_user.php?id=<?= $user['id'];?>">delete <?= $user['username']; ?> </a></td>
                        <td>
                            <form method="post">
                            <label for="right"><?= $user['id'] ?> Changer les droits r_u <?= $user['role_id'] ?></label>
                                <select name="right" id="right">
                                    <option value="subscribed">subscribed</option>
                                    <option value="moderator">moderator</option>
                                    <option value="administrator">administrator</option>
                                </select>
                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                <input type="hidden" name="role_id" value="">
                                <input type="submit" name="submit" value="valider">
                            </form>
                        </td>
                    <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>