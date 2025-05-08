<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;','root','');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
?>