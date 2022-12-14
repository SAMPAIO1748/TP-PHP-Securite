<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil TP sécurité</title>
</head>

<?php

session_start();

?>

<h1>Blog TP Sécurité Aston</h1>

<?php


// Si je suis connecté alors la variable $_SESSION["email"] existe alors j'affiche le message du dessous

if (isset($_SESSION['email'])) {
    echo '<h2>Bienvenue sur notre site ' . $_SESSION['firstname'] . " " . $_SESSION['name'] . "</h2>";
}

// Si je suis connecté alors j'affiche un lien pour me déconnecter sinon j'affiche un lien pour me connecter.
if (isset($_SESSION['email'])) {
    echo '<a href="disconnect.php">Se déconnecter</a>';
} else {
    echo '<a href="connct_form.php">Se connecter</a>';
}
?>

<a href="login_form.php">S'inscrire</a>

<body>

    <?php

    // Connexion à notre base de données             indentifiant de PHPMyAdmin ------ le mdp de PHPMyAdmin
    //                                                                                   : root pour MAMP
    //                                                                                  : "" pour XAMPP et WAMP
    $bdd = new PDO("mysql:host=localhost;dbname=securite", 'root', 'root');
    //classe PDO de php (- on spécifie le SGBDR - on spécifie le host - on spécifie le nom de la base de donnée)

    // Ecriture de notre requête SQL sous forme de chaîne de caractères
    $sql = "SELECT * FROM post";

    // Préparer notre requête (on transforme notre chaîne de caractères en requête SQL)
    $requete = $bdd->prepare($sql);

    // Executer notre requête
    $requete->execute();

    // Récuperer notre résultat dans variable sous forme de tableau
    // fetchAll() permet de récuper toutes les lignes d'un ensemble de résultats
    $resultat = $requete->fetchAll();

    //var_dump($resultat);

    ?>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
            </tr>
        </thead>
        <tbody>

            <?php

            foreach ($resultat as $post) {
                echo '<tr><td><a href="show_post.php?id=' . $post['id'] . '">'  . $post['title'] . "</a></td><td>" . $post["content"] . "</td></tr>";
            }

            ?>

        </tbody>
    </table>

    <a href="add_form_post.php">Ajouter un article</a>

</body>

</html>