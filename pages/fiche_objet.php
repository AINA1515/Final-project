<?php
require("../inc/function.php");

session_start();

if (!isset($_SESSION["membre"])) {
    header("Location: ../index.php");
}

$objet = getObjet($_GET['id_objet'] ?? null);
$allImage= getAllImageObjet($_SESSION["membre"]["id_membre"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
</head>
<body>

    <?php 
        foreach($allImage as $image) {
            if ($image['id_objet'] == $objet['id_objet']) {
            ?> <img src='../assets/uploads/<?= $image['nom_image']?>' alt='' class='thumbnails'style='max-width: 300px; height: 100px' >
            <?php }
        }
    ?>


    
</body>
</html>