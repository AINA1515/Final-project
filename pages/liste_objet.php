<?php
require("../inc/function.php");

session_start();

if (!isset($_SESSION["membre"])) {
    header("Location: ../index.php");
}


if (!isset($_POST['categorie'])) {
    $liste_objet = getListObjet();
} else {
    $liste_objet = getFilteredListObjet($_POST['categorie']);
}

$allcategorie = getListCategorie();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste objet</title>
    <link rel="stylesheet" href="../assets/scripts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/scripts/css/style.css">
</head>

<body>
    <header>
        <?php include("../inc/header.php"); ?>
    </header>

    <main>
        <div class="container mt-3 ">
            <div class="row">

                <div class="col-3 mb-4">
                    <form action="liste_objet.php" method="post" class="row mt-3">
                        <h1>Filtre par Categorie</h1>
                        <?php foreach ($allcategorie as $categorie) { ?>
                            <div class="form-check col">
                                <input class="form-check-input" name="categorie[]" id="<?= $categorie["id_categorie"] ?>" type="checkbox" value="<?= $categorie["id_categorie"] ?>" id="flexCheckChecked">
                                <label class="form-check-label" for="<?= $categorie["id_categorie"] ?>">
                                    <?= $categorie["nom_categorie"] ?>
                                </label>
                            </div>
                        <?php } ?>
                        <div class="col-12">
                            <input type="submit" value="Filtrer" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-9 row">
                    <?php foreach ($liste_objet as $objet) { ?>
                        <div class="col-md-4 mb-3">
                            <a href="fiche_objet.php?id_objet=<?= $objet['id_objet'] ?>">
                            <div class="card">
                                <img src="../assets/uploads/<?= $objet['nom_image'] ?: "default_object.png"; ?>" class="card-img-top thumbnails" alt="<?= $objet['nom']; ?>">

                                <div class="card-body">
                                    <h5 class="card-title"><?= $objet['nom_objet']; ?></h5>
                                    <p class="card-text">Catégorie: <?= $objet['nom_categorie']; ?></p>
                                    <p class="card-text">Membre: <?= $objet['nom']; ?></p>
                                    <?php if (isset($objet['date_emprunt'])) { ?>
                                        <span class="badge bg-warning position-absolute top-0 end-0 m-2">Non Disponible</span>
                                        <p class="card-text">Date de retour: <?= $objet['date_retour'] ?></p>
                                    <?php } ?>

                                </div>
                            </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include("../inc/footer.php"); ?>
    </footer>
    <script src="../assets/scripts/js/bootstrap.bundle.min.js"></script>
</body>

</html>