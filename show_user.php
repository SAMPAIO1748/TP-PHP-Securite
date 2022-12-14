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

    $id = $_GET['id'];

    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
    $sql = "SELECT * FROM user WHERE user.id = :id";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    $resultat = $requete->fetch();

    //var_dump($resultat);

    ?>

    <h1>User : <?php echo $resultat['firstname'] . " " . $resultat["name"];  ?></h1>

    <div class="flex justify-center">
        <table>
            <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    echo "<td>" . $resultat['name'] . "</td><td>" . $resultat['firstname'] . "</td><td>" . $resultat['email'] . "</td>";

                    ?>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>