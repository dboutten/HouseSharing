<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>House Sharing</title>
</head>
<body> 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du formulaire ds la bdd
$req = $bdd->prepare('INSERT INTO appartement(adresse, ville, taille, personne, description, fumeurs, animaux, enfants) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
$req->execute(array(
	$_POST['adresse'], 
	$_POST['ville'], 
	$_POST['taille'], 
	$_POST['personne'], 
	$_POST['description'], 
	$_POST['fumeurs'], 
	$_POST['animaux'], 
	$_POST['enfants']
	));
echo 'Votre appartement a bien été enregistré' ;
?>
</body>
</html>