<?php

session_start();

$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__;
require_once ($ROOT_FOLDER . $DS . "lib" . $DS . "File.php");
// require_once(File::build_path(array("routeur.php")));
require_once('controller/routeur.php');
?>


