<?php
session_start();
if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo_par_defaut = 'admin';
        $mdp_par_defaut = 'admin1234';
        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);
        
        if ($pseudo_saisi === $pseudo_par_defaut && $mdp_saisi === $mdp_par_defaut) {
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: index.php');
            exit(); // N'oubliez pas d'utiliser exit après header
        } else {
            $error_message = "Votre mot de passe ou pseudo est incorrect";
        }
    } else {
        $error_message = "Veuillez compléter tous les champs...";
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
                <input type="text" name="pseudo" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" required>
            </div>
            <button type="submit" name="valider" class="btn btn-primary btn-block">Se connecter</button>
        </form>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger mt-3"><?= $error_message; ?></div>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>