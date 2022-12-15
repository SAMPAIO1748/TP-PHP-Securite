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

    if (!isset($_SESSION['id'])) {
        header("Location: connct_form.php");
    }


    $id = $_SESSION['id'];

    $bdd = new PDO('mysql:host=localhost;dbname=securite', "root", "root");
    $sql = "SELECT * FROM user WHERE id = :id";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->execute();

    $resultat = $requete->fetch();

    //var_dump($resultat);

    ?>

    <form action="update_user.php" method="post">

        <input type="number" name="id" id="id" value="<?php echo $resultat['id'] ?>" style="display: none">

        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="<?php echo $resultat['name'] ?>">

        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $resultat['firstname'] ?>">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $resultat['email'] ?>">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="<?php echo $resultat['password'] ?>">

        <input type="submit" value="Enregistrer">

    </form>

</body>

</html>