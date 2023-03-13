<?php 

session_start();
if(!isset($_SESSION["administrateur"])) {
    header("Location: index.php");
}

$id_toDel = $_GET["id"];