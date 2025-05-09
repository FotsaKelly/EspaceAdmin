<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;','root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $insererMembre = $bdd->prepare('INSERT INTO membres (pseudo) VALUES(?)');
        $insererMembre->execute(array($pseudo));
        echo"L'article a ete bien envoyer";
        header('Location: membres.php');
        exit(); // Ajout de exit pour éviter d'exécuter le reste du script
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
    <title>Ajouter un membre</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Ajouter un Nouveau Membre</h2>
        <form action="" method="POST" class="border p-4 bg-white rounded shadow-sm">
            <div class="form-group">
                <label for="pseudo">Nom :</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo" required>
            </div>
            <button type="submit" name="envoi" class="btn btn-primary btn-block">Ajouter</button>
        </form>
        <div class="text-center mt-3">
            <a href="membres.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>