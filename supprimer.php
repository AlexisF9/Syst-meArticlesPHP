<?php

$db = new PDO('mysql:host=localhost; dbname=articles; charset=utf8', 'root', '');

$sql = $db->prepare('DELETE FROM article WHERE id=:id LIMIT 1'); // Limit 1 pour la sécurité

$sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT);

$executeIsOk = $sql->execute();

if($executeIsOk) { //si executeIsOk est vrai alors...
    $messageDeSuppression = 'Votre article à bien été supprimé';
}else {
    $messageDeSuppression = 'Échec de la suppression';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h4><?php echo $messageDeSuppression; ?></h4>
    <a href="index.php">Retour à la page d'accueil</a>
</body>
</html>
