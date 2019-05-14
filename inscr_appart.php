<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>House Sharing</title>
</head>
<body> 
<h1>Inscription d'un nouveau logement:</h1>
<form action="inscr_appart_post.php" method="post" <form method="post" action="reception.php" enctype="multipart/form-data">
<label for="adresse">Adresse du logement :</label><br />
<input type="text" name="adresse" /><br /><br />
<label for="ville">Ville :</label><br />
<input type="text" name="ville" /><br /><br />
<label for="taille">Taille du logement (en m²) :</label><br />
<input type="text" name="taille" /><br /><br />
<label for="personne">Combien de personnes pouvez-vous acceuillir ?<br />
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
<label for="description">Description du logement :</label></br>
<textarea name="description" rows="8" cols="45">
Votre Description
</textarea> <br />
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
<input type="submit" value="Valider" />
</form>
</body>
</html>