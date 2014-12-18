<?php
    $entete = entete("Mon site / Ajouter un logement");
    $menu = menu();
    $contenu = ajoutuser();
    $pied = pied();

    include 'gabarit.php';
    
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

?>