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
      ///affichage de la liste de catégorie
      foreach($tab_v as $v){
        $cate = $v->getnomCate();
        $url = rawurlencode($cate);
        echo "<p> Nom de la catégorie : <a href='../controller/routeur.php?action=read&nomCate=$url&controller=categorie'>$cate</a>";
      }
              
    ?>
    <?php include('../components/footer.php'); ?>

</body>
</html>