<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion.php' );
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">Bienvenue dans votre espace admin</h1>
        <div class="list-group">
            <a href="membres.php" class="list-group-item list-group-item-action">Afficher les membres</a>
            <a href="publier-article.php" class="list-group-item list-group-item-action">Publier un nouvel article</a>
            <a href="articles.php" class="list-group-item list-group-item-action">Afficher tous les articles</a>
        </div>
        <div class="text-center mt-4">
            <a href="connexion.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>