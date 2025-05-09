<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id=? ');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount()>0){
        $supprimerArticle = $bdd->prepare('DELETE FROM articles WHERE id=?');
        $supprimerArticle->execute(array($getid));
        header('Location: articles.php');
    }else{
        echo"Aucun Article trouvé";
    }
}else{
    echo"Aucun identifiant n'a été trouvé";
} 