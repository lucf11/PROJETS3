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
}
?>