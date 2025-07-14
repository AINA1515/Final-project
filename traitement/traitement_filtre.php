<?php
require("../inc/function.php");

if(!isset($_POST['categorie'])){
    header("Location: ../pages/liste_objet.php");
    
} else {
    
    $categorie = $_POST['categorie'];
    header("Location: ../pages/liste_objet.php?categorie=".$categorie);

}




?>