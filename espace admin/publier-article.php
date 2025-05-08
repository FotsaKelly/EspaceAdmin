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
</head>
<body>
    <!-- POST parcequ'on va envoyer des donnees vers le serveur-->
     <form action="" method="POST">
        <input type="text" name="titre">
        <br>
        <textarea name="contenu" ></textarea>
        <br>
        <input type="submit" name="envoi">

     </form>
    
</body>
</html>