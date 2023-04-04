<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <footer>
        <ul>
            <?php if(isset($_SESSION['username'])) :?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="article.php">Article</a></li>
                    <li><a href="logout.php">Se déconnecter</a></li>
                    <li><a href="creation-article.php">Créer un article</a></li>
            <?php else: ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="article.php">Article</a></li>
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="register.php">S'inscrire</a></li>
            <?php endif; ?>
        </ul>
    </footer>
    
</body>
</html>