<?php

$bdd = new PDO('mysql:host=localhost;dbname=housesharing','root','root');
$sql=$bdd->prepare('SELECT * FROM user WHERE mail=:mail  AND mdp=:pass');

    if(isset($_POST['Mail'])){
        $sql->execute(array(
            'mail'=>$_POST['Mail'],
            'pass'=>$_POST['Password']));
        $auth=$sql->fetch();
    }
    if (isset($auth['id'])and isset($_POST['mail']))
	{
		$_SESSION['iduser']=$auth['iduser'];
		$_SESSION['identifiant']=$auth['identifiant'];
		$_SESSION['mdp']=$auth['mdp'];
		unset($auth);
	
	echo "<p>vous etes identifié</p>";
        
        }
        else
	
	{  
		if(isset($_POST['Mail']))
		{
                    echo"<p>mauvais mot de passe</p>";
                }
                echo "
		<fieldset>
		<legend> Connexion: </legend>
		<form method=\"post\" action=\"connexion.php\" />
				<label for=\"mail\">Adresse mail:</label>
			<input type=\"mail\" name=\"mail\" />
				<label for=\"password\">Mot de passe:</label>
			<input type=\"password\" name=\"password\"/>
				<label for=\"box\" class=\"inline\">Rester connecté:</label>
			<input type=\"checkbox\" name=\"box\" id=\"box\"/>
			
			<input type=\"submit\" name=\"valider\" value=\"Connexion!\" />
		</form>
		</fieldset>"
		;
			
			}
                        
                        
// Récupération des variables necessaires à la vérification du champ 'actif' de la BDD
$pseudo = $_POST['pseudo'];
 
// Récupération de la valeur du champ actif pour le login $login
$stmt = $bdd->prepare("SELECT Actif FROM users WHERE pseudo like :pseudo ");
if($stmt->execute(array(':pseudo' => $pseudo))  && $row = $stmt->fetch())
  {
   	$Actif = $row['Actif']; // $actif contiendra alors 0 ou 1
  }
 
 
// Il ne nous reste plus qu'à tester la valeur du champ 'actif' pour
// autoriser ou non le membre à se connecter
 
if($Actif == '1') // Si $actif est égal à 1, on autorise la connexion
  {
   //...
   // On autorise la connexion...
   //...
  }
else // Sinon la connexion est refusé...
  {
   //...
   // On refuse la connexion et/ou on previent que ce compte n'est pas activé
   //...
  }                        
                        
?>                        
                        
<html>
    <a href="inscription.php">Pas encore inscrit ?</a>
</html>

   
                        