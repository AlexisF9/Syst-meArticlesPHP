<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h3 class="h">Ajouter un article</h3>

    <form method="POST" action="database.php">
        <input type="text" name="titre" id="titre" placeholder="Titre">
        <textarea name="contenu" id="contenu" placeholder="Contenu de l'article" cols="100" rows="20"></textarea>
        <input type="text" name="auteur" id="auteur" placeholder="Auteur">
        <input class="btn" type="submit" name="submit" value="Envoyé">
    </form>

    <p class="list-p">Liste des articles :</p>

    <ol>
        <?php
        
            $db = new PDO('mysql:host=localhost; dbname=articles; charset=utf8', 'root', '');
            $sql = "SELECT * FROM article ORDER BY date_pb DESC"; // on formule une requette sql qu'on stock dans $sql
            $request = $db->query($sql); // on execute la requete ci dessus dans la db et on stock le resulat dans $request
            while($row = $request->fetch()) { // temps qu'il y a des lignes dans la db on parcours la db pour l'afficher
                ?>  
                    <li><a href="article.php?id=<?= $row['id']; ?>"><?= $row["titre"] . "</br>" . "Écrit par " . $row["auteur"] . "</br></br>"; ?></a></li>
                <?php
            }
        
            // <?= c'est comme faire <?php echo
        ?>        
    </ol>
</body>
</html>

