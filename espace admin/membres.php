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
</head>
<body>
    <!-- Afficher tous les memres-->
    <?php 
    // recuperer les membres dans la BD
        $recupUser = $bdd->query('SELECT * FROM membres');
        while($user = $recupUser->fetch()){
            ?>
            <div>
                <p><?=$user['pseudo'];?></p>
                <a href="bannir.php?id=<?= $user['id']; ?>">
                    <button>Bannir le membre</button>
                </a>
                <a href="modifier-membre.php?id=<?= $user['id'];?>">
                    <button>Modifier un membre</button>
                </a>
            </div>
            
            <?php
        }
        
    ?>
    <br><br><br><br>
    <?php ?>
    <div>
    <a href="ajouter-membre.php?id=<?= $user['id'];?>">
        <button>Ajouter un membre</button>
    </a>
    <a href="index.php">
            <button type="button">Retour</button>
    </a>
</div>
<?php ?>
    <!-- Fin affichage des membres-->
</body>
</html>