<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    // On active la session qui va ensuite enregistrer les paramètres de notre compte
    session_start();

    // Pour être sûr que notre sesion ne sera pas polluée par d'autres éléments, on vide cette session
    session_destroy();

    ?>

    <form action="connect.php" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Se connecter">
    </form>

</body>

</html>