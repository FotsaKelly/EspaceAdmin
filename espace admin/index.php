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
</head>
<body>
    <p><a href="membres.php"> Afficher les membres</a></p>
    <p><a href="publier-article.php">Publier un nouvel article</a></p>
    <p><a href="articles.php"> Afficher tous les articles</a></p>
</body>
</html>