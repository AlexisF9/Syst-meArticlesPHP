<?php

    if (isset($_POST["titre"], $_POST["contenu"]) && !empty($_POST["titre"]) && !empty($_POST["contenu"]) && !empty($_POST["auteur"])){ // le isset détermine si une variable est déclarée. Le !empty est une sécurité pour le formulaire (le if vérifie que les input correspondent bien)

        $titre = htmlspecialchars(addslashes($_POST["titre"])); // htmlspecialchars : convertit les caractères spéciaux en entités HTML et addslashes ajoute un anti slash dans une chaine
        $contenu = htmlspecialchars(addslashes($_POST["contenu"]));
        $auteur = htmlspecialchars(addslashes($_POST["auteur"]));
        $now = date("Y-m-d H:i:s");

        try { // on tente la connexion, si elle c'est réussi alors...
            $db = new PDO('mysql:host=localhost; dbname=articles; charset=utf8', 'root', ''); //chaine de connexion à la base (PDO représente la connexion entre le php et la db)
            echo "Vous êtes connecté à la base de données !" . "</br>";
        }catch(Exception $e) { // si la connexion échoue alors...
            die('Erreur : ' . $e->getMessage()); // affiche l'érreur
        }

        $sql = "INSERT INTO article (titre, contenu, auteur, date_pb) VALUES (:titre, :contenu, :auteur, :date_pb)"; // Permet d'inserer du contenu dans la db grace au formulaire
        $request = $db->prepare($sql);
        $request->bindParam(':titre', $titre);
        $request->bindParam(':contenu', $contenu);
        $request->bindParam(':auteur', $auteur);
        $request->bindParam(':date_pb', $now);
        $request->execute(); 

        Header("Location:index.php"); // permet de rediriger sur index.php à la fin du processus
    }