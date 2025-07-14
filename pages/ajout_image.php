<?php
require("../inc/function.php");

session_start();

if (!isset($_SESSION["membre"])) {
    header("Location: ../index.php");
}
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
        <div class="container">

            <div class="row my-4">
                <form action="../traitement/traitement_ajout_image.php?id_objet=<?= $_GET["id_objet"]?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $_SESSION["membre"] ?>">
                    <div class="col-md-12">
                        <label for="pdp" class="form-label">Photo de l'objet: </label>
                        <input type="file" name="nom_image" id="nom_image" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Ajouter l'objet" class="btn btn-primary mt-3">
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>
</html>