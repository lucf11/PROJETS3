<?php

class ModelEtudiant{

    private $nomEtudiant;
    private $numINE;
    private $
    
}

public static function getAllEtudiants(){
    require_once('Model.php');
    try{
        $rep = Model::getPDO()->query('SELECT * FROM Etudiant');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelEtudiant');
        $tab_Etud = $rep->fetchAll();      
    }
    catch(PDOException $e){
           echo $e->getMessage();
    }
    return $tab_Etud;
}

?>