<?php

if (empty($_POST['name']) && empty($_POST['firstname']) && empty($_POST['email']) && empty($_POST['password'])) {
    echo "Les champs sont vides";
} elseif (empty($_POST['name'])) {
    echo "Le champ nom est vide.";
} elseif (empty($_POST['firstname'])) {
    echo "le champ prénom est vide.";
} elseif (empty($_POST['email'])) {
    echo "Le champ mail est obligatoire.";
} elseif (empty($_POST['password'])) {
    echo "Le champ password est obligatoire";
} else {
    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
    $sql = "INSERT INTO user (name, firstname, email, password) VALUES (:name, :firstname, :email, :password)";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
    $requete->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $requete->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    $requete->execute();
    header('Location: index.php');
}
