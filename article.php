<?php

if(isset($_GET["id"]) && !empty($_GET["id"])) { // SI la variable est set ET SI elle est pas vide alors...

    $sql = "SELECT * FROM article WHERE id =" . $_GET["id"]; //on formule la requete
    $db = new PDO('mysql:host=localhost; dbname=articles; charset=utf8', 'root', '');
    $request = $db->prepare($sql); // on prepare la requete
    $request = $db->query($sql);
    $article = $request->fetch(); // pas besoin de while, on à qu'un article sur la page
    if($request->rowCount() == 0) { // si l'ID de l'article n'existe pas alors...
        Header("Location:index.php");
    }

}else {
    Header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article["titre"]; ?></title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <a class="retour" href="index.php">Retour</a>
    <h1><?= $article["titre"]; ?></h1>
    <p><?= $article["contenu"]; ?></p>
    <p>Écrit par <?= $article["auteur"] . " le " . $article["date_pb"]; ?></p>

    <a class="supp" href="supprimer.php?id=<?= $article['id']?>">Supprimer l'article</a>
</body>
</html>