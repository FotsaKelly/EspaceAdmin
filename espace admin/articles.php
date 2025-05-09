<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;', 'root','');
if (!$_SESSION['mdp'] || !empty($_SESSION['mdp'])) {
    header('Location: connexion.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <title>Afficher les articles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Liste des Articles</h2>
        <?php
        $recupArticle = $bdd->query('SELECT * FROM articles');

        while ($article = $recupArticle->fetch()) {
            ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?=$article['titre']; ?></h5>
                    <p class="card-text"><?=$article['contenu']; ?></p>
                    <a href="supprimer-article.php?id=<?= $article['id']; ?>" class="btn btn-danger">Supprimer l'article</a>
                    <a href="modifier-article.php?id=<?= $article['id']; ?>" class="btn btn-warning">Modifier l'article</a>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="text-center">
            <a href="index.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>






















