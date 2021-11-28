<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Dossier</title>
</head>
<body>
    <?php include('../components/menu.php'); ?> 
    <?php
      ///affichage de la liste d'etudiant.
      foreach($tab_v a $v)
        echo 'Nom : ' . $v->getNomEtudiant() . 'moyenne : ' . $v->getMoyenneGlobale();
        echo '<a href="../../controller/index.php?action=read&controller=etudiant">Afficher le détails de l\'étudiant</a>';
              
    ?>
    <?php include('../components/footer.php'); ?>

</body>
</html>