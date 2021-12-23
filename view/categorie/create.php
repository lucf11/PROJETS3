<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Création d'une catégorie de Poursuite détudes</title>
</head>
<body>
	<form method="post" action="../controller/routeur.php?action=created&controller=categorie">
  <fieldset>
    <legend>Créez une catégorie :</legend>
    <p>
      
      <input type="text" placeholder="L3 info" name="nomCate" id="nomCate" required/>
      <input type="text" placeholder="palier Bas ex : 7" name="palierBas" id="palierBas" required/>
      <input type="text" placeholder="palier Moyen ex : 12" name="palierMoyen" id="palierMoyen" required/>
      <input type="text" placeholder="palier Haut ex : 15" name="palierHaut" id="palierHaut" required/>

    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>
</body>
</html>