<?php
    if (empty($sousmenucompte)){
        $entete = entete("Mon site / Mes Messages");
        $menu = menu("moncompte");
        if (isset($_SESSION["iduser"])){
            $sousmenu = sousmenucompte("mesmess");
            $contenu = "<h1>Ma messagerie</h1>";
        } else {
            $contenu= "Vous n'êtes pas connectés ! Connectez vous avant.";
        }
        $pied = pied();
    }

    include 'gabarit.php';
?>