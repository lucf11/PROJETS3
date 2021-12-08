<?php
$model_path_array = array('model/ModelAggreg.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
$model_path_array = array('model/ModelModule.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
// require_once ('../model/ModelAggreg.php'); // chargement du modèle

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
        $tab_agreg = ModelAggreg::getAllAgreg();
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    //création générale d'un util -> on différencie prof et etudiant avec les permissions
    public static function created(){
    	$nom = $_POST['nom'];
    	$coeff = $_POST['coeff'];
        $idAgreg = $_POST['idAgregation'];
    	$agregation = new ModelAggreg($idAgreg,$nom,$coeff);
        // $agregation->setCoeff($coeff);
        // $agregation->setNom($nom);
    	$agregation->save();
        $id = "SELECT idAgregation FROM projetS3_NOTES_AGREGER ORDER BY idAgregation DESC LIMIT 1";
        try{
            $req_prep1 = Model::getPDO()->prepare($id);
            $req_prep1->execute();
            $req_prep1->setFetchMode(PDO::FETCH_CLASS, 'int');
            $idAgregation = $req_prep1->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    
        if(!empty($_POST['module'])){

            foreach($_POST['module'] as $value){
                $insertListe = "INSERT INTO projetS3_ListeModuleAgreger VALUES('{$idAgregation[0][0]}','{$value}')";
                //echo $sql;
                //die();
                // Préparation de la requête
                try{
                    $req_prep = Model::getPDO()->prepare($insertListe);
                    $req_prep->execute();
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
        if(!empty($_POST['agreg'])){

            foreach($_POST['agreg'] as $v){
                $insListe = "INSERT INTO projetS3_ListeModuleAgreger VALUES('{$idAgregation[0][0]}','{$v}')";
                //echo $sql;
                //die();
                // Préparation de la requête
                try{
                    $req_prep2 = Model::getPDO()->prepare($insListe);
                    $req_prep2->execute();
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
        ControllerAgreg::readAll();
    }
}


?>