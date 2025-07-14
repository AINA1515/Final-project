<?php
require("../inc/function.php");

session_start();

$liste_objet = getListObjet();
$allcategorie = getListCategorie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste objet</title>
    <link rel="stylesheet" href="../assets/scripts/css/bootstrap.min.css">
</head>

<body>

    <main>

        <div class="container mt-3 ">
            <div class="row mb-4">
                <form action="../traitement/traitement_filtre.php" class="row mt-3">
                    <h1>Filtre par Categorie</h1>
                    <?php foreach($allcategorie as $categorie){?>
                    <div class="form-check col">
                        <input class="form-check-input" name="categorie[]"  type="checkbox" value="<?= $categorie["id_categorie"]?>" id="flexCheckChecked">
                        <label class="form-check-label" for="categorie">
                          <?= $categorie["nom_categorie"]?>
                        </label>
                    </div>
                    <?php }?>
                    <div class="col-12">
                        <input type="submit" value="Filtrer" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="row">
                <?php foreach ($liste_objet as $objet) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="../assets/uploads/<?php echo $objet['nom_image'] ?: "default_profil.jpg"; ?>" class="card-img-top thumbnails" alt="<?php echo $objet['nom']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $objet['nom_objet']; ?></h5>
                                <p class="card-text">Catégorie: <?php echo $objet['nom_categorie']; ?></p>
                                <p class="card-text">Membre: <?php echo $objet['nom']; ?></p>
                                <p class="card-text">Date d'emprunt: <?php echo $objet['date_emprunt'] ? $objet['date_emprunt'] : 'Non emprunté'; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <script src="../assets/scripts/js/bootstrap.bundle.min.js"></script>
</body>

</html>