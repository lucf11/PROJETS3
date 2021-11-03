<?php

class ModelUtilisateur {


    private $idUtilisateur;
    private $password;
    private $permission;

    

    //setter 
    public function setidUtilisateur($id) {
        $this->idUtilisateur = $id;
    }
    public function setPassword($pswd)
        $this->password = $pswd;
    }
    public function setPermission($p){
        $this->permission = $p;
    }
    public static function getAllUtilisateurs(){
        require_once('Model.php');
        try{
            $rep = Model::getPDO()->query('SELECT * FROM Utilisateur');
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $tab_Utils = $rep->fetchAll();      
        }
        catch(PDOException $e){
           echo $e->getMessage();
        }
        return $tab_Utils;
    }
    public static function getUtilbyID($id){
        require_once "Model.php";
        $sql = "SELECT * from p_Utilisateur WHERE idUtilisateur=:nom_tag";
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
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $tab_util = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_util))
            return false;
        return $tab_util[0];
    }
    public  function save(){
        require_once 'Model.php';
        //'". str_replace( "'", "''", $s ) ."' 
        $sql = "INSERT INTO p_Utilisateur VALUES('$this->idUtilisateur','$this->password','$this->permission')";
        //echo $sql;
        //die();
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "idUtilisateur" => $this->idUtilisateur,
                "login" => $this->password,
                "password" => $this->permission,
            //nomdutag => valeur, ...
            );

            $req_prep->execute($values);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function __construct($idUtil = NULL, $pswd = NULL, $perm = NULL) {
        if(!is_null($idUtil)&& !is_null($pswd)&& !is_null($perm)){
            $this->idUtilisateur = $idUtil;
            $this->password = $pswd;
            $this->permission = $perm;
        }
    }
}
?>