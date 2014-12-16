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


function carousel(){
    ob_start();
    
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
        }

        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
    
    $q=$bdd->query("SELECT idappart FROM appart ORDER BY idappart desc");
    $ligne = $q-> fetch();
    
    ?>
        <div class="container">
			<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
					<div class="ca-item ca-item-1">
						<?php
                                                $idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-2">
                                                <?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-3">
						<?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-4">
						<?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-5">
						<?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-6">
						<?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-7">
						<?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
					<div class="ca-item ca-item-8">
						<?php
                                                $ligne = $q-> fetch();
						$idappart=$ligne['idappart'];
                                                echo contenucarousel($idappart); ?>
					</div>
				</div>
			</div>
		</div>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
                <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
		<script type="text/javascript">
			$('#ca-container').contentcarousel();
		</script>
    <?php
    $carousel = ob_get_clean();
    return $carousel;
}


function contenucarousel($idappart){
    ob_start();
    //Connexion à la base de donnée
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
        }

        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }


        $q=$bdd->query("SELECT * FROM appart WHERE idappart='$idappart'");
        $ligne = $q-> fetch();
        $ville = $ligne['ville'];
        $nombrepiece = $ligne['nombrepiece'];
        $nbrepers = $ligne['nbrepers'];
        $taille = $ligne['taille'];
        $adresse = $ligne['adresse'];
        
    
    ?>
    <div class="ca-item-main">
            <div class="ca-icon"></div>
            <h3><?php echo($ville); ?></h3>
            <h4>
                    <span><?php echo($taille." m²<br/>".$nombrepiece." pièces<br/>Peut accueillir ".$nbrepers." personnes."); ?></span>
            </h4>
                    <a href="#" class="ca-more">more...</a>
    </div>
    <div class="ca-content-wrapper">
            <div class="ca-content">
                <!-- Ajouter la description s'il y en a une -->
                <?php
                if (!empty($ligne['description'])){ ?>
                    <h5>Description</h5>
                    <?php
                } else { ?>
                    <div class="ca-content-text">
                    <p>Il n'y a pas de description</p>
                    </div>
                <?php } ?>
                    <a href="#" class="ca-close">close</a>
                    <div class="ca-content-text">
                            <?php
                            if (!empty($ligne['description'])){
                                $desc=$ligne['description']; ?>
                                <p><?php echo ($desc);?></p>
                                <?php
                            } ?>
                            
                    </div>
                    
                <!-- Ajouter les demandes s'il y en a -->
                <?php
                if (!empty($ligne['demande'])){ ?>
                    <h5>Demandes et contraintes</h5>
                    <?php
                } ?>
                    <a href="#" class="ca-close">close</a>
                    <div class="ca-content-text">
                            <?php
                            if (!empty($ligne['demande'])){
                                $demande=$ligne['demande']; ?>
                                <p><?php echo ($demande);?></p>
                                <?php
                            } ?>
                                
                    </div>
                    <?php
                    ?>
                    <ul>
                            <li><a href="index.php?cible=vuelog&idlog=<?php echo($idappart); ?>">Afficher la page du logement</a></li>
                            <!--<li><a href="#">Share this</a></li>
                            <li><a href="#">Become a member</a></li>
                            <li><a href="#">Donate</a></li>-->
                    </ul>
            </div>
    </div>
    <?php
    $contenucarousel = ob_get_clean();
    return $contenucarousel;
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


function ajoutuser(){
    ob_start();
        // Connexion à la base de données
        //include (Modele/connexion.php);
        try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=housesharing', 'root', 'root');
            }

            catch(Exception $e)
            {
            die('Erreur : '.$e->getMessage());
            }
        
        if(empty($_POST)) {
                echo(formuser());
        }
        else{
        
        // Insertion du formulaire dans la bdd
            // On regarde si tout les champs sont remplis, sinon, on affiche un message à l'utilisateur.
            if($_POST["pseudo"] == NULL OR $_POST["password"] == NULL OR $_POST["password2"] == NULL OR $_POST["Telephone"]== NULL OR $_POST["Mail"]  == NULL OR $_POST["Nom"]== NULL OR $_POST["Prenom"]  == NULL){

                // On met la variable $error à TRUE pour que par la suite le navigateur sache qu'il y'a une erreur à afficher.
                $error = TRUE;

                // On écrit le message à afficher :
                echo ("Tout les champs doivent être remplis !");

                }
            // Sinon, si les deux mots de passes correspondent :    
            elseif($_POST["password"] == $_POST["password2"])
                {
                     // Si tout va bien on regarde si le nom de compte n'exède pas 60 caractères.
                    if(strlen($_POST["pseudo"] < 60)){

                        // Si le nom de compte et le mot de passe sont différent :
                        if($_POST["pseudo"] != $_POST["password"]){

                            if($_post["Telephone"] =10)
                            {
                                //if((preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['Telephone'])))
                                //{
                                    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['Mail']))
                                    {
                                         // On le met des variables de session pour stocker le nom de compte et le mot de passe :
                                        $req = $bdd->prepare('INSERT INTO user(identifiant, mdp, mail, telephone, nom, prenom) VALUES(?,?,?,?,?,?)');
                                        $req->execute(array(
                                        $_POST['pseudo'],
                                        $_POST['password'],
                                        $_POST['Mail'],
                                        $_POST['Telephone'],
                                        $_POST['Nom'],
                                        $_POST['Prenom']
                                        ));
                                        echo'vous êtes inscrits';
                                    }
                                    else
                                    {
                                        echo'adresse Mail invalide';
                                    }
                                //}
                                //else
                                //{
                                //    echo'numéro de Telephone invalide : mauvais caractères';
                                //}
                            }    
                            else{
                                echo'numéro de Telephone invalide';
                            }

                        // Sinon si le nom de compte et le mot de passe ont la même valeur :
                        }
                        else($_POST["pseudo"] == $_POST["password"]);
                        {
                        $error = TRUE;
                        $errorMSG = "Le nom de compte et le mot de passe doivent être différents !";
                        }                    
                    // Si le mot de passe dépasse 60 caractères on le fait savoir
                    }
                    else{
                     $error = TRUE;
                     $errorMSG = "Votre pseudo ne doit pas dépasser <strong>60 caractères</strong> !";
                     $login = $_POST["pseudo"];
                     $pass = NULL;
                    }          
                // Sinon si les deux mots de passes sont différents : 
                }
                elseif($_POST["password"] != $_POST["password2"]){

                $error = TRUE;
                 echo "Les deux mots de passes sont différents !";
                 $login = $_POST["pseudo"];
                 $pass = NULL;
                }                   
            // Sinon si les deux mots de passes sont différents :      
            elseif($_POST["password"] != $_POST["password2"]){
                 $error = TRUE;
                 echo "Les deux mots de passes sont différents !";
                 $login = $_POST["pseudo"];
                 $pass = NULL;

            }
        
        ini_set('SMTP','smtp.SFR.fr');
        ini_set('sendmail_from' , 'benjypunky@hotmail.fr');
            // Récupération des variables nécessaires au mail de confirmation	
        $Mail = $_POST['Mail'];
        $pseudo = $_POST['pseudo'];

        // Génération aléatoire d'une clé
        $cle = md5(microtime(TRUE)*100000);

        // Insertion de la clé dans la base de données (à adapter en INSERT si besoin)
        //$stmt = $bdd->prepare("UPDATE user SET cle='$cle' WHERE identifiant='$pseudo'");
        //$stmt = $bdd->prepare("UPDATE user SET cle=:cle WHERE identifiant like :pseudo");
        /*$stmt->bindParam(':cle', $cle);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();*/


        /*// Préparation du mail contenant le lien d'activation
        $destinataire = $Mail;
        $sujet = "Activer votre compte" ;
        $entete = "From: benjypunky@hotmail.fr" ;

        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = "Bienvenue sur VotreSite,

        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.

        http://localhost:8000/validation.phplog='.urlencode($pseudo).'&cle='.urlencode($cle).'


        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.";


        mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail*/
        }
        
    $ajoutuser=ob_get_clean();
    return $ajoutuser;
}


function formuser(){
    ob_start();
    ?>
    
    <form method="post" action="index.php?cible=inscruser">

        <table>

        <tr>

        <td><label for="pseudo"><strong>Identifiant :</strong></label></td>
        <td><input type="text" name="pseudo" id="pseudo"/></td>

        </tr>

        <tr>

        <td><label for="password"><strong>Mot de passe :</strong></label></td>
        <td><input type="password" name="password" id="pass"/></td>

        </tr>

        <tr>

        <td><label for="password2"><strong>Mot de passe :</strong></label></td>
        <td><input type="password" name="password2" id="pass2"/></td>

        </tr>

        <tr>

        <td><label for="Telephone"><strong>Numero de telephone :</strong></label></td>
        <td><input type="text" name="Telephone" id="Telephone"/></td>

        </tr>

        <tr>

        <td><label for="Mail"><strong>Mail :</strong></label></td>
        <td><input type="text" name="Mail" id="Mail"/></td>

        </tr>

        <tr>

        <td><label for="Nom"><strong>Nom :</strong></label></td>
        <td><input type="text" name="Nom" id="Nom"/></td>

        </tr>

        <tr>

        <td><label for="Prenom"><strong>Prenom :</strong></label></td>
        <td><input type="text" name="Prenom" id="Prenom"/></td>

        </tr>
        </table>

    <input type="submit" name="register" value="S'inscrire"/>

    </form>
        
    <?php
    $formuser=ob_get_clean();
    return $formuser;
}



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
                
        } else {
                // Vérifier qu'il n'y a pas d'erreurs
                global $error;
                $error = array();
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
                /*
                function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
                {
                    echo("il fait moche");
                    var_dump($_FILES[$index]);
               //Test1: fichier correctement uploadé
                 if (!empty($_FILES[$index]) OR $_FILES[$index]['error'] > 0) { 
                     echo("probleme quand uploadé");
                     return FALSE; }
               //Test2: taille limite
                 if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) {
                     echo("probleme taille limite");
                     return FALSE; }
               //Test3: extension
                 $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                 //if ($extensions !== FALSE AND !in_array($ext,$extensions)) {
                     //echo("probleme extension");
                     //return FALSE; }
               //Déplacement
                 echo("il fait beau");
                 return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}
                    echo("le soleil brille");
                //$rep = $bdd -> lastInsertId();
                $rep = 1;
                echo($rep);
                  $upload1 = upload('$_POST(["photo1"])',"images/photo1.jpg", FALSE, array('png','gif','jpg','jpeg') );
                  //$upload2 = upload('photo2',"images/$rep photo2.jpg", FALSE, array('png','gif','jpg','jpeg') );
                  //$upload3 = upload('photo3',"images/$rep photo3.jpg", FALSE, array('png','gif','jpg','jpeg') );
                   echo 'il y a des nuages' ;
                 */
        }

    $ajoutlog = ob_get_clean();
    return $ajoutlog;
}
  

function formlog(){
    ob_start();
    global $error;
    ?>
    <form method="post" action="index.php?cible=inscrlog"> <!--<form method="post" action="reception.php" enctype="multipart/form-data">-->
    <!-- Adresse -->
    <!-- Vérification erreur -->
    <?php if (isset($error["adresse"])&&!empty($error["adresse"])) { ?> <!-- si il y a une erreur et que la variable error associée à nomE existe -->

        <div class="error"><?php echo $error["adresse"] ?></div> <!-- affiche l'erreur -->
    <?php } ?>

    <label for="adresse">Adresse :</label><br/>
    <!-- Ajout du champ prérempli -->
    <input type="text" name="adresse" value="<?php (isset($_POST["adresse"])&&!empty($_POST["adresse"]))? $_POST["adresse"]: "";?>"><br />
    <!--//ligne précédente rajoute la variable nomI si le champ avait été rempli auparavant.-->
    
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
    <textarea name="desc" rows="8" cols="45" value="<?php (isset($_POST["desc"])&&!empty($_POST["ville"]))? $_POST["adresse"]: "";?>"></textarea> <br />
    
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
    <!-- <label for="photo1">Ajoutez une photo du logement :</label><br />
    <input type="file" name="photo1" id="photo1"><br /><br /> -->
    
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

function fichelog($idlog){
        
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
    }