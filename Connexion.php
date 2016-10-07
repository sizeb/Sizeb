<?php
    require_once('BDD.php');
    
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp']))
    {
        $query = $bdd->prepare('SELECT * FROM user WHERE pseudo = :pseudo AND pass = :mdp');
        $query->execute(array(
            'pseudo' => $_POST['pseudo'],
            'mdp' => sha1($_POST['mdp'])
        ));
        
        $res = $query->fetch();
        
        if(!$res){
            // Le pseudo et/ou le mot de passe est faux !
            echo 'Le pseudo et/ou le mot de passe est faux !';
        }
        else{
            // Connexion !
            echo 'Connexion réussi !';
            session_start();
            // Charger toutes les données neccesaire dans les variables session .
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['type'] = $res['type'];
            
            // Redirection vers index_membre
            header('location: Accueil.php');
            
        }
    }
?>

