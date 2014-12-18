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
    
    function afficherlog($iduser){
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

                    if(empty($_POST)) {
                        echo(selectmeslog($iduser));
                    }
                    if (!empty($_POST)) {
                            echo(selectmeslog($iduser));
                            $idappart = $_POST['appart'];
                            $q=$bdd->query("SELECT * FROM appart WHERE idappart='$idappart'");
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
                    }

        $afficherlog=ob_get_clean();
        return $afficherlog;
    }


    function selectmeslog($iduser){
        ob_start();
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
            }

            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }

            //$iduser=$_SESSION["iduser"];
            $qLog=$bdd->query("SELECT * FROM appart WHERE iduser='$iduser'");
            $ligneLog = $qLog-> fetch();
            ?>

            <form method="post">
            <div class="middle">
            <div class="centre_colonne">
            <?php
            if (isset($ligneLog['idappart']) && !empty($ligneLog['idappart'])){
            ?>
                    <label for="appart">Selectionner votre appartement pour le voir :</label><br />
                    <select name="appart">
                    <!-- On crée une boucle permettant d'afficher tous les lieux -->
                    <?php //$ligneLog = $qLog-> fetch(); // On initialise la boucle
                    do {?>
                    <option value=<?php echo($ligneLog['idappart']); ?>><?php echo($ligneLog['ville']." > ".$ligneLog['adresse']); ?></option>
                    <?php
                    $ligneLog = $qLog-> fetch();
                    } while (!empty($ligneLog)); ?>
                    </select>

                    <br/>

                    <input type="submit" name="valider" value="valider" /><br/>
            <?php } ?>
            </div>
            </div>
            </form>

            <?php


        $selectmeslog =  ob_get_clean();
        return $selectmeslog;
    }

    include 'gabarit.php';
?>