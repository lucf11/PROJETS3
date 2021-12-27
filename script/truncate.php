<?php
  include("db_connect.php");

  
     mysqli_query($conn,"TRUNCATE TABLE projets3_notemodule");
     mysqli_query($conn,"TRUNCATE TABLE projets3_noteue");
     mysqli_query($conn,"TRUNCATE TABLE projets3_semestreetud");
     mysqli_query($conn,"TRUNCATE TABLE projets3_dossier");
     mysqli_query($conn,"TRUNCATE TABLE projets3_etudiant");
     mysqli_query($conn,"TRUNCATE TABLE projets3_module");
     mysqli_query($conn,"TRUNCATE TABLE projets3_ue");
     

     header('Location: import.php');

?>