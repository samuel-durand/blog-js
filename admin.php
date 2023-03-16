<?php

session_start();
require_once("usersGestion.php");
$user = new usersGestion;    
    $request = $user->getData()->prepare('SELECT u.`id` , `email` , `username` , `register_date` , `rights`, `description` FROM users u INNER JOIN roles ON roles.id = u.role_id ORDER BY `register_date` DESC ');
    $request->execute();
    $displayUserAndRight = $request->fetchAll(PDO::FETCH_ASSOC);
    $resquestUser = $user->getData()->prepare('SELECT * FROM user');
    //var_dump($displayUserAndRight); 

    //$_POST["role_id"];


    if (isset($_POST["submit"])) {
        $right = $_POST['right'];
        $id_row = $_POST["role_id"];
        $requestRight = $user->getData()->prepare('UPDATE roles SET rights = (?) WHERE id = (?)');
        $requestRight->execute(array($right, $id_row));
        echo "HELOOOOOO";
    }
    var_dump($_POST['right']);
    var_dump($_POST['role_id']);
        
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
            <h2><a href="logout.php">logout </a></h2><h2>connecté en tant que :<?= $_SESSION["username"]; ?></h2>
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
            </thead><tbody>
                <?php foreach ($displayUserAndRight as $user): ?>
                    <tr>            
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['register_date'] ?></td>
                        <td><?= $user['rights'] ?></td>
                        <td><?= $user['description'] ?></td>
                        <?php if($user['username'] == 'admin'): ?>
                        <td>toi meme tu sais</td>
                        <?php else: ?>
                        <td><a href="delete_user.php?id=<?= $user['id'];?>">delete <?= $user['username']; ?> </a></td>
                        <td>
                            <form method="post">
                            <label for="right"><?= $user['id'] ?> Changer les droits</label>
                                <select name="right" id="right">
                                    <option value="subscribed">subscribed</option>
                                    <option value="moderator">moderator</option>
                                    <option value="administrator">administrator</option>
                                </select>
                                <input type="hidden" name="role_id" value="<?= $user['id'];?>">
                                <input type="submit" name="submit" value="valider">
                            </form></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
        </tbody>
        </table>
    </section>
</body>
</html>