<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Inscription</title>
    <link rel="stylesheet" href="../assets/scripts/css/bootstrap.min.css">
</head>

<body>
    
    <main>
        <div class="container">
            <form action="../traitement/traitement_inscription.php" method="post" enctype="multipart/form-data" class="row mt-4">
                <h1 class="lead col-md-12 text-primary">Inscription</h1>
                <div class="col-md-12">
                    <label for="nom" class="form-label">Nom: </label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>
                <div class="col-md-9">
                    <label for="date" class="form-label">Date de Naissance: </label>
                    <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="genre" class="form-label">Genre: </label>
                    <select name="genre" class="form-control" id="genre" required>
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label for="ville" class="form-label">Ville: </label>
                    <input type="text" name="ville" id="ville" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label for="mdp" class="form-label">Mot de Passe: </label>
                    <input type="password" name="mdp" id="mdp" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label for="pdp" class="form-label">Photo de Profil: </label>
                    <input type="file" name="pdp" id="pdp" class="form-control" accept="image/*">
                </div>

                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary mt-3">S'inscrire</button>
                </div>
                <div class="col-md-3">
                    <a href="connexion.php" class="text-success mt-3 d-inline-block">Se connecter</a>
                </div>

            </form>
        </div>
    </main>
    <script src="../assets/scripts/js/bootstrap.bundle.min.js"></script>
</body>

</html>