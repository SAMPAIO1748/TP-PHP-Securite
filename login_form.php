<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Inscription</title>
</head>

<body>
    <h1>S'inscrire</h1>

    <form action="login.php" method="post">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>