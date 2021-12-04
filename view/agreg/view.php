<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/footer.css">

    </head>
    <body>

           

        <?php
            // Si $controleur='voiture' et $view='list',
            // alors $filepath="/chemin_du_site/view/voiture/list.php"
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
     <?php require_once('components/footer.php'); ?>



    </body>
</html>