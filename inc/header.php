<?php
if (isset($_SESSION['membre'])) {
    $membre = $_SESSION['membre'];
}
?>

<nav class="navbar navbar-expand-lg shadow ">
    <div class="container-fluid">
        <div class="navbar-brand">
            <span>User: <a href="#" class="link-underline link-underline-opacity-0"> <?= $membre['nom'] ?></a></span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/liste_objet.php" aria-expanded="true">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../pages/ajouter_objet.php">Ajout d'objet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../traitement/deconnexion.php">Deconnexion</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>