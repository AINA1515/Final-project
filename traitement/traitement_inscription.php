<?php 
require("../inc/function.php");
if (!isset($_POST["email"]) || !isset($_POST["nom"]) || !isset($_POST["dtn"]) || !isset($_POST["mdp"])) {
    header("Location: ../page/index.php");
}


$inscription['nom'] = $_POST["nom"];
$inscription['dtn'] = $_POST["dtn"];
$inscription['email'] = $_POST["email"];
$inscription['mdp'] = $_POST["mdp"];
$inscription['ville'] = $_POST["ville"];
$inscription['genre'] = $_POST["genre"];

$name=savefile($_FILES["pdp"]);
$inscription['image_profil'] = $name;

inscription($inscription);

header("Location: ../pages/liste_objet.php");

?>