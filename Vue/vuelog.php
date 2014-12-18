<?php
   
    //global $idlog;
    $entete = entete("Le logement ...");
    $menu = menu("");
    //$contenu = "<h1>Logement :</h1><br/>";
    $contenu = fichelog($idlog);
    //$contenu = "coucou".formulaire()."au revoir";
    //$contenu .= fichelog($idlog);
    $pied = pied();

    include 'gabarit.php';
    
    function fichelog($idlog){
        ob_start();
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
        }

        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
        
        $q=$bdd->query("SELECT * FROM appart WHERE idappart='$idlog'");
        $ligne = $q-> fetch();

        ?>
        Ville : <?php echo($ligne['ville']); ?> <br/>
        Adresse : <?php echo($ligne['adresse']); ?> <br/>
        Taille : <?php echo($ligne['taille']); ?> m²<br/>
        Nombre de pièces : <?php echo($ligne['nombrepiece']); ?> <br/>
        Nombre de personnes pouvant être accueillies : <?php echo($ligne['nbrepers']); ?> <br/>
        Description :<br/><?php echo($ligne['description']); ?> <br/>
        Demandes et contraintes :<br/><?php echo($ligne['demande']); ?> <br/>
        <?php
        $fichelog=ob_get_clean();
        return $fichelog;
    }
?>