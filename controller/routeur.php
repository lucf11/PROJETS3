<?php
// $path_array = array("ControllerAgreg.php");
// require_once (File::build_Path($path_array));
// $path_array = array("ControllerEtudiant.php");
// require_once(File::build_Path($path_array));

require_once ('controller/ControllerAgreg.php'); // chargement du modèle
require_once ('controller/ControlleurEtudiant.php'); // chargement du modèle
require_once ('controller/ControllerUtilisateur.php'); // chargement du modèle
require_once ('controller/ControllerModule.php'); // chargement du modèle


if (isset($_GET['action'])){ // On recupère l'action passée dans l'URL
	$action = $_GET['action'];
} else {
	$action = 'readAll'; // Lorsque l'on arrive sur le site on voit directement la meme page que si on etait sur readAll
}


$controller_default = 'etudiant';
if(isset($_GET['controller'])){ // On recupère le controleur dans l'URL
	$controller = $_GET['controller'];
} elseif (isset($_COOKIE['preference'])){
	$controller = $_COOKIE['preference'];
} else {
	$controller = $controller_default;
}

$controller_class = 'Controller'. ucfirst($controller);

if(class_exists($controller_class)){
	$tab_methode_controller = get_class_methods($controller_class);
	if ((in_array($action, $tab_methode_controller))){
		// Appel de la méthode statique $action du controlleur récupéré dans l'URL
		$controller_class::$action();
	} else {
	
		$controller_class::error();
	}
} else {
	echo 'erreur';
}





?>
