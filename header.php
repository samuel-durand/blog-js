<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="register.php">S'inscrire</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="article.php">Article</a></li>
                <?php if(isset($_SESSION['login']));?>
                <li><a href="creation-article.php">crée un article</a></li>
                <li><a href="logout.php">se déconnecter</a></li>
            </ul>
        </nav>
    </header>
    
</html>