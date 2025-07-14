<?php 
require("../inc/function.php");

session_start();

if(!isset($_SESSION["membre"])){
    header("Location: ../index.php");
}

$nom_image = savefile($_FILES["nom_image"]);
$id_objet = $_GET["id_objet"];


if (addImageObjet($id_objet,$nom_image)) {
    $_SESSION["message"] = "L'image a été ajoutée avec succès.";
} else {
    $_SESSION["message"] = "Échec de l'ajout de l'image.";
}

header("location:../pages/liste_objet.php");
?>