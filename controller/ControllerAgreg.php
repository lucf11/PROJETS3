<?php
require_once('../model/ModelAgreg.php');
class ControllerAgreg{

    public static function readAll() {
        $tab_a = ModelAgreg::getAllAgreg();     //appel au modèle pour gerer la BD
        $controller='agreg';
        $view='list';
        $pagetitle='Liste des notes agréger';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function read(){
    	$id = $_POST['idAgregation'];
    	$a = ModelAgreg::getAgregByID($id);//appel au modèle pour gerer la BD
        $controller='agreg';
    	if($a == false){
            $view = 'error';
            $pagetitle = 'Module  inconnu';
    		require ('../view/module/view.php');//redirige vers la vue de produit non reconnu 
    	}else{
            $view = 'detail';
            $pagetitle = 'Détail de lagregation';    
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);  //"redirige" vers la vue
    	}
    } 
    public static function create(){
        $view = 'create';
        $pagetitle  = 'Creation dune note agréger';
        $controller = 'agreg';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    //création générale d'un util -> on différencie prof et etudiant avec les permissions
    public static function created(){
    	$idAgregation = $_POST['idAgregation'];
    	$nom = $_POST['nom'];
    	$coeff = $_POST['coeff'];
    	$agregation = new ModelUtilisateur($idAgregation,$nom,$coeff);
    	$agregation->save();
    	ControllerAgreg::readAll();
        $controller = 'agreg';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
}


?>