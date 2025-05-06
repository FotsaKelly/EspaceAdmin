<?php
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_defaut= 'admin';
        $mpd_par_defaut = 'admin1234';
        
    }else{
        echo"Veuillez completez tous les champs...";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Espace de connexion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form method="POST" action=""  style="text-align: center;">
            <input type="text" name="pseudo" autocomplete="off" >
            <br>
            <input type="password" name="mdp">
            <br><br>
            <input type="submit" name="valider">
        </form>
    </body>
</html>
<!-- 
👋 Bonjour et bienvenue dans cette nouvelle vidéo ! Aujourd'hui je vais vous montrer comment créer un espace d'administration complet en PHP & MySQL avec la possibilité de se connecter en tant qu'administrateur, d'afficher les membres du site, de bannir un membre, de publier un article et de supprimer ou modifier un article !

0:00 Intro
0:50 Connexion en tant qu'admin
10:11 Afficher les membres du site
17:47 Bannir un membre
26:27 Publier un article
35:12 Supprimer un article
49:28 Modifier un article
1:07:22 Fin

-->