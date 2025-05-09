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
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <title>Afficher les articles</title>
</head>
<body>
    <?php
        $recupArticle = $bdd->query('SELECT * FROM articles');

        while($article = $recupArticle->fetch()){
            ?>
            <div style="border: 1px solid ; ">
                <h1><?=$article['titre'];?></h1>
                <p><?=$article['contenu'];?></p>
                <a href="supprimer-article.php?id=<?=$article['id']; ?>">
                    <button>Supprimer l'article</button>
                </a>
                <a href="modifier-article.php?id=<?=$article['id']; ?>">
                    <button>Modifier l'article</button>
                </a>
                
            </div>
            <br>
           
            <?php
           
        }
    ?>
    <a href="index.php">
            <button type="button">Retour</button>
    </a>
</body>
</html>