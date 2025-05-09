<?php
session_start();
// connexion a la base de donnes
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;', 'root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les membres</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Liste des Membres</h2>
        <!-- Afficher tous les membres -->
        <?php 
        // récupérer les membres dans la BD
        $recupUser = $bdd->query('SELECT * FROM membres');
        while ($user = $recupUser->fetch()) {
            ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($user['pseudo']); ?></h5>
                    <a href="bannir.php?id=<?= $user['id']; ?>" class="btn btn-danger">Bannir le membre</a>
                    <a href="modifier-membre.php?id=<?= $user['id']; ?>" class="btn btn-warning">Modifier un membre</a>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="text-center">
            <a href="ajouter-membre.php" class="btn btn-success">Ajouter un membre</a>
            <a href="index.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>