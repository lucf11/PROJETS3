<?php

$model_path_array = array('model/ModelEtudiant.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
$model_path_array = array('model/ModelModule.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
class ControllerEtudiant {
    public static function readAll() {
        $tab_v = ModelEtudiant::getAllEtudiants();     //appel au modèle pour gerer la BD
        $controller='etudiant';
        $view='list';
        $pagetitle='Liste des étudiants';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    public static function readAllAggreg(){
        $idAggreg = $_GET['idAggreg'];
        $tab_v = ModelEtudiant::getAllEtudiants();     //appel au modèle pour gerer la BD
        $tab_listeModules = ModelModule::getAggregbyID($idAggreg);//méthode et modele à implémenter 
        foreach($tab_v as $value){
            $moyenne = 0;
            $cpt = 0;
            foreach($tab_listeModules as $v){
                $tab_notes = $v->getNoteBycodeNIP($value->getcodeNIP(),$value->getcodeNIP());
                //var_dump($tab_notes[0]);
                $moyenne = $moyenne + $tab_notes[0];
                $cpt = $cpt + 1;
            }
            $moyenne = $moyenne/$cpt;//on divise le total de notes par le nombre de notes pour avoir la moyenne
            $value->setMoyenneAggreg($moyenne);//méthode à implémenter aussi dans l'étudiant
            var_dump($value->getMoyenneAggreg()); 
        } 
        $controller='etudiant';
        $view='list';
        $pagetitle='Liste des étudiants';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
    public static function read(){
    	$numEtud = $_GET['codeNIP'];
    	$v = ModelEtudiant::getEtudiantByNIP($numEtud);//appel au modèle pour gerer la BD
        $controller='etudiant';
    	if($v == false){
            $view = 'error';
            $pagetitle = 'Etudiant  inconnu';
    		require ('../view/etudiant/view.php');//redirige vers la vue de produit non reconnu 
    	}else{
            $view = 'detail';
            $pagetitle = 'Détail de l\'etudiant';    
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);  //"redirige" vers la vue
    	}
    } 
    //il n'y aura pas de create et created() pour le controllerEtudiant mais pour le contollerUtilisateur -> on généralise le tout -

    public static function donnerAvis(){
        $numEtud = $_GET['codeNIP'];
    	$v = ModelEtudiant::getEtudiantByNIP($numEtud);//appel au modèle pour gerer la BD
        $view = 'avis';
        $controller='etudiant';
        $pagetitle = 'Avis sur l\'etudiant';    
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue

    }
}
?>