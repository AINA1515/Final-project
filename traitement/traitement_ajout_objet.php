<?php 
require("../inc/function.php");

session_start();

if(!isset($_SESSION["membre"])){
    header("Location: ../index.php");
}

$objet["nom_objet"] = $_POST["nom_objet"];
$objet["id_categorie"] = $_POST["id_categorie"];
$objet["nom_image"] = savefile($_FILES["nom_image"]);
$objet["id_membre"] = $_SESSION["membre"]["id_membre"];

addObjet($objet);

header("location:../pages/liste_objet.php");
?>