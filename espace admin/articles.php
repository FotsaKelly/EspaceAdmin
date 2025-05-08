<?php
session_start();
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
    <title>Afficher les articles</title>
</head>
<body>
    <?php
        $recupArticle = $bdd->query('SELECT * FROM articles');

        while($article = $recupArticle->fetch()){
            ?>
            <div>
                <h1><?=$article['titre'];?></h1>
                <p><?=$article['contenu'];?></p>
            </div>
           
            <?php
           
        }
    ?>
    
</body>
</html>