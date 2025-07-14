<?php
require("../inc/function.php");

session_start();

if (!isset($_SESSION["membre"])) {
    header("Location: ../index.php");
}

$allcategorie = getListCategorie();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row mb-4">
        <form action="../traitement/traitement_ajout_objet.php" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <label for="nom_objet" class="form-label">Nom de l'objet: </label>
                <input type="text" name="nom_objet" id="nom_objet" class="form-control" required>
                <label for="categorie">Categorie de l'objet</label>
                <select name="id_categorie" id="categorie">
                    <?php foreach ($allcategorie as $categorie) { ?>
                        <option value="<?= $categorie["id_categorie"] ?>" ><?= $categorie["nom_categorie"] ?></option>
                    <?php } ?>
                </select>
                <label for="pdp" class="form-label">Photo de l'objet: </label>
                <input type="file" name="nom_image" id="nom_image" class="form-control" accept="image/*">
                <input type="hidden" value="<?= $_SESSION["membre"] ?>">
                <input type="submit" value="Ajouter l'objet" class="btn btn-primary mt-3">
            </div>

        </form>
    </div>

</body>

</html>