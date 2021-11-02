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
    public function __construct($idUtil = NULL, $pswd = NULL, $perm = NULL) {
        if(!is_null($idUtil)&& !is_null($pswd)&& !is_null($perm)){
            $this->idUtilisateur = $idUtil;
            $this->password = $pswd;
            $this->permission = $perm;
        }
    }
}
?>