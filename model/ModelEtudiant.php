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

public function getNumeroNIP() {
    return $this->numeroNIP;
}

public function getIdDossier() {
    return $this->idDossier;
}

public function getNomEtudiant() {
    return $this->nomEtudiant;
}

public function getRangIUT() {
    return $this->rangIUT;
}

public function getBaccalaureat() {
    return $this->baccalaureat;
}
public function getClassementGlobale() {
    return $this->classementGlobale;
}
public function getMoyenneGlobale() {
    return $this->moyenneGlobale;
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

public static function getEtudiantByNIP($nip){
     require_once "Model.php";
        $sql = "SELECT * from projetS3_Etudiant WHERE numeroNIP=:nom_tag";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nom_tag" => $nip,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête     
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelEtudiant');
            $tab_etud = $req_prep->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_etud))
            return false;
        return $tab_etud[0];
    
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