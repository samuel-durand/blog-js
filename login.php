<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login</title>
</head>
<body>
    <?php include('header.php') ?>
    <main class="form-main">
        <form method="post">

        <label for="email">Email :</label>
        <input type="email" name="email" id="email">

        <label for="password">password :</label>
        <input type="password" name="password" id="password">

        <button>Se Connecter</button>

        <a href="register.php">Pas encore inscrit ?</a>

        </form>
    </main>
    <?php include('footer.php') ?>
</body>
</html>