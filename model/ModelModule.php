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
    public function getcoefModule(){
        return $this->coefModule;
    }
    public static function getModulebyID($id) {
        require_once "Model.php";
        $sql = "SELECT * from Module WHERE idModule=:nom_tag";
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
            $rep = Model::getPDO()->query('SELECT * FROM Modules');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'modelModule');
            $tab_mods = $rep->fetchAll();      
        }
        catch(PDOException $e){
           echo $e->getMessage();
        }
        return $tab_mods;
    }
    public function getNoteBycodeNIP($id){
        require_once "Model.php";
        //var_dump($this->idModule);
        //var_dump($id);
        $sql = "SELECT noteModule from notemodule WHERE codeNIP=:nom_tag AND idModule='{$this->idModule}'";//sélection de la note de l'étudiant sur le module correspondant
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
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_mod))
            return false;
        return $tab_mod[0];//on retourne la liste de tous les modules qui sont dans l'idAggreg passsé en param
    }
    
    public static function getAggregbyID($idAggreg){
        require_once "Model.php";
        $sql = "SELECT idModule from listemodulesaggreg WHERE idAggreg=:nom_tag";
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
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_mod))
            return false;
        return $tab_mod;//on retourne la liste de tous les modules qui sont dans l'idAggreg passsé en param
    }

}
?>