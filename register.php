<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>
<body>

    <?php include('header.php') ?>
    <main class="form-main">
        <form  class="formulaire-register">

            <label for="email">Email :</label>
            <input type="email" name="email" id="email">

            <label for="login">login :</label>
            <input type="text" name="login" id="login">

            <label for="password">password :</label>
            <input type="password" name="password" id="password">

            <button type="submit" name="submit">s'inscrire</button>

            <a href="login.php">Déja inscrit ?</a>

        </form>
    </main>

    <?php include('footer.php') ?>
    
</body>
</html>