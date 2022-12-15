<?php

session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== "admin")
    header("Location: connct_form.php");

if (empty($_POST['title']) && empty($_POST['content']) && empty($_FILES['image']['name'])) {
    echo "Les champs sont vides.";
} elseif (empty($_POST['title'])) {
    echo "Le champ title est obligatoire.";
} elseif (empty($_POST['content'])) {
    echo "le champ content est obligatoire";
} elseif (empty($_FILES['image']['name'])) {
    echo "le champ fichier est obligatoire";
} else {

    //upload du fichier

    if (isset($_FILES['image'])) {

        $dossier = "img/";
        // var_dump($_FILES);

        // on vérifie que le dossier img/ existe bien
        if (!file_exists($dossier)) {
            echo 'le dossier img n\'existe pas ou il n\'est pas disponible';
        } else {
            // nom du fichier qui s'affiche sur l'interface graphique
            $nom_img = $_FILES['image']['name'];
            // tmp_name : correspond au nom du fichier tel qu'il est enregistré sur l'ordinateur
            $image = $_FILES['image']['tmp_name'];
            $type = $_FILES['image']['type'];

            // Détecte le type du contenu d'un fichier.
            // mime_content_type($image);

            // Normalement il faudrait faire les tests en utilisant le mime du fichier
            if ($type == "image/jpeg" || $type == "image/jpeg" || $type == "image/png") {

                // déplacement du fichier dans le dossier "img/"
                if (move_uploaded_file($image, $dossier . $nom_img)) {
                    $date = date("Y-m-d");
                    $bdd = new PDO('mysql:host=localhost;dbname=securite', "root", "root");
                    $sql = "INSERT INTO post (title, content, date, img) VALUES (:title, :content, :date, :img)";
                    $requete = $bdd->prepare($sql);
                    $requete->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
                    $requete->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
                    $requete->bindValue(":date", date("Y-m-d"), PDO::PARAM_STR);
                    $requete->bindValue(":img", $nom_img, PDO::PARAM_STR);
                    $requete->execute();

                    header('Location: index.php');
                }
            }
        }
    }
}

// Exercice pour le update post, mettre en place le upload de fichier.
