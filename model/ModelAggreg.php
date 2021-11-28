<?php

class ModelAgreg{
    private $idAgregation;
    private $nom;
    private $coeff;


    public function getIdAgregation(){
        return $this->idAgregation;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getCoeff(){
        return $this->coeff;
    }

    public function setCoeff($coeff){
        $this->coeff = $coeff;
    }

    public static function getAllAgreg(){
        require_once('Model.php');
        try{
            $rep = Model::getPDO()->query('SELECT * FROM NOTES_AGREGER');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelAgreg');
            $tab_Agreg = $rep->fetchAll();      
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        return $tab_Agreg;
    }

    public static function getModules($idAggreg){
        //var_dump($idAggreg);
        $id = $idAggreg[0];
        //var_dump($id);
        require_once "Model.php";
        $sql = "SELECT idModule from projets3_listemoduleagreger WHERE idAgregation='{$id}'";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);
            // On donne les valeurs et on exécute la requête     
            $req_prep->execute();
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModule');
            $tab_module = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_module))
            return false;
        return $tab_module;
    }

    public static function getAgregByID($id){
        require_once "Model.php";
            $sql = "SELECT * from NOTES_AGREGER WHERE idAgregation=:nom_tag";
            // Préparation de la requête
            try{
                $req_prep = Model::getPDO()->prepare($sql);

                $values = array(
                    "nom_tag" => $id,
                    //nomdutag => valeur, ...
                );
                // On donne les valeurs et on exécute la requête     
                $req_prep->execute($values);

                // On récupère les résultats comme précédemment
                $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAgreg');
                $tab_agreg = $req_prep->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_agreg))
                return false;
            return $tab_agreg[0];
        
    }

    public function __construct($idAgregation = NULL, $nom = NULL, $coeff = NULL) {
        if(!is_null($idAgregation)&& !is_null($nom)&& !is_null($coeff)){
            $this->idAgregation = $idAgregation;
            $this->nom = $nom;
            $this->coeff = $coeff;
        }
    }

    public  function save(){
        require_once 'Model.php';
        //'". str_replace( "'", "''", $s ) ."' 
        $sql = "INSERT INTO p_NOTES_AGREGER VALUES('$this->idAgregation','$this->nom','$this->coeff')";
        //echo $sql;
        //die();
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "idAgregation" => $this->idAgregation,
                "nom" => $this->nom,
                "coeff" => $this->coeff,
            //nomdutag => valeur, ...
            );

            $req_prep->execute($values);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function calculerNoteV2($idAggreg,$codeNIP){
        require_once('Model.php');
        require_once('ModelModule.php');
        $moyenne = 0;
        $sql = "SELECT idAggregR FROM projets3_listemoduleagreger WHERE idAgregation=:nomtag AND idAggregR IS NOT NULL";
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nomtag" => $idAggreg,
            //nomdutag => valeur, ...
            );

            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAggreg');//on récupère les Aggregs recyclés 
            $tab_idAggreg = $req_prep->fetchAll();
            $index = 0;
            //var_dump($tab_idAggreg);
            foreach($tab_idAggreg as $Aggreg){
                //ici il faut calculer la note de chaque Aggreg
                //donc il faut récupérer les modules contenus dans cette Aggreg
                //var_dump($tab_idAggreg);
                $tab_modules = self::getModules($Aggreg);//méthode à définir
                $note2 = 0;
                $cpt = 0;//compteur pour le nombre de notes dans l'aggreg
                $cpt2 = 0;
                $moyenneAggreg = 0;
                //var_dump($tab_modules);
                foreach($tab_modules as $module){
                    //ici il nous faut récupérer la note du module et incrémenter notre cpt
                    $valeur = (int) $module->getCoeff();//cast pour que ça soit un int
                    //var_dump($valeur);
                    //var_dump($note2);
                    //var_dump($module->getNoteBycodeNIP($codeNIP));
                    //var_dump($module);
                    $note2 = $note2 +$module->getNoteBycodeNIP($codeNIP)*$valeur;//Coeff personnalisable par Messaoui
                    $cpt2 = $cpt2 + $valeur;
                    //$cpt = $cpt +1;
                    //var_dump($cpt);
                }
                $moyenneAggreg = $moyenneAggreg + ($note2/$cpt2);
                //$moyenne = $moyenne + $moyenneAggreg;
                //var_dump($cpt);
                $tab_idAggreg[$index] = $moyenneAggreg;//comme ça on retourne direct la moyenne de l'aggreg
                $index++;
                $cpt++; 
            }
            //var_dump($cpt);
            foreach($tab_idAggreg as $note){
                //var_dump($note);
            }
            return $tab_idAggreg;//on retourne le tablo avec les notes 


        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function calculerNote($idAggreg, $numNIP){
        $codeEtud = $numNIP->getcodeNIP();
        //var_dump($codeEtud);
        require_once('Model.php');
        require_once('ModelModule.php');
        $moyenne = 0;
        $cpt = 0;
        $sql = "SELECT idModule FROM projets3_listemoduleagreger WHERE idAgregation=:nom_tag AND idModule IS NOT NULL";
        
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $idAggreg,
            //nomdutag => valeur, ...
            );
            

            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModule');//on récupère des modules
            $tab_idmodul = $req_prep->fetchAll();//tablo de modules
            //var_dump($tab_idmodul);
            if(!empty($tab_idmodul)){//si on a au moins 1 module
                $index = 0;
                foreach($tab_idmodul as $module){//on boucle sur cette liste de module et on récup les notes
                    //var_dump($tab_idmodul); 
                    $moyenne = $moyenne + $tab_idmodul[$index]->getNoteBycodeNIP($codeEtud)*$tab_idmodul[$index]->getCoeff();
                    //var_dump($moyenne);
                    $cpt = $cpt + $tab_idmodul[$index]->getCoeff();
                    $index++;
                }
            }
            //si c'est une Aggreg d'aggreg
            //var_dump($idAggreg);
            //var_dump($codeEtud);
            $tab_noteA = self::calculerNoteV2($idAggreg,$codeEtud);//méthode où on est sûr que $Aggreg contient des aggregs
            $moyenneFinale =0;
            $cptFinal = 0;
            foreach($tab_noteA as $note){
                $moyenneFinale = $moyenneFinale + $note;
                $cptFinal = $cptFinal+ 1;//il faudra prendre en compte les coeffs mais à faire plus tard
            }
            $noteAggregFinale = $moyenneFinale/$cptFinal;
            if($cpt!=null){
                $noteM = $moyenne/$cpt;
                return ($noteM + $noteAggregFinale)/2;
            }
            return $noteAggregFinale;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        } 
        
    }
    /*public function sommeCoeffAggreg($idAggreg){
        require_once('Model.php');
        require_once('ModelModule.php');
        $cpt = 0;
        $sql = "SELECT coeff FROM projets3_notes_agreger WHERE idAgregation IN (SELECT idAggregR FROM projets3_listemoduleagreger WHERE idAgregation:=nomtag)";
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nomtag" => $idAggreg,
            //nomdutag => valeur, ...
            );

            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'INT');//on récupère des entiers 
            $tab_coeffs = $req_prep->fetchAll();
            foreach($tab_coeffs as $coeff){//on boucle sur le tablo de tous les coeffs 
                $cpt = $cpt + $coeff;//on somme les coeffs
            }
            return $cpt;//on retourne cette somme
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }*/
}
?>