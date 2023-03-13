<?php 

session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=blog_js', 'root', '');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


?>