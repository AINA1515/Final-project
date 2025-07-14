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
            <form action="../traitement/traitement_connexion.php" method="post" class="row mt-4">
                <h1 class="lead col-md-12 text-primary">Connexion</h1>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label for="mdp" class="form-label">Mot de Passe: </label>
                    <input type="password" name="mdp" id="mdp" class="form-control" accept="image/*">
                </div>

                <div class="col-md-9">
                    <button type="submit" class="btn btn-success mt-3">Se connecter</button>
                </div>
                <div class="col-md-3">
                    <a href="index.php" class="text-primary mt-3 d-inline-block">S'inscrire</a>
                    </div>
            </form>
        </div>
    </main>
    <script src="../assets/scripts/js/bootstrap.bundle.min.js"></script>
</body>

</html>