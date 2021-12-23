<?php
require_once ('../model/ModelEtudiant.php'); // chargement du modèle
require_once ('../model/ModelModule.php');
require_once('../model/ModelAggreg.php');
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
        $tab = ModelAgreg::getAllAgreg();
        $tab_Aggreg = array(

        );
        foreach($tab as $ag){
            //var_dump($ag);
            array_push($tab_Aggreg,$ag->getIdAgregation());
        }
        //var_dump($tab_Aggreg);        
        //die();
        $tab_v = ModelEtudiant::getAllEtudiants();     //appel au modèle pour gerer la BD//méthode et modele à implémenter 
        foreach($tab_v as $value){
            echo "<br>" .'Nom : ' . $value->getNomEtudiant(); 
            
            foreach($tab_Aggreg as $Aggreg){//au sein de l'étudiant on boucle sur toutes les aggregs
                //appel de fonction qui retourne faux si travaille avec aggreg d'aggreg
                //var_dump($Aggreg);
                $moyenne = 0;
                $cpt = 0;
                $tab_listeModules = ModelModule::getAggregbyID($Aggreg);
                //var_dump($tab_listeModules);
                //si on est avec des aggregs d'aggreg
                if($tab_listeModules == false){
                    //appel au ModelAggreg : on appelle la méthode calculerNote(qui va nous donner la donne de chaque aggreg)
                    require_once('../model/ModelAggreg.php');
                    $note = ModelAgreg::calculerNote($Aggreg,$value);//calcul de la note de l'étudiant sur cet aggreg
                    var_dump($note);
                    $avis = ModelAgreg::produireAvis($Aggreg,$note);//méthode produisant un avis sur l'aggregation
                    echo $avis;//on affiche pour chaque aggreg l'avis de l'ordinateur 
                } 
                else{ 
                    foreach($tab_listeModules as $v){
                        $tab_notes = $v->getNoteBycodeNIP($value->getcodeNIP());
                        //var_dump($tab_notes);
                        $moyenne = $moyenne + $tab_notes;
                        //var_dump($moyenne);
                        $cpt = $cpt + 1;
                        //var_dump($cpt);
                    }
                    $moyenne = $moyenne/$cpt;//on divise le total de notes par le nombre de notes pour avoir la moyenne
                    var_dump($moyenne);
                    $avis = ModelAgreg::produireAvis($Aggreg,$moyenne);//méthode produisant un avis sur l'aggregation
                    //var_dump($avis);
                    echo $avis;//on affiche pour chaque aggreg l'avis de l'ordinateur 
                }         
            }
                
        }
        $controller='etudiant';
        $view='list';
        $pagetitle='Liste des étudiants';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
        echo '<a href="exporter.php">Exporter les avis</a>';    

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
}
?>