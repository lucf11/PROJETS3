<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Modif d'une catégorie de poursuites d'études</title>
</head>
<body>
	<form method="post" action="../controller/routeur.php?action=created&controller=categorie">
  <fieldset>
    <legend>Modifiez une catégorie :</legend>
    <p>
      <?php
        $nom = $_GET['nomCate'];
      
       echo '<input type="text" placeholder='$nom' name="nomCate" id="nomCate" readonly required/>'
       ?>
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