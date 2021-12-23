<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage d'un utilisateur</title>
</head>
<body>
    <?php include('../components/menu.php'); ?>
    <?php
    $test = $v->getnomCate();
      echo 'Nom de la catégorie : ' . $v->getnomCate() . "\n";
      echo "<br>";
      echo 'Palier Bas : ' .$v->getpalierBas() . "\n";
      echo "<br>";
      echo 'Palier Moyen : ' .$v->getpalierMoyen() . "\n";
      echo "<br>";
      echo 'Palier Bas : ' .$v->getpalierHaut()  . "\n";
      echo '<br>';
      echo 'Supprimer la catégorie : ' . "<a href='../controller/routeur.php?action=delete&controller=categorie&nomCate=$test'>appuyer ici</a>";

    ?>
    <?php include('../components/footer.php'); ?>

</body>
</html>