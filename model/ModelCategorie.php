<?php 

class ModelCategorie{
    private $nomCate;
    private $palierbas;
    private $palierHaut;
    private $palierMoyen;

    public function getNomCate(){
        return $this->nomCate;
    }

    public function setNomCate($nomCate){
        $this->nomCate = $nomCate;
    }
    public function setPalierBas($palierBas){
        $this->palierBas = $palierBas;
    }
    public function setPalierHaut($palierHaut){
        $this->palierHaut = $palierHaut;
    }
    public function setPalierMoyen($palierMoyen){
        $this->palierMoyen = $palierMoyen;
    }

    public static function getAllNomCate(){
       
        require_once "Model.php";
        $sql = "SELECT nomCate from categorie";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);
            // On donne les valeurs et on exécute la requête     
            $req_prep->execute();
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCategorie');
            $tab_cate = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_cate))
            return false;
        return $tab_cate;
    }
    public static function getAllCate(){
       
        require_once "Model.php";
        $sql = "SELECT * from categorie";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);
            // On donne les valeurs et on exécute la requête     
            $req_prep->execute();
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCategorie');
            $tab_cate = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_cate))
            return false;
        return $tab_cate;
    }

}

?>