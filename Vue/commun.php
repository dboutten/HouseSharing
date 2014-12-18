<?php

// Génère le code HTML du formulaire de connexion
function formulaire(){
    ob_start();
    ?>
        <fieldset>
            <form method="POST" action="index.php?cible=verif">
                Identifiant
                <!--<br/>-->
                <input type="text" name="identifiant"/>
                Mot de passe
                <input type="password" name="mdp"/>
                <input type="submit" name="register" value="Se Connecter"/>
            </form>
        </fieldset>
    <?php
    $formulaire = ob_get_clean();
    return $formulaire;
}

// Génère le code HTML de l'entête
function entete($titre){
    ob_start();
    ?>
        <h1>
            <?php echo($titre);?>
        </h1>
            <?php echo('url(../images/banniere_haut.png)') ?>
    <?php
    $entete = ob_get_clean();
    return $entete;
}

// Génère le code HTML du menu
// le lien associé à l'étape courante est mis en couleur
function menu($etape){
    ob_start();
    ?>
        <ul class="menu">
            <?php 
                if($etape=="accueil"){
                    echo('<li><a href="index.php?cible=accueil"><span class="selection">Accueil</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=accueil">Accueil</a></li>');
                }
                
                if($etape=="recherche"){
                    echo('<li><a href="index.php?cible=recherche"><span class="selection">Recherche</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=recherche">Recherche</a></li>');
                }
                
                if($etape=="moncompte"){
                    echo('<li><a href="index.php?cible=moncompte"><span class="selection">Mon Compte</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=moncompte">Mon Compte</a></li>');
                }
                
                if($etape=="forum"){
                    echo('<li><a href="index.php?cible=forum"><span class="selection">Forum</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=forum">Forum</a></li>');
                }
                
                //echo '<li><a href="index.php?cible=deconnexion">Deconnexion</a></li>';
            ?>
        </ul>
    <?php
    $menu = ob_get_clean();
    return $menu;
}

// Génère le code HTML du pied de page
// même code pour toutes les pages
function pied(){
    ob_start();
    ?>
        <span style="font-style:italic;">Pied de page</span>
    <?php
    $pied = ob_get_clean();
    return $pied;
}


function sousmenucompte($sousetape){
    ob_start();
    ?>
        <ul>
            <?php 
                if($sousetape=="mesinfos"){
                    echo('<li><a href="index.php?cible=moncompte"><span class="selection">Mes informations personnelles</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=moncompte">Mes informations personnelles</a></li>');
                }
                
                if($sousetape=="meslog"){
                    echo('<li><a href="index.php?cible=meslog"><span class="selection">Mes logements</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=meslog">Mes logements</a></li>');
                }
                
                if($sousetape=="mesmess"){
                    echo('<li><a href="index.php?cible=mesmess"><span class="selection">Ma messagerie</span></a></li>');
                } else {
                    echo('<li><a href="index.php?cible=mesmess">Ma messagerie</a></li>');
                }
                
                //echo '<li><a href="index.php?cible=deconnexion">Deconnexion</a></li>';
            ?>
        </ul>
    <?php
    $menu = ob_get_clean();
    return $menu;
}
