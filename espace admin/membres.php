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
            <p><?= $user['pseudo']; ?> <a href="bannir.php?id=<?= $user['id']; ?>">Bannir le membre</a></p>
            <?php
        }
    ?>
    <!-- Fin affichage des membres-->
</body>
</html>