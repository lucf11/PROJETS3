<?php

class ModelCategorie{
    private $nomCate;
    private $palierBas;
    private $palierMoyen;
    private $palierHaut;

    public function getnomCate(){
        return $this->nomCate;
    }

    public function getpalierBas(){
        return $this->palierBas;
    }

    public function getpalierHaut(){
        return $this->palierHaut;
    }

    public function getpalierMoyen(){
        return $this->palierMoyen;
    }

    public function setPalier($bas,$moyen,$haut){
        $this->palierBas = $bas;
        $this->palierMoyen = $moyen;
        $this->palierHaut= $haut;
    }

    public function __construct($nom = NULL, $palierB = NULL, $palierM = NULL, $palierH = NULL) {
        if(!is_null($nom)&& !is_null($palierB)&& !is_null($palierM) && !is_null($palierH)){
            $this->nomCate = $nom;
            $this->palierBas = $palierB;
            $this->palierMoyen = $palierM;
            $this->palierHaut = $palierH;
        }
    }

    public static function getCategorieByID($nom){
        require_once "Model.php";
            $sql = "SELECT * from categorie WHERE nomCate=:nom_tag";
            // Préparation de la requête
            try{
                $req_prep = Model::getPDO()->prepare($sql);

                $values = array(
                    "nom_tag" => $nom,
                    //nomdutag => valeur, ...
                );
                // On donne les valeurs et on exécute la requête     
                $req_prep->execute($values);

                // On récupère les résultats comme précédemment
                $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCategorie');
                $tab_agreg = $req_prep->fetchAll();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_agreg))
                return false;
            return $tab_agreg[0];
        
    }

    public function delete(){
        require_once "Model.php";
        //var_dump($this->nomCate);
        $sql = "DELETE FROM categorie WHERE nomCate='{$this->nomCate}'";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            // On donne les valeurs et on exécute la requête     
            $req_prep->execute();

            // On récupère les résultats comme précédemment
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public function update($palierB,$palierM,$palierH){
        require_once "Model.php";
        $sql = "UPDATE categorie SET palierBas=nom_tag , palierMoyen=nom__tag , palierHaut=nom___tag WHERE nomCate={$this->nomCate}";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $palierB,
                "nom__tag" => $palierM,
                "nom___tag" => $palierH,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête     
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public  function save(){
        require_once 'Model.php'; 
        $sql = "INSERT INTO categorie VALUES('{$this->nomCate}','{$this->palierBas}','{$this->palierMoyen}','{$this->palierHaut}')";
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nomCate" => $this->nomCate,
                "palierbas" => $this->palierBas,
                "palierMoyen" => $this->palierMoyen,
                "palierHaut" => $this->palierHaut
            //nomdutag => valeur, ...
            );

            $req_prep->execute($values);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getAllCate(){
        require_once('Model.php');
        try{
            $rep = Model::getPDO()->query('SELECT * FROM categorie');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCategorie');
            $tab_Agreg = $rep->fetchAll();      
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        return $tab_Agreg;
    }
}
?>