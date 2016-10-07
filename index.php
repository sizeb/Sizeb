<?php
    require_once('BDD.php');
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="Connexion.php">
            Pseudo: <input type = "text" name = "pseudo"/><br/>
            Mot de passe: <input type = "text" name = "mdp"/><br/>
            <input type = "submit" value = "Connexion"/><br/>
        </form>
    </body>
</html>
