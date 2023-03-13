<?php
require_once("usersGestion.php");
$user = new usersGestion;
    
    $request = $user->getData()->prepare('SELECT `email` , `username` , `register_date` , `rights`, `description` FROM users INNER JOIN roles ON roles.id = users.role_id ORDER BY `register_date` DESC ');
    $request->execute();
    $displayUserAndRight = $request->fetchAll(PDO::FETCH_ASSOC);
    var_dump($displayUserAndRight); 

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
        <nav style="display: flex; justify-content: center; font-family: monospace; border: 1px solid;">
            <h1>Admin</h1>
        </nav>
    </header>
    <section>
        
    </section>
</body>
</html>