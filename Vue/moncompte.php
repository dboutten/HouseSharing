<?php
    if (empty($sousmenucompte)){
        $entete = entete("Mon site / Mon Compte");
        $menu = menu("moncompte");
        if (isset($_SESSION["iduser"])){
            $sousmenu = sousmenucompte("mesinfos");
            $contenu = "<h1>Mes informations personnelles</h1><br/>";
            $contenu .= "Nom : ".$_SESSION['nom']."<br/>Prénom : ".$_SESSION['prenom']."<br />Nom de compte : ".$_SESSION['identifiant']."<br />Mail : ".$_SESSION['mail']."<br/>Telephone : ".$_SESSION['telephone'];
        } else {
            $contenu .= "Vous n'êtes pas connectés ! Connectez vous avant.";
        }
        $pied = pied();
    }

    include 'gabarit.php';
?>
