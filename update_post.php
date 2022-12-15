<?php

session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== "admin") {
    header('Location: connct_form.php');
}

$bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
$sql = "UPDATE post SET title = :title, content = :content WHERE id = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(":title", $_POST['title'], PDO::PARAM_STR);
$requete->bindValue(":content", $_POST['content'], PDO::PARAM_STR);
$requete->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
$requete->execute();

// redirection vers la page index.php
header('Location: index.php');

// Exercice : pouvoir mettre à jour le compte de l'utilisateur connecté et uniquement lui.
