<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil TP sécurité</title>
</head>

<h1>Blog TP Sécurité Aston</h1>

<body>

    <?php

    // Connexion à notre base de données             indentifiant de PHPMyAdmin ------ le mdp de PHPMyAdmin
    //                                                                                   : root pour MAMP
    //                                                                                  : "" pour XAMPP et WAMP
    $bdd = new PDO("mysql:host=localhost;dbname=securite", 'root', 'root');
    //classe PDO de php (- on spécifie le SGBDR - on spécifie le host - on spécifie le nom de la base de donnée)

    // Ecriture de notre requête SQL sous forme de chaîne de caractères
    $sql = "SELECT * FROM post";



    ?>

</body>

</html>