<?php
require("../inc/function.php");
session_start();
if (!isset($_SESSION['membre'])) {
    header("Location: ../index.php");
}

$membre = $_SESSION['membre'];

$historique_emprunt = get_historique_emprunt($membre['id_membre']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
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
                <h1 class="lead">Historique des emprunts:</h1>
                <form action="../traitement/traitement_retournement.php" method="post">
                    <table class="table table-striped table-primary table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nom</th>
                                <th><label for="etat">Etats</label></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historique_emprunt as $emprunt) { ?>
                                <tr>
                                    <th><?= $emprunt['id_objet'] ?></th>
                                    <th><?= $emprunt['nom_objet'] ?></th>
                                    <th>
                                        <select name="etat" id="etat">
                                            <option value="Ok">OK</option>
                                            <option value="Abime">Abimé</option>
                                        </select>
                                    </th>
                                    <th><input type="submit" value="Retourner" class="btn btn-primary"></th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </main>

    <script src="../assets/scripts/js/bootstrap.bundle.min.js"></script>

</body>

</html>