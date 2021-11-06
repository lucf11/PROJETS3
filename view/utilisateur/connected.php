<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $mdp = $_POST['mdp'];
    require_once('/model/Model.php');
    
    $sql =Model::getPDO()->query("SELECT * FROM Utilisateur WHERE idUtilisateur='$id' and password='$mdp' ");
    $sql = $sql->fetch();

    $valid = true;
    if(!$sql['login']){
        $valid = false;
    }
    $result = $db->prepare($sql);
    $result->execute();

    echo "Bonjour $id vous êtes bien connecté";
}

?>