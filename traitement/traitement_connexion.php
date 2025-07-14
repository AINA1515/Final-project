<?php
session_start();
require("../inc/function.php");

if (!isset($_POST["email"]) || !isset($_POST["mdp"])) {
    header("Location: ../page/index.php");
}


$logInfo['email'] = $_POST["email"];
$logInfo['mdp'] = $_POST["mdp"];

$result = log_in($logInfo);
if ($result['idMembre'] != -1) {
    $_SESSION['idMembre'] = $result['idmembre'];
}

header("Location:../pages/liste_objet.php");
