<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=espace_admin;','root','');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
   $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id=?');
   $recupArticle->execute(array($getid));
   if($recupArticle->rowCount()>0){
        $articleInfos = $recupArticle->fetch();
        $titre = $articleInfos['titre'];
        $contenu = str_replace('<br />', '', $articleInfos['contenu']);

        if(isset($_POST['valider'])){
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $contenu_saisi =nl2br( htmlspecialchars($_POST['contenu']));

            $updateArticle = $bdd->prepare('UPDATE articles SET titre=?, contenu=? WHERE id=?');
            $updateArticle->execute(array($titre_saisi, $contenu_saisi, $getid));
            header('Location: articles.php');
        }

   }else{
    echo"Aucun article trouve";
   }
}else{
    echo"Aucun identifiant trouvé";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Modifier un Article</h2>
        <form action="" method="POST" class="border p-4 bg-white rounded shadow-sm">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" id="titre" value="<?= $titre; ?>" required>
            </div>
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea name="contenu" class="form-control" id="contenu" rows="5" required><?= $contenu; ?></textarea>
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