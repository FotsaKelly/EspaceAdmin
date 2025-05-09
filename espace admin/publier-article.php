<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;', 'root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
if(isset($_POST['envoi'])){
   if(!empty($_POST['titre']) AND !empty($_POST['contenu'])){
        $titre = htmlspecialchars($_POST['titre']);
        $contenu =nl2br( htmlspecialchars($_POST['contenu'])); 
        // inserer les info dans la bd
        $insererArticle = $bdd->prepare('INSERT INTO articles(titre, contenu)VALUES(?, ?)');
        $insererArticle->execute(array($titre, $contenu));
        echo"L'article a ete bien envoyer";
   }else{
    echo"Veuillez completer tout les champs...";
    
   } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication Article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Publier un Nouvel Article</h2>
        <!-- POST parce qu'on va envoyer des données vers le serveur -->
        <form action="" method="POST" class="border p-4 bg-white rounded shadow-sm">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" id="titre" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea name="contenu" class="form-control" id="contenu" rows="5" required></textarea>
            </div>
            <button type="submit" name="envoi" class="btn btn-primary btn-block">Publier</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>