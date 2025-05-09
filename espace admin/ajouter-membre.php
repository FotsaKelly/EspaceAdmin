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
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="pseudo">
        <br><br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>