<?php
    if (empty($sousmenucompte)){
        $entete = entete("Mon site / Mes Logements");
        $menu = menu("moncompte");
        if (isset($_SESSION["iduser"])){
            $sousmenu = sousmenucompte("meslog");
            $contenu = "<h1>Mes logements</h1><br/><a href='index.php?cible=inscrlog'>Ajouter un nouveau logement</a><br/><br/>";
            $contenu .= afficherlog($_SESSION["iduser"]);
        } else {
            $contenu= "Vous n'êtes pas connectés ! Connectez vous avant.";
        }
        $pied = pied();
    }

    include 'gabarit.php';
?>