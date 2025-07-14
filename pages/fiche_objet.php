<?php
require("../inc/function.php");

session_start();

if (!isset($_SESSION["membre"])) {
    header("Location: ../index.php");
}

$objet = getObjet($_GET['id_objet'] ?? null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
</head>
<body>

    
    
</body>
</html>