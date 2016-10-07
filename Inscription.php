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
        <form method="POST" action="Inscription_traitement.php">
            Pseudo: <input type = "text" name = "pseudo"/><br/>
            Mot de passe: <input type = "text" name = "mdp"/><br/>
            Retapez votre mot de passe: <input type = "text" name = "verif_mdp"/><br/>
            E-mail: <input type = "text" name = "mail"/><br/>
            <input type = "submit" value = "Inscription"/><br/>
        </form>
    </body>
</html>

