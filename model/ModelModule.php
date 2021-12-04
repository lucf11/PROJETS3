<?php

class ModelModule {


    private $idModule;
    private $nomModule;
    private $coefModule;

    // un getter      
    public function getidModule() {
        return $this->idModule;
    }

    // un setter 
    public function getnomModule() {
        return $this->nomModule;
    }
    public function getCoeff(){
        if($this->coefModule==null){//voir méthode calculerNoteV2 pour comprendre
            require_once "Model.php";
            $sql = "SELECT coefModule from projetS3_Module WHERE idModule='{$this->idModule}'";
            // Préparation de la requête
            try{
                $req_prep = Model::getPDO()->prepare($sql);
                // On donne les valeurs et on exécute la requête     
                $req_prep->execute();
                // On récupère les résultats comme précédemment
                $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAggreg');
                $coeff = $req_prep->fetchAll();
                return $coeff[0][0]; 
            }catch(PDOException $e){
                echo $e->getMessage();
            }   
        }
        return $this->coefModule;
    }
    public static function getModulebyID($id) {
        require_once "Model.php";
        $sql = "SELECT * from projetS3_Module WHERE idModule=:nom_tag";
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
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModule');
            $tab_mod = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_mod))
            return false;
        return $tab_mod[0];
    }
    public static function getAllModules(){
        require_once('Model.php');
        try{
            $rep = Model::getPDO()->query('SELECT * FROM projetS3_Module');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelModule');
            $tab_mods = $rep->fetchAll();      
        }
        catch(PDOException $e){
           echo $e->getMessage();
        }
        return $tab_mods;
    }
    public function getNoteBycodeNIP($id){
        //var_dump($id);
        require_once "Model.php";
        //var_dump($this->idModule);
        //var_dump($id);
        $sql = "SELECT noteModule from projetS3_NoteModule WHERE numNIP=:nom_tag AND idModule='{$this->idModule}'";//sélection de la note de l'étudiant sur le module correspondant
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
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'INT');
            $tab_mod = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, cela veut dire qu'on travaille avec des aggregs
        if (empty($tab_mod))
            return false;
        return (int)$tab_mod[0][0];//on retourne la liste de tous les modules qui sont dans l'idAggreg passsé en param
    }
    
    public static function getAggregbyID($idAggreg){
        require_once "Model.php";
        $sql = "SELECT idModule from projetS3_ListeModuleAgreger WHERE idAgregation=:nom_tag";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $idAggreg,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête     
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModule');
            $tab_mod = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo 'erreur';
        }
        // Attention, si un idModule est null -> ça veut dire qu'on est sur une aggreg d'aggreg
        foreach($tab_mod as $value){
            if($value->getidModule()==null){
                return false;
            }
        }
        return $tab_mod;//on retourne la liste de tous les modules qui sont dans l'idAggreg passsé en param
    }

}
?>