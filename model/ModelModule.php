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
        $sql = "SELECT * from p_Module WHERE idModule=:nom_tag";
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
    public static function getAggregbyID($idAggreg){
        require_once "Model.php";
        $sql = "SELECT idModule from p_ListeModuleAggrege WHERE idAggreg=:nom_tag";
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