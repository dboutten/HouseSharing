<?php
    //$dbname = "housesharing";
    //$host='localhost';
    //$user='root';
    //$pass='root';

    /*$bdd = new PDO("mysql:host=$host;dbname=$dbname", "$user", "$pass");
    $bdd->query("SET NAMES UTF8");*/
    
    	try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
        }

        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
?>