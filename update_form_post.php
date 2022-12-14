<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de mise à jour des articles</title>
</head>

<body>

    <?php

    session_start();

    if (!isset($_SESSION['email'])) {
        header('Location: connct_form.php');
    }

    $id = $_GET['id'];

    $bdd = new PDO("mysql:host=localhost;dbname=securite", "root", "root");
    $sql = "SELECT * FROM post WHERE post.id = :id";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->execute();
    $resultat = $requete->fetch();

    //var_dump($resultat);

    ?>

    <form action="update_post.php" method="post">
        <input type="number" name="id" id="id" value="<?php echo $resultat['id']; ?>" style="display: none">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?php echo $resultat['title']; ?>">
        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10">
            <?php

            echo $resultat['content'];

            ?>
        </textarea>
        <input type="submit" value="Valider">
    </form>

</body>

</html>