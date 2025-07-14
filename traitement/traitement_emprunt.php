<?php 
require("../inc/function.php");

session_start();

if(!isset($_SESSION["membre"])){
    header("Location: ../index.php");
}

$jour = $_POST["nbrjour"] ?? null;
$id_objet = $_POST["id_objet"] ?? null;
$id_membre = $_SESSION["membre"]["id_membre"];

$date= calculdatederetour($id_membre, $jour, $id_objet);

header("Location: ../pages/liste_objet.php");
?>