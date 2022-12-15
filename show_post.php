<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Affichage article</title>
</head>

<body>

    <?php

    $id = $_GET['id'];

    $bdd = new PDO('mysql:host=localhost;dbname=securite', 'root', 'root');
    $sql = "SELECT * FROM post WHERE post.id = :id";
    $requete = $bdd->prepare($sql);
    //Avec bindValue on attribue une valeur à :id et on sécurise cette valeur en définissant des paramètres
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $resultat = $requete->fetch();
    // On utilise fetch car on obtient un seul résultat.

    //var_dump($resultat);


    ?>

    <h1>Article n°<?php echo $resultat['id'] ?></h1>

    <img src="<?php echo "img/" . $resultat['img'] ?>" alt="<?php echo $resultat['title']  ?>">

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php

            // conversion date fomrat français (jour/mois/Année)
            $date = date('d/m/Y', strtotime($resultat['date']));

            echo "<tr><td>" . $resultat['title'] . "</td><td>" .
                $resultat['content'] . "</td><td>" . $date . "</td></tr>"

            ?>
        </tbody>
    </table>

</body>

</html>