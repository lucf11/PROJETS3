<?php
require_once ('../model/ModelEtudiant.php'); // chargement du modèle
class ControllerEtudiant {
    public static function readAll() {
        $tab_v = ModelEtudiant::getAllEtudiants();     //appel au modèle pour gerer la BD
        $controller='etudiant';
        $view='list';
        $pagetitle='Liste des étudiants';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function readAllAgreg(){
        $idAggreg = $_POST['idAggreg']
        $tab_v = ModelEtudiant::getAllEtudiants();     //appel au modèle pour gerer la BD
        $tab_listeModules = ModelModule::getAggregbyID($idAggreg);//méthode et modele à implémenter 
        foreach($tab_v as $value){
            $moyenne = 0;
            $cpt = 0;
            foreach($tab_listeModules as $v){
                $moyenne = $moyenne + $value->getNotebyModule($v);//méthode à implémenter 
                $cpt = $cpt +1;
            }
            $moyenne = $moyenne/$cpt;//on divise le total de notes par le nombre de notes pour avoir la moyenne
            $value->setMoyenneAggreg($moyenne);//méthode à implémenter aussi dans l'étudiant 
        } 
        $controller='etudiant';
        $view='list';
        $pagetitle='Liste des étudiants';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function read(){
    	$numEtud = $_GET['codeNIP'];
    	$v = ModelProduit::getEtudiantByNIP($numEtud);//appel au modèle pour gerer la BD
        $controller='etudiant';
    	if($v == false){
            $view = 'error';
            $pagetitle = 'Etudiant  inconnu';
    		require ('../view/etudiant/view.php');//redirige vers la vue de produit non reconnu 
    	}else{
            $view = 'detail';
            $pagetitle = 'Détail de l''etudiant';    
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);  //"redirige" vers la vue
    	}
    } 
    public static function create(){
        $view = 'create';
        $pagetitle  = 'Creation dun etudiant';
        $controller = 'etudiant';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    //à faire pour la prochaine foismn
    public static function created(){
    	$idUtilisateur = $_POST['idUtilisateur'];
    	$login = $_POST['login'];
    	$password = $_POST['password'];
    	$permission = $_POST['permission'];
    	$etudiant = new ModelEtudiant($idUtilisateur,$login,$password,$permission);
    	$etudiant->save();
    	ControllerEtudiant::readAll();
        $controller = 'etudiant';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
        require_once '../view/produit/list.php';
    }
}
?>