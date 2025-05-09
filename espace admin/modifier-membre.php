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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Modifier un Membre</h2>
        <form action="" method="POST" class="border p-4 bg-white rounded shadow-sm">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="form-control" id="pseudo" value="<?= htmlspecialchars($pseudo); ?>" required>
            </div>
            <button type="submit" name="valider" class="btn btn-primary btn-block">Valider</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>