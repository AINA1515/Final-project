<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row mb-4">
        <form action="../traitement/traitement_ajout_objet.php" method="post">
            <div class="col-md-12">
                <label for="nom_objet" class="form-label">Nom de l'objet: </label>
                <input type="text" name="nom_objet" id="nom_objet" class="form-control" required>
                <label for="categorie">Categorie de l'objet</label>
                <select name="categorie" id="categorie">
                    <?php foreach ($allcategorie as $categorie) { ?>
                        <option value="<?= $categorie["id_categorie"] ?>" name="categorieID"><?= $categorie["nom_categorie"] ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" value="<?= $_SESSION["$membre"] ?>">
            </div>

        </form>
    </div>

</body>

</html>