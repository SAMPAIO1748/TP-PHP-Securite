<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location: connct_form.php');
} else {

    $id = $_SESSION['id'];

    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
    $sql = "DELETE FROM user WHERE id = :id";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    session_destroy();

    header('Location: index.php');
}
