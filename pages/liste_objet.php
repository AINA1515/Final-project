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
    
    <main>
    <div class="container mt-3">
        <div class="row">
            <?php foreach ($liste_objet as $objet){ ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="../assets/uploads/<?php echo $objet['nom_image'] ? : "default_profil.jpg"; ?>" class="card-img-top thumbnails" alt="<?php echo $objet['nom']; ?>">
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
    
</body>
</html>