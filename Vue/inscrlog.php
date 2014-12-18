<?php
    $entete = entete("Mon site / Ajouter un logement");
    $menu = menu("moncompte");
    $sousmenu = sousmenucompte("meslog");
    $contenu = ajoutlog();
    $pied = pied();

    include 'gabarit.php';
    
    function ajoutlog(){
        ob_start();
        ?>
        <h1>Inscription d'un nouveau logement :</h1>
        <?php

            //Connexion à la base de donnée
            //include (Modele/connexion.php);

            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
            }

            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }

            //Vérifier si le formulaire a été envoyé
            if(empty($_POST)) {
                    echo(formlog());
                    echo("bonjour");

            } else {
                    // Vérifier qu'il n'y a pas d'erreurs
                    global $error;
                    global $rempli;
                    $error = array();
                    $rempli = array();
                    if (empty($_POST['adresse'])) {
                            $error["adresse"] = "Il n'y a pas d'adresse";
                            //echo ($error['adresse']);
                    } 
                    if (empty($_POST['ville'])) {
                            $error["ville"] = "Il n'y a pas de ville";
                            //echo ($error["ville"]);
                    } 
                    if (empty($_POST['taille'])) {
                            $error["taille"] = "Vous n'avez pas précisé la taille";
                    }
                    if (empty($_POST['desc'])) {
                            $error["desc"] = "Il faut rajouter une description";
                    } 
                    if(count($error)>0) {

                        $rempli["adresse"] = $_POST['adresse'];
                        $rempli["latitude"] = $_POST['latitude'];
                        $rempli["altitude"] = $_POST['altitude'];
                        $rempli["nomLieu"] = $_POST['nomLieu'];
                        echo(formlog());
                    }
                    if(count($error)==0) { // Insertion du formulaire ds la bdd
                    $req = $bdd->prepare('INSERT INTO appart(adresse, ville, taille, nombrepiece, nbrepers, description, demande, iduser) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
                    $req->execute(array(
                            $_POST['adresse'], 
                            $_POST['ville'], 
                            $_POST['taille'], 
                            $_POST['nombrepiece'],
                            $_POST['personne'],
                            $_POST['desc'],
                            $_POST['demande'],
                            $_SESSION['iduser']
                            ));
                    echo 'Votre appartement a bien été enregistré' ;
                    }

                    function enregis($index,$destination,$maxsize=FALSE,$extensions=FALSE)
                    {
                        ob_start();
                        echo("il fait moche");
                        //var_dump($_FILES['$index']);
                   //Test1: fichier correctement uploadé
                     if (!empty($_FILES['$index']) OR $_FILES[$index]['error'] > 0) { 
                         echo("probleme quand uploadé");
                         return FALSE; }
                   //Test2: taille limite
                     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) {
                         echo("probleme taille limite");
                         return FALSE; }
                   //Test3: extension
                     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                     echo("ext =".$ext);
                     //if ($extensions !== FALSE AND !in_array($ext,$extensions)) {
                         //echo("probleme extension");
                         //return FALSE; }
                   //Déplacement
                     echo("il fait beau");
                     echo $_POST(["photo1"]);
                     $nomImage = $_POST(["photo1"]).'.jpg';
                     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
                    $enregis = ob_get_clean();
                    return $enregis;
                    }
                        echo("le soleil brille");
                    //$rep = $bdd -> lastInsertId();
                        echo $_POST['adresse'];
                    //$rep = 1;
                    //echo($rep);
                      //$upload1 = enregis('$_POST(["photo1"])',"images/$rep photo1.jpg", FALSE, array('png','gif','jpg','jpeg') );
                      //$upload2 = enregis('photo2',"images/$rep photo2.jpg", FALSE, array('png','gif','jpg','jpeg') );
                      //$upload3 = enregis('photo3',"images/$rep photo3.jpg", FALSE, array('png','gif','jpg','jpeg') );
                       echo 'il y a des nuages' ;


            }

        $ajoutlog = ob_get_clean();
        return $ajoutlog;
    }
  

    function formlog(){
        ob_start();
        global $error;
        global $rempli;

        try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
            }

            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }

        ?>
        <form method="post" action="index.php?cible=inscrlog"> <!--<form method="post" action="reception.php" enctype="multipart/form-data">-->
        <!-- Adresse -->
        <!-- Vérification erreur -->
        <?php if (isset($error["adresse"])&&!empty($error["adresse"])) { ?> <!-- si il y a une erreur et que la variable error associée à nomE existe -->

            <div class="error"><?php echo $error["adresse"] ?></div> <!-- affiche l'erreur -->
        <?php } ?>

        <label for="adresse">Adresse :</label><br/>
        <?php echo ($_POST["adresse"]); ?>
        <?php echo ($rempli["adresse"]) ; ?>
        <!-- Ajout du champ prérempli -->
        <!--<input type="text" name="adresse" value="<?php //(isset($rempli['adresse'])&&(!empty($rempli['adresse'])))? $rempli['adresse']: "";?>"><br />
        <!--//ligne précédente rajoute la variable nomI si le champ avait été rempli auparavant.-->

        <?php if( isset($rempli["adresse"])){ echo ("bonjour"); ?>
                    <input type="text" name="adresse" value="<?php echo ($rempli["adresse"]);?>"><br />
                                    <?php }else{ ?>
                                    <input type="text" name="adresse"><br />
                                    <?php } ?>

        <!-- Ville -->
        <!-- Vérification erreur -->
        <?php if (isset($error["ville"])&&!empty($error["ville"])) { ?> <!-- si il y a une erreur et que la variable error associée à nomE existe -->   
            <div class="error"><?php echo $error["ville"]; ?></div> <!-- affiche l'erreur -->
        <?php } ?>

        <label for="ville">Ville :</label><br/>
        <!-- Ajout du champ prérempli -->
        <input type="text" name="ville" value="<?php (isset($_POST["ville"])&&!empty($_POST["ville"]))? $_POST["adresse"]: "";?>"><br />
        <!--//ligne précédente rajoute la variable nomI si le champ avait été rempli auparavant.-->


        <!-- Taille -->
        <!-- Vérification erreur -->
        <?php if (isset($error["taille"])&&!empty($error["taille"])) { ?> <!-- si il y a une erreur et que la variable error associée à nomE existe -->   
            <div class="error"><?php echo $error["taille"]; ?></div> <!-- affiche l'erreur -->
        <?php } ?>

        <label for="taille">Taille du logement (en m²) :</label><br />
        <!-- Ajout du champ prérempli -->
        <input type="text" name="taille" value="<?php (isset($_POST["taille"])&&!empty($_POST["taille"]))? $_POST["taille"]: "";?>"><br />
        <!--//ligne précédente rajoute la variable nomI si le champ avait été rempli auparavant.-->


        <label for="nombrepiece">Combien de pièces y a-t-il dans votre appartement ?</label><br />
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
            <label for="personne">Combien de personnes pouvez-vous acceuillir ?</label><br />
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

        <!-- Description -->
        <!-- Vérification erreur -->
        <?php if (isset($error["desc"])&&!empty($error["desc"])) { ?> <!-- si il y a une erreur et que la variable error associée à nomE existe -->   
            <div class="error"><?php echo $error["desc"]; ?></div> <!-- affiche l'erreur -->
        <?php } ?>

        <label for="desc">Description du logement :</label></br>
        <textarea name="desc" rows="8" cols="45" value="<?php (isset($_POST["desc"])&&!empty($_POST["desc"]))? $_POST["desc"]: "";?>"></textarea> <br />

        <label for="demande">Contraintes et demandes :</label></br>
        <textarea name="demande" rows="8" cols="45" value="<?php (isset($_POST["demande"])&&!empty($_POST["demande"]))? $_POST["demande"]: "";?>"></textarea> <br />

        <p>Autorisez vous dans votre logement :</p>

        Les fumeurs
        <input type="radio" name="fumeurs" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
        <input type="radio" name="fumeurs" value="non" id="non" /> <label for="non">Non</label><br />

        Les animaux
        <input type="radio" name="animaux" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
        <input type="radio" name="animaux" value="non" id="non" /> <label for="non">Non</label><br />

        Les enfants
        <input type="radio" name="enfants" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
        <input type="radio" name="enfants" value="non" id="non" /> <label for="non">Non</label><br /></br>
        <label for="photo1">Ajoutez une photo du logement :</label><br />
        <!--<input type="file" name="photo1" id="photo1"><br /><br />-->

        <!--<label for="photo1">Ajoutez une première photo du logement :</label><br />
        <input type="file" name="photo1"><br /><br />
        <label for="photo2">Ajoutez une deuxième photo du logement :</label><br />
        <input type="file" name="photo2"><br /><br />
        <label for="photo3">Ajoutez une troisième photo du logement :</label><br />
        <input type="file" name="photo3"><br /><br />-->

        <input type="submit" value="Valider" />

        </form>

        <?php
        $formlog = ob_get_clean();
        return $formlog;
    }

?>