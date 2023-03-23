<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon site</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <header>
        <nav>
            <div class="mobile-menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="register.php">S'inscrire</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="article.php">Article</a></li>
                <?php if(isset($_SESSION['login']));?>
                <li><a href="creation-article.php">Créer un article</a></li>
                <li><a href="logout.php">Se déconnecter</a></li>
            </ul>
        </nav>
    </header>
    
    <script src="menu.js"></script>
</body>
</html>
