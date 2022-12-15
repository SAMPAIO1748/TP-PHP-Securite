<?php

session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== "admin") {
    header('Location: connct_form.php');
}

if (empty($_POST['title']) && empty($_POST['content']) && empty($_FILES['image'])) {
    echo 'Les champs sont vides';
} elseif (empty($_POST['title'])) {
    echo "Le champ titre est vide";
} elseif (empty($_POST['content'])) {
    echo "Le champ contenu est vide";
} elseif (empty($_FILES['image'])) {
    echo "Le champ fichier est vide";
} else {

    if (isset($_FILES['image'])) {

        $dossier = 'img/';

        if (!file_exists($dossier)) {
            echo "Le dossier img n\'est pas disponible ou il n\'existe pas.";
        } else {
            $nom_image = $_FILES['image']['name'];
            $image = $_FILES['image']['tmp_name'];
            $type = $_FILES['image']['type'];

            if (in_array($type, ["image/jpeg", "image/jpg", "image/png"])) {

                if (move_uploaded_file($image, $dossier . $nom_image)) {

                    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
                    $sql = "UPDATE post SET title = :title, content = :content, img = :img WHERE id = :id";
                    $requete = $bdd->prepare($sql);
                    $requete->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
                    $requete->bindValue(":content", $_POST['content'], PDO::PARAM_STR);
                    $requete->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
                    $requete->bindValue(":img", $nom_image, PDO::PARAM_STR);
                    $requete->execute();

                    // redirection vers la page index.php
                    header('Location: index.php');
                } else {
                    echo "Problème lors de l'upload du fichier";
                }
            }
        }
    }
}




// Exercice : pouvoir mettre à jour le compte de l'utilisateur connecté et uniquement lui.
