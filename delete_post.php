<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    header('Location: connct_form.php');
}

$id = $_GET['id'];

$bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
$sql = "DELETE FROM post WHERE id = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->execute();

header('Location: index.php');
