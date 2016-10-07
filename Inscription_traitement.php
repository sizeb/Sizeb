<?php
    require_once('BDD.php');
    // tester si le pseudo est unique
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['verif_mdp']) && !empty($_POST['mail']))
    {
        if($_POST['mdp'] != $_POST['verif_mdp'])
        {
            echo 'Mot de passe différents !';
        }
        else
        {
            $query = $bdd->prepare('SELECT id FROM user WHERE pseudo = :pseudo');

            $query->execute(array(
                'pseudo' => $_POST['pseudo'],
            ));

            $res = $query->fetch();

            if(!$res)
            {
                $query = $bdd->prepare('INSERT INTO user(pseudo, pass, mail, type) VALUES(:pseudo, :mdp, :mail, 3)');
                $query->execute(array(
                    'pseudo' => $_POST['pseudo'],
                    'mdp' => sha1($_POST['mdp']),
                    'mail' => $_POST['mail']
                ));
                echo "Inscription reussi !";
                //header();
            }
            else echo "Ce pseudo n'est pas diponible !";
        }
    }
    else echo "Vous n'avez pas remplie tous les champs ;";
?>

