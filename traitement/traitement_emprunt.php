<?php 
require("../inc/function.php");

session_start();

if(!isset($_SESSION["membre"])){
    header("Location: ../index.php");
}

$jour = $_POST["nbrjour"] ?? null;
$id_objet = $_POST["id_objet"] ?? null;

$date= calculdatederetour($jour, $id_objet);

?>