<?php

session_start();
var_dump($_POST);

$bdd = new PDO('mysql:host=localhost;dbname=securite', 'root', 'root');

if (!empty($_POST['contenue'])) {
    $sql = "INSERT INTO comment (contenue, id_post, id_user) VALUES (:contenue, :id_post, :id_user)";
    $requete = $bdd->prepare($sql);

    // strip_tags supprime toutes les balises html qui sont écrite dans des inputs de formulaire par
    // des personnes malveillantes
    $contenue = strip_tags($_POST['contenue']);

    $requete->bindValue(":contenue", $contenue, PDO::PARAM_STR);
    $requete->bindValue(":id_post", $_POST['id_post'], PDO::PARAM_INT);
    $requete->bindValue(':id_user', $_POST['id_user'], PDO::PARAM_INT);

    $requete->execute();
    //var_dump($requete);

    header('Location: show_post.php?id=' .  $_POST['id_post']);
}
