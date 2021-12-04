<?php

class Model{
	private static $pdo = NULL;

	

	public static function init(){
		$model_path_array = array('config/Conf.php');
		require_once File::build_Path($model_path_array); // chargement du modèle//TODO : utiliser le filepath pour portabilité
		$host = Conf::getHostname();
		$dbname = Conf::getDatabase();
		$login = Conf::getLogin();
		$password = Conf::getPassword();
		try{
		  self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $login, $password,
                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		  self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		  if (Conf::getDebug()) {
		    echo $e->getMessage(); // affiche un message d'erreur
		  } else {
		    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
		  }
		  die();
        }

	}

	public static function getPDO(){
		if(is_null(self::$pdo)){
			self::init();
		}
		return self::$pdo;

	}

}