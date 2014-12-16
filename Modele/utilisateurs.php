<?php
    //require("connexion.php");
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
        }

        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }


    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function mdp($db,$identifiant){
        $reponse = $db->query('SELECT * FROM user WHERE identifiant="'.$identifiant.'"');
        return $reponse;
    }

    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function utilisateurs($db){
        $reponse = $db->query('SELECT identifiant FROM user');
        return $reponse;
    }

    
?>
