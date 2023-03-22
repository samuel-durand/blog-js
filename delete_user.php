<?php 

session_start();
if (!empty($_SESSION['username']) && $_SESSION['rights'] != "administrator"){ // si l'utilisateur n'est pas connecté, il est rediriger vers la page d'accueil.php
    header("Location: usersGestion.php");
    exit;
}

require_once("usersGestion.php");
$user = new usersGestion;
$id_toDel = $_GET["id"];
echo $id_toDel;
$request = $user->getData()->prepare('DELETE FROM users WHERE id = (?)');
$request->execute(array($id_toDel));
header("Location: admin.php");
//echo "yolo";