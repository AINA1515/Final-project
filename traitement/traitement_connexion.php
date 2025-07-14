<?php
session_start();
require("../inc/function.php");

if (!isset($_POST["email"]) || !isset($_POST["mdp"])) {
    header("Location: ../page/index.php");
}


$logInfo['email'] = $_POST["email"];
$logInfo['mdp'] = $_POST["mdp"];

$result = log_in($logInfo);

if($result != null){
    $_SESSION['id_membre'] = $result['id_membre'];
    header("Location:../pages/liste_objet.php");
}

