<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;', 'root', '');
// Get parcequ'on transfere les donner par url
if(isset($_GET['id']) AND !empty($_GET['id'])){
    // verifier si l'identifiant recupere correspond a celle de la db
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount()>0){
        // pour bannir un membre
        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?');
        $bannirUser->execute(array($getid));
        header('Location: membres.php');
    }else{
        echo"Aucun membre n'a ete trouve";
    }
}else{
    echo"L'identifiant n'a pas ete recupere";
}
?> 