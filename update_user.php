<?php

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: connct_form.php");
}

$bdd = new PDO("mysql:host=localhost;dbname=securite", 'root', "root");
$sql = "UPDATE user SET name = :name, firstname = :firstname, email = :email, password = :password WHERE id = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
$requete->bindValue(":firstname", $_POST['firstname'], PDO::PARAM_STR);
$requete->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
$requete->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
$requete->execute();

session_destroy();

header("Location: connct_form.php");
