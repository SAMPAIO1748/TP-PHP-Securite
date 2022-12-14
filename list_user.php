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

    <h1>Liste des utilisateurs</h1>

    <?php

    // Exercice Afficher la liste des users de la bdd (afficher nom et prenom)

    $bdd = new PDO("mysql:host=localhost;dbname=securite", 'root', 'root');
    $sql = "SELECT name, firstname FROM user";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $resultat = $requete->fetchAll();

    //var_dump($resultat);

    ?>

    <div class="flex justify-center">
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>Prénom</th>
                </tr>
            </thead>

            <tbody>
                <?php

                foreach ($resultat as $user) {
                    echo "<tr><td>" . $user['name'] . "</td><td>" . $user['firstname'] . "</td></tr>";
                }

                ?>
            </tbody>

        </table>

    </div>



</body>

</html>