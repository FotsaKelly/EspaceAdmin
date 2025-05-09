<?php
session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_defaut= 'admin';
        $mdp_par_defaut = 'admin1234';
        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);
        if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
            $_SESSION['mdp'] = $mdp_saisi ;
            header('Location: index.php');
        }else{
            echo "Votre mot de passe ou pseudo est incorrect";
        }
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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Connexion à l'Espace Admin</h2>
        <form method="POST" action="" class="border p-4 bg-white rounded shadow-sm">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="mdp" required>
            </div>
            <button type="submit" name="valider" class="btn btn-primary btn-block">Se connecter</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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