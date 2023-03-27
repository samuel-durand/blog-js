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
        <div class="selection">
            <label for="titre">titre</label>
            <input type="text">
            <p>categories</p>
            <select name="" id="">
                <option value="">test</option>
                <option value="">test</option>
                <option value="">test</option>

            </select>
            <p>userame</p>
            <p>role_id</p>
            <p>date</p>

        </div>
    
    </main>

    <?php include('footer.php') ?>
</body>
</html>