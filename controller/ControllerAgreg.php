<?php
require_once('../model/ModelAgreg.php');
class ControllerAgreg{

    public static function readAll() {
        $tab_a = ModelAggreg::getAllAgreg();     //appel au modèle pour gerer la BD
        $controller='agreg';
        $view='list';
        $pagetitle='Liste des notes agréger';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function read(){
    	$id = $_POST['idAgregation'];
    	$a = ModelAggreg::getAgregByID($id);//appel au modèle pour gerer la BD
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
        $tab_module = ModelModule::getAllModules(); 
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    //création générale d'un util -> on différencie prof et etudiant avec les permissions
    public static function created(){
    	$idAgregation = $_POST['idAgregation'];
    	$nom = $_POST['nom'];
    	$coeff = $_POST['coeff'];
    	$agregation = new ModelAggreg($idAgregation,$nom,$coeff);
    	$agregation->save();
        foreach($_POST['module'] as $value){
            $insertListe = "INSERT INTO projetS3_ListeModuleAgreger VALUES('$idAgregation','$value')";
        }
    	ControllerAgreg::readAll();
        $controller = 'agreg';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
}


?>