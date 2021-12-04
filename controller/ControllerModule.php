<?php
$model_path_array = array('model/ModelModule.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
class ControllerModule {
    public static function readAll() {
        $tab_v = ModelModule::getAllModules();     //appel au modèle pour gerer la BD
        $controller='module';
        $view='list';
        $pagetitle='Liste des Modules';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function read(){
    	$id = $_POST['idModule'];
    	$v = ModelModule::getModuleByID($id);//appel au modèle pour gerer la BD
        $controller='module';
    	if($v == false){
            $view = 'error';
            $pagetitle = 'Module  inconnu';
    		require ('../view/module/view.php');//redirige vers la vue de produit non reconnu 
    	}else{
            $view = 'detail';
            $pagetitle = 'Détail du module';    
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);  //"redirige" vers la vue
    	}
    } 
}
?>