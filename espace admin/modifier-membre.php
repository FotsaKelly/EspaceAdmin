<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id=?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount()>0){
        $membreNom = $recupUser->fetch();
        $pseudo = $membreNom['pseudo'];
        if(isset($_POST['valider'])){
            $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
            $updatePseudo = $bdd->prepare('UPDATE membres SET pseudo=?  WHERE id=?');
            $updatePseudo->execute(array($pseudo_saisi, $getid));
            header('Location: membres.php');
        }


    }else{
        echo"Aucun article trouve";
    }

}else{
    echo"Aucun identifiant trouve";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un membre</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="pseudo" value="<?= $pseudo;?>">
        <input type="submit" name="valider">
        <br> <br>
        <a href="index.php">
            <button type="button">Retour</button>
        </a>
    </form>
</body>
</html>