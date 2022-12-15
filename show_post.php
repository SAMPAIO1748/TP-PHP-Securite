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
    $sql = "SELECT * FROM post 
    LEFT JOIN comment ON comment.id_post = post.id 
    LEFT JOIN user ON comment.id_user = user.id  WHERE post.id = :id";
    $requete = $bdd->prepare($sql);
    //Avec bindValue on attribue une valeur à :id et on sécurise cette valeur en définissant des paramètres
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $resultat = $requete->fetchAll();
    // On utilise fetch car on obtient un seul résultat.

    //var_dump($resultat[0]);


    ?>

    <h1>Article n°<?php echo $resultat[0]['id'] ?></h1>

    <img src="<?php echo "img/" . $resultat[0]['img'] ?>" alt="<?php echo $resultat[0]['title']  ?>">

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
            $date = date('d/m/Y', strtotime($resultat[0]['date']));

            echo "<tr><td>" . $resultat[0]['title'] . "</td><td>" .
                $resultat[0]['content'] . "</td><td>" . $date . "</td></tr>"

            ?>
        </tbody>
    </table>

    <hr>
    <h2>Les commentaires</h2>

    <?php

    if (isset($resultat[0]['contenue'])) {
        foreach ($resultat as $comment)
            echo '<p>' . $comment['contenue'] . "</p><h3>Par " . $comment['name'] . " " .
                $comment['firstname'] . "</h2><hr>";
    }

    ?>



</body>

</html>