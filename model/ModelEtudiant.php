<?php

class ModelEtudiant{

    private $numeroNIP;
    private $idDossier;
    private $nomEtudiant;
    private $rangIUT;
    private $baccalaureat;
    private $classementGlobale;
    private $moyenneGlobale;
    
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

public function __construct($numeroNIP = NULL, $idDossier = NULL, $nomEtudiant = NULL , $rangIUT=NULL,$baccalaureat=NULL, $classementGlobale=NULL, $moyenneGlobale=NULL) {
    if(!is_null($numeroNIP)&& !is_null($idDossier)&& !is_null($nomEtudiant) && !is_null($rangIUT) && !is_null($baccalaureat) && !is_null($classementGlobale) && !is_null($moyenneGlobale)){
        $this->numeroNIP = $numeroNIP;
        $this->idDossier = $idDossier;
        $this->nomEtudiant= $nomEtudiant;
        $this->rangIUT = $rangIUT;
        $this->baccalaureat = $baccalaureat;
        $this->classementGlobale = $classementGlobale;
        $this->moyenneGlobale = $moyenneGlobale;
    }
}



?>