<?php

session_start();

sleep(1);

if (empty($_POST['email']) && empty($_POST['password'])) {
    echo "Les champs sont vides";
} elseif (empty($_POST['email'])) {
    echo "Le champ email est obligatoire";
} elseif (empty($_POST['password'])) {
    echo "Le champ mot de passe est obligatoire";
} else {
    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
    $sql = "SELECT email, name, firstname FROM user WHERE email = :email AND password =:password";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
    $requete->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
    $requete->execute();
    $resultat = $requete->fetch();

    if ($resultat) {
        $_SESSION['email'] = $resultat["email"];
        $_SESSION['name'] = $resultat['name'];
        $_SESSION['firstname'] = $resultat['fisrname'];
        header('Location: index.php');
    } else {
        echo "Vous n'êtes pas inscrit sur ce site.";
    }
}
