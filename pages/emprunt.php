<?php
require("../inc/function.php");

session_start();

if (!isset($_SESSION["membre"])) {
    header("Location: ../index.php");
}
$_GET["id_objet"] = $_GET["id_objet"] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter objet</title>
    <link rel="stylesheet" href="../assets/scripts/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/scripts/css/style.css">
</head>

<body>
    <header>
        <?php include("../inc/header.php"); ?>
    </header>

    <body>

        <form action="../traitement/traitement_emprunt.php" method="post">
            <div class="container">
                <div class="row my-4">
                    <div class="col-md-12">
                        <h1>Emprunter l'objet</h1>
                    </div>
                    <div class="col-md-12">
                        <label for="nbrjour" class="form-label">Nombre de jour de l'emprunt: </label>
                        <input type="number" name="id_objet" id="nbrjour" class="form-control" required>
                        <input type="hidden" name="id_objet" id="" value="<?= $_GET["id_objet"] ?>">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Emprunter l'objet" class="btn btn-primary mt-3">
                    </div>
                </div>
            </div>

        </form>

    </body>

</html>