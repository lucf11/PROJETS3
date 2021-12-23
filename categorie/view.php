<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="https://webinfo.iutmontp.univ-montp2.fr/~liguori/PROJETS3/controller/index.php?action=readAll">Liste des Etudiants</a></li>
                </ul>
            </nav>

        <?php
            // Si $controleur='voiture' et $view='list',
            // alors $filepath="/chemin_du_site/view/voiture/list.php"
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
        <footer>
            <p style="border: 1px solid black;text-align:right;padding-right:1em;">
                Université de Montpellier</p>
        </footer>


    </body>
</html>