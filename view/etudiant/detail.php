<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Elève</title>
</head>
<body>
    <?php include('../components/menu.php'); ?>
    <?php
      echo '<div class="nomEtud">'. $v->getNomEtudiant()'</div>'.
      '<div class="rang">'$v->getRangIUT()'</div>'.
      '<div class="bac">'$v->getBaccalaureat()'</div>'.
      '<div class="classementGlobale">'$v->getClassementGlobale()'</div>'.
      '<div class="moyenne">'$v->getMoyenneGlobale()'</div>'
    ?>
    <?php include('../components/footer.php'); ?>

</body>
</html>