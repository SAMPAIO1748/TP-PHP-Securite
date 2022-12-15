<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <?php

    session_start();

    if (!isset($_SESSION["email"])) {
        header('Location: connct_form.php');
    }

    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
    $sql = "SELECT * FROM user WHERE id =:id";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
    $requete->execute();
    $resultat = $requete->fetch();

    ?>
    <h1>Mon Compte</h1>
    <div class="flex justify-center">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    echo "<td>" . $resultat['name'] . "</td><td>" . $resultat['firstname'] .
                        "</td><td>" . $resultat["email"] . "</td>";
                    ?>
                </tr>
            </tbody>
        </table>
    </div>


    <?php

    if (isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
        echo "<a href='list_user.php'>Liste des users</a>";
    }

    ?>

    <a href="update_form_user.php">Modifier mon compte</a>
    <!-- Exercice : créer un bouton sur cette page qui permet de supprimer le compte de la personne connectée -->
    <a href="delete_user.php">Supprimer mon compte</a>
</body>

</html>