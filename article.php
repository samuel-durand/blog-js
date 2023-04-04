<?php

session_start();

// Connect to database
try {
    $database = new PDO('mysql:host=localhost;dbname=blog_js;charset=utf8;port=3307', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Connecting to the tables we need
$request = $database->prepare("SELECT username, title, articles.content AS article, articles.creation_date AS article_date, rights, name, comments.content AS comment, comments.creation_date AS comment_date 
                                FROM users
                                INNER JOIN articles
                                on users.id = articles.user_id
                                INNER JOIN roles
                                on users.role_id = roles.id
                                INNER JOIN categories
                                on articles.category_id = categories.id
                                INNER JOIN comments
                                on users.id = comments.user_id
                                ORDER BY article_date DESC");

$request1 = $request->execute(array());

$display = $request->fetchAll(PDO::FETCH_ASSOC);

//var_dump($display);

// Send a comment to database
if (isset($_POST['button'])) {
    if ($_POST['content']) {

        $request2 = $database->prepare('SELECT * FROM comments');
        //$request = $this->database->prepare('SELECT * FROM users');
        $request2->execute(array());
        //$articleDB = $request->fetchAll(PDO::FETCH_ASSOC);

        // $this->$content = $content;
        // $this->$title = $title;
        $now = "NOW()";
        $content = $_POST['content'];
        //var_dump($request->execute(array()));

        // ENVOI DE LA REQUÊTE
        $sql = "INSERT INTO `comments` (`content`, `creation_date`) 
        VALUE (?,$now)";
        $request2 = $database->prepare($sql);
        //$request = $this->database->prepare($sql);
        $request2->execute(array($content));
    } else {
        echo "Ajoute un commentaire";
    }
}

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
            <p> <?php echo $display[0]['title']; ?> </p>
            <p> <?php echo $display[0]['username']; ?> </p>
            <p> <?php echo $display[0]['rights']; ?> </p>
            <p> <?php echo $display[0]['article_date']; ?> </p>
            <p> <?php echo $display[0]['name']; ?> </p>
            <div>
                <h1>contenue article</h1>
                <?php echo $display[0]['article']; ?>
            </div>
        </div>
        <div>

            <?php

            echo $display[0]['comment'];

            ?>

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