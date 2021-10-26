<?php
require_once 'Controlleur.php';
// On recupère l'action passée dans l'URL
$action = $_GET['action'];
// Appel de la méthode statique $action de ControllerVoiture
Controlleur::$action(); 
?>
