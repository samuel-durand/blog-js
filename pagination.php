<?php

// We connect to the database

try {
    $database = new PDO('mysql:host=localhost;dbname=blog_js;charset=utf8;port=3307', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$sql = 'SELECT * FROM `articles` ORDER BY `creation_date` DESC;';

// We prepare the request
$request = $database->prepare($sql);

// We run
$request->execute();

// The values are retrieved in an associative array
$articles = $request->fetchAll(PDO::FETCH_ASSOC);

//var_dump($articles);

// We determine which page we are on
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

// The total number of items is determined
$sql = 'SELECT COUNT(*) AS nb_articles FROM `articles`;';

// We prepare the request
$request = $database->prepare($sql);

// We run
$request->execute();

// We get the number of items
$result = $request->fetch();

$nbArticles = (int) $result['nb_articles'];

//var_dump($nbArticles);

// We determine the number of articles per page
$parPage = 5;

// We calculate the total number of pages
$pages = ceil($nbArticles / $parPage);

// Calculation of the 1st item on the page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `articles` ORDER BY `creation_date` DESC LIMIT :premier, :parpage;';

// We prepare the request
$request = $database->prepare($sql);

$request->bindValue(':premier', $premier, PDO::PARAM_INT);
$request->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// We run
$request->execute();

// The values are retrieved in an associative array
$articles = $request->fetchAll(PDO::FETCH_ASSOC);
//var_dump($articles);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur tous les articles
                        foreach ($articles as $article) {
                        ?>
                            <tr>
                                <td><?= $article['id'] ?></td>
                                <td><?= $article['title'] ?></td>
                                <td><?= $article['creation_date'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a href="pagination.php/?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                        </li>
                        <?php for ($page = 1; $page <= $pages; $page++) : ?>
                            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="pagination.php/?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                            </li>
                        <?php endfor ?>
                        <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a href="pagination.php/?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </main>
</body>

</html>