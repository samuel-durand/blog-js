<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'article</title>
    <link rel="stylesheet" href="article.css">
    <script async src="creation-article.js"></script>
</head>
<body>
    <?php include('header.php') ?>
    <div class="margin">
    <main>
        <form method="post">
        <label for="titles" id="title">titre de l'article:</label>
        <input type="text" placeholder="votre titre">
        <div id="article">
            <div id="menu">
                <ul id="tabs">
                    <li class="active"> Format texte </li>
                    <li> Insertion image </li>
                    <li> Format image </li>
                    <label for="">change</label>
                    <select name="" id="">
                        <option value="">test</option>
                        <option value="">test</option>
                        <option value="">test</option>
                    </select>
                </ul>
            </div>
            <div id="tools">
                <div id="tools-text">
                    <img id="bold" src="img/g-herbe.jpg" alt="bold">
                    <img id="italic" src="img/i-color.jpg" alt="italic">
                    <img id="underligne" src="img/s.png" alt="underligne">
                    <img id="start" src="img/gauche.png" alt="start">
                    <img id="center" src="img/center.png" alt="center">
                    <img id="end" src="img/droite.png" alt="end">
                </div>
                <!-- <div id="insert-image">
                    <img src="" alt="insert-image">
                </div>
                <div id="tools-image">
                    <img src="" alt="width">
                    <img src="" alt="height">
                </div> -->
            </div>
            <div class="text">
                <textarea name="text1" id="text1" cols="169" rows="20"></textarea>
            </div>
        </div>
        <div class="pad-button">
        <button for="submit" id="button">Envoyer</button> 
        </div>
        </form>
    </main>
    </div>

    <?php include('footer.php') ?>

</body>
</html>