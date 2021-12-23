<?php
require_once ('../model/ModelCategorie.php'); // chargement du modèle
require_once('../lib/File.php');

class ControllerCategorie {
    public static function create(){
        $view = 'create';
        $pagetitle  = 'Creation d\'une catégorie de poursuites d\'études';
        $controller = 'categorie';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    public static function created(){
    	$nomCate = $_POST['nomCate'];
    	$palierBas = $_POST['palierBas'];
    	$palierMoyen = $_POST['palierMoyen'];
        $palierHaut = $_POST['palierHaut'];
        /*var_dump($nomCate);
        var_dump($palierBas);
        var_dump($palierMoyen);
        var_dump($palierHaut);
        die();*/
    	$cate = new ModelCategorie($nomCate,$palierBas,$palierMoyen,$palierHaut);
    	$cate->save();
    	ControllerCategorie::readAll();
        $controller = 'categorie';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }

    public static function update(){ // Mise a jour d'un utilisateur
        $cate=$_GET['nomCate'];
        $categorie = ModelCategorie::getCategorieByID($cate);
        if ($categorie === false){
            $view = 'error';
            $pagetitle = "Erreur de formulaire";
            $controller = 'categorie';
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);
        } else {
            $view = 'update';
            $pagetitle = "Modif d'une catégorie";
            $controller = 'categorie';
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);
        }
    }

    public static function updated(){ // On a mis a jour un utilisateur
        $cate = $_POST['nomCate'];
        $categorie = ModelCategorie::getCategorieByID($cate);
        $palierBas = $_POST['palierBas'];
        $palierMoyen = $_POST['palierMoyen'];
        $palierHaut = $_POST['palierHaut'];
        $categorie->update($palierBas,$palierMoyen,$palierHaut);
        if ($test === false){
            $view = 'error';
            $pagetitle = "Erreur modification de la catégorie";
            $controller = 'categorie';
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);

        } else {
            $view = 'updated';
            $pagetitle = 'catégorie modifiée';
            $controller = 'categorie';
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);
            
        }
    }

    public static function read(){
    	$cate = $_GET['nomCate'];
    	$v = ModelCategorie::getCategorieByID($cate);//appel au modèle pour gerer la BD
        $controller='categorie';
    	if($v == false){
            echo 'caca';
            $view = 'error';
            $pagetitle = 'Catégorie  inconnue';
    		require ('../view/categorie/view.php');//redirige vers la vue de produit non reconnu 
    	}else{
            $view = 'detail';
            $pagetitle = 'Détail de la catégorie';    
            $filepath = File::build_path(array("view",$controller, "view.php"));
            require ($filepath);  //"redirige" vers la vue
    	}
    }
    public static function delete(){
        $cate = $_GET['nomCate'];
        $v = ModelCategorie::getCategorieByID($cate);
        $v->delete();
        echo "Suppression réussie";
        self::readAll();

    }
    public static function readAll() {
        $tab_v = ModelCategorie::getAllCate();     //appel au modèle pour gerer la BD
        $controller='categorie';
        $view='list';
        $pagetitle='Liste des catégories';
        $filepath = File::build_path(array("view",$controller, "view.php"));
        require ($filepath);  //"redirige" vers la vue
    }
    public  function save(){
        require_once 'Model.php';
        $sql = "INSERT INTO categorie VALUES('$this->nomCate','$this->palierBas','$this->palierMoyen','$this->palierHaut')";
        // Préparation de la requête
        try{
            $req_prep = Model::getPDO()->prepare($sql);

            $values = array(
                "nomCate" => $this->nomCate,
                "palierBas" => $this->palierBas,
                "palierMoyen" => $this->palierMoyen,
                "palierHaut" => $this->palierHaut
            //nomdutag => valeur, ...
            );

            $req_prep->execute($values);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>