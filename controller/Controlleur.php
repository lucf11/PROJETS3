<?php

require_once '../model/Model.php';

class Controlleur{
    public static function readAll(){
        require('../view/list.php');
    }

    public static function read(){
        require('../view/detail.php');
    }
}
?>