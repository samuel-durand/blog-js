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
        <form method="post"></form>
        <h1>TITRE</h1>
        <input type="text" placeholder="titre">
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire"></textarea>
        <button type="submit" name="submit">Commenter</button> 
        </form>       
    </main>

    <?php include('footer.php') ?>
</body>
</html>