<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="comment.css">
    <title>Document</title>
</head>
<body>
    <?php include('header.php') ?>


    <main>
        <div>
            <p>titre</p>
            <p>userame</p>
            <p>role_id</p>
            <p>date</p>
            <p>categorie</p>
            <div>
                <h1>contenue article</h1>
            </div>
        </div>
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire"></textarea>
        <form method="post">
        <button type="submit" name="submit">Commenter</button> 
        </form>       
    </main>

    <?php include('footer.php') ?>
</body>
</html>