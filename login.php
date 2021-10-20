<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $mdp = $_POST['mdp'];

    $db = new PDO('mysql:host=$hostname;dbname=$database_name','root','');

    $sql = "SELECT * FROM Utilisateur WHERE login='$id' and password='$mdp ";
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