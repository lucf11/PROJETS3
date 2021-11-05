<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Création d'un utilisateur</title>
</head>
<body>
	<form method="get" action="../../controller/index.php?action=created">
  <fieldset>
    <legend>Créez un utilisateur :</legend>
    <p>
      
      <input type="text" placeholder="idUtilisateur" name="idUtilisateur" id="idUtilisateur" required/>
      <input type="text" placeholder="password" name="password" id="password_id" required/>
      <input type="text" placeholder="permission" name="permission" id="permission_id" required/>

    </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
</form>
</body>
</html>