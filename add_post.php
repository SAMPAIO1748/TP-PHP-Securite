<?php

if (!isset($_SESSION['email']) || $_SESSION['role'] !== "admin")
    header("Location: connct_form.php");

$date = date("Y-m-d");
$bdd = new PDO('mysql:host=localhost;dbname=securite', "root", "root");
$sql = "INSERT INTO post (title, content, date) VALUES (:title, :content, :date)";
$requete = $bdd->prepare($sql);
$requete->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$requete->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
$requete->bindValue(":date", date("Y-m-d"), PDO::PARAM_STR);
$requete->execute();

header('Location: index.php');
