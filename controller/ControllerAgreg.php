<?php
$model_path_array = array('model/ModelAggreg.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
$model_path_array = array('model/ModelModule.php');
require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
// require_once ('../model/ModelAggreg.php'); // chargement du modèle
$model_path_array = array('model/ModelCategorie.php');
require_once File::build_Path($model_path_array);

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
        $tab_cate = ModelCategorie::getAllCate();
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    //création générale d'un util -> on différencie prof et etudiant avec les permissions
    public static function created(){
    	$nom = $_POST['nom'];
    	$coeff = $_POST['coeff'];
        $cate = $_POST['cate'];
        // $idAgreg = $_POST['idAgregation'];
    	$agregation = new ModelAggreg();
        $agregation->setCoeff($coeff);
        $agregation->setCate($cate);
        $agregation->setNom($nom);
    	$agregation->save();
        // $id = "SELECT idAgregation FROM projets3_notes_agreger ORDER BY idAgregation DESC LIMIT 1";
        $id = "SELECT MAX(idAgregation) FROM projets3_notes_agreger";
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
                $insertListe = "INSERT INTO projets3_listemoduleagreger VALUES('{$idAgregation[0][0]}','{$value}','0')";
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
                $insListe = "INSERT INTO projets3_listemoduleagreger VALUES('{$idAgregation[0][0]}',NULL,'{$v}')";
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
    public static function delete(){
        
    }
}


?>