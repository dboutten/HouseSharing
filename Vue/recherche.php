<?php
    $entete = entete("Mon site / Recherche");
    $menu = menu("recherche");

    $contenu = "<h1>Recherche</h1>";
    if (isset($_SESSION["iduser"])){
        $contenu .= $_SESSION['prenom']." ".$_SESSION['nom']." recherche.";
        //$contenu .= formrecherche();
        /*if (isset($_POST(['taille']))){
            echo("salut");
            $contenu .= recherche('taille', "$_POST(['taille']");
        }*/
    } else {
        $contenu .= "Ceci est la recherche<br/>";
        //$contenu .= formrecherche();
        /*if (isset($_POST(['taille']))){
            echo("salut");
            $contenu .= recherche('taille', "$_POST(['taille']");
        }*/
    }
    
    $pied = pied();

    include 'gabarit.php';
    
    
    
    function formrecherche(){
        ob_start();
        ?>
        <form method="post" action="index.php?cible=recherche">

        <label for="ville">Ville :</label><br/>
        <!-- Ajout du champ prérempli -->
        <input type="text" name="ville"><br />
        <!--//ligne précédente rajoute la variable nomI si le champ avait été rempli auparavant.-->


        <!-- Taille -->
        <label for="taille">Taille minimum du logement (en m²) :</label><br />
        <!-- Ajout du champ prérempli -->
        <input type="text" name="taille"><br />
        <!--//ligne précédente rajoute la variable nomI si le champ avait été rempli auparavant.-->


        <label for="nombrepiece">Combien de pièces minimum ?</label><br />
            <select name="nombrepiece">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15 ou +</option>
            </select> <br /><br />
        <label for="personne">Combien de places minimum ?</label><br />
            <select name="personne">
            <option value="1" selected="selected">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15 ou +</option>
            </select> <br /><br />
            <input type="submit" value="Valider" />
            </form>
        <?php

        $formrecherche = ob_get_clean();
        return $formrecherche;
    }
    
    function recherche($nomcritere,$critere){
        ob_start();
        // Connexion à la bd
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
        }

        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
        echo("bonjour");
        // recherche par critère
        if ($nomcritere=="taille"){
            $q=$bdd->query("SELECT * FROM appart WHERE taille='$critere'");
            $ligne=$q -> fetch ();?>
        <?php }

     
        $recherche=ob_get_clean();
        return $recherche;
    }
?>
