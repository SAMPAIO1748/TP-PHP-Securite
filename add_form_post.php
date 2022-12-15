<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajout d'article</title>
</head>

<body>

    <?php

    session_start();

    if (!isset($_SESSION['email']) || $_SESSION['role'] !== "admin")
        header("Location: connct_form.php");
    ?>

    <!-- ////////////////////////////////////////////// Pour permettre le traitement du fichier -->
    <form action="add_post.php" method="post" enctype="multipart/form-data">

        <label for="title">Titre de l'article</label>
        <input type="text" name="title" id="title">

        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>

        <label for="image">Image de l'article</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Enregistrer">
    </form>

    <!-- Faire une page d'inscription d'un user -->

</body>

</html>