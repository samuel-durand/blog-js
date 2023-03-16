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
                <li><a href="#">Accueil</a></li>
                <li><a href="#">S'inscrire</a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="#">Article</a></li>
                <?php if(isset($_SESSION['login']));?>
                <li><a href="#">crée un article</a></li>
                <li><a href="#">se déconnecter</a></li>
            </ul>
        </nav>
    </header>
    
</html>