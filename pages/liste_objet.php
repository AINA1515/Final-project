<?php 
require("../inc/function.php");

$liste_objet = getListObjet();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste objet</title>
</head>
<body>

    <?php 
        foreach($liste_objet as $objet)
        {
            echo $objet["nom_objet"]."<br>";
        }
    ?>
    
</body>
</html>