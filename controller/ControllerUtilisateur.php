<?php
require_once ('../model/ModelUtilisateur.php'); // chargement du modèle
class ControllerUtilisateur {
    public static function readAll() {
        $tab_v = ModelUtilisateur::getAllUtilisateurs();     //appel au modèle pour gerer la BD
        $controller='utilisateur';
        $view='list';
        $pagetitle='Liste des utilisateurs';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function read(){
    	$id = $_GET['idUtilisateur'];
    	$v = ModelUtilisateur::getUtilByID($id);//appel au modèle pour gerer la BD
        $controller='utilisateur';
    	if($v == false){
            $view = 'error';
            $pagetitle = 'Utilisateur  inconnu';
    		require ('../view/utilisateur/view.php');//redirige vers la vue de produit non reconnu 
    	}else{
            $view = 'detail';
            $pagetitle = 'Détail de l\'utilisateur';    
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);  //"redirige" vers la vue
    	}
    } 
    public static function create(){
        $view = 'create';
        $pagetitle  = 'Creation dun utilisateur';
        $controller = 'utilisateur';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    //création générale d'un util -> on différencie prof et etudiant avec les permissions
    public static function created(){
    	$idUtilisateur = $_POST['idUtilisateur'];
    	$password = $_POST['password'];
    	$permission = $_POST['permission'];
    	$utilisateur = new ModelUtilisateur($idUtilisateur,$password,$permission);
    	$utilisateur->save();
    	ControllerUtilisateur::readAll();
        $controller = 'utilisateur';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
        require_once '../view/utilisateur/list.php';
    }
}
?>