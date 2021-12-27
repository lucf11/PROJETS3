<?php
  include("db_connect.php");
  


  if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
      
      $file = fopen($fileName, "r");

//Parcours du csv et prise de donnée dans le csv 

      $cpt = 0;
      $test = 'i11';
    

      while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {


       //Stockage dans variable 
       if ($cpt==0) {
        $var1 = $column[6];
        $var2 = $column[13];
        //importation module UE 11
        $var4 = $column[7];
        $var5 = $column[8];
        $var6 = $column[9];
        $var7 = $column[10];
        $var8 = $column[11];
        $var9 = $column[12];

        //importation module UE 32

        $var10 =$column[14];
        $var11 =$column[15];
        $var12=$column[16];
        $var13=$column[17];
        $var14=$column[18];
        $var15=$column[19];
        $var16=$column[20];

        //importation module UE 33

       }

       //nom des modules 

       $nom_var1 = "Introduction aux systèmes informatiques";
       $nom_var2 = "Introduction à l'algorithmique et à la programmation";
       $nom_var3 = "Structures de données et algorithmes fondamentaux";
       $nom_var4 = "Introduction aux bases de données";
       $nom_var5 = "Conception de documents et d’interfaces numériques";
       $nom_var6 = "Projet tutoré – Découverte";
       $nom_var7 = "Mathématiques discrètes";
       $nom_var8 = "Algèbre linéaire";
       $nom_var9 = "Environnement économique";
       $nom_var10 = "Fonctionnement des organisations";
       $nom_var11 = "Expression-Communication – Fondamentaux de la communication";
       $nom_var12 = "Anglais et Informatique";
       $nom_var13 = "PPP - Connaître le monde professionnel";
       
       


       

       
    

       if($cpt>=1){
        mysqli_query($conn,"INSERT INTO projets3_dossier(idDossier) values('".'d'.$column[29]."')");
        mysqli_query($conn,"INSERT INTO projets3_etudiant(idDossier,nomEtudiant,baccalaureat,codeNIP,moyenneGlobale) values('".'d'.$column[29]."','" . $column[1] . "','" . $column[2] . "','" . $column[29]."','" .$column[4] . "')");
        mysqli_query($conn,"INSERT into projets3_semestreetud (idSemestre, codeNIP, moyenne,groupe,rangGroupe,rangGlobal,bonusSport,bonusLangue,assiduite)
        values ('" .$column[29]."1" . "','" .$column[29] . "','" .$column[4] . "','" .$column[3] . "','" . $column[5] . "','" . $column[0] . "','" .$column[22] . "','" . $column[23] . "','" . $column[24] . "')");

        //importation note module 1er UE

        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var4 . "','" .$column[29] . "','" . $column[7] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var5 . "','" .$column[29] . "','" . $column[8] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var6 . "','" .$column[29] . "','" . $column[9] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var7 . "','" .$column[29] . "','" . $column[10] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var8 . "','" .$column[29] . "','" . $column[11] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var9 . "','" .$column[29] . "','" . $column[12] . "')");

        // importation notes module UE 32

        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var10 . "','" .$column[29] . "','" . $column[14] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var11 . "','" .$column[29] . "','" . $column[15] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var12 . "','" .$column[29] . "','" . $column[16] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var13 . "','" .$column[29] . "','" . $column[17] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var14 . "','" .$column[29] . "','" . $column[18] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var15 . "','" .$column[29] . "','" . $column[19] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var16 . "','" .$column[29] . "','" . $column[20] . "')");

        // importation notes UE 

        mysqli_query($conn,"INSERT into projets3_noteue(idUE,codeNIP,noteUE)
        values ('" .$var1 . "','" .$column[29] . "','" . $column[6] . "')");
        mysqli_query($conn,"INSERT into projets3_noteue(idUE,codeNIP,noteUE)
        values ('" .$var2 . "','" .$column[29] . "','" . $column[13] . "')");
       



        /*
        $sql5 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3102' . "','" . $column[32] . "','" . $column[8] . "')";
        $sql6 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3103' . "','" . $column[32] . "','" . $column[9] . "')";
        $sql7 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3104' . "','" . $column[32] . "','" . $column[10] . "')";
        $sql8 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3105' . "','" . $column[32] . "','" . $column[11] . "')";
        $sql9 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3106' . "','" . $column[32] . "','" . $column[12] . "')";
        $sql10 = "INSERT into projets3_notemodule(idModule,codeNIP,note) 
        values ('" .'M3201' . "','" . $column[32] . "','" . $column[14] . "')";
        $sql11 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3202' . "','" . $column[32] . "','" . $column[15] . "')";
        $sql12 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3203' . "','" . $column[32] . "','" . $column[16] . "')";
        $sql13 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3204' . "','" . $column[32] . "','" . $column[17] . "')";
        $sql14 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3205' . "','" . $column[32] . "','" . $column[18] . "')";
        $sql15 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3206' . "','" . $column[32] . "','" . $column[19] . "')";
        $sql17 = "INSERT into projets3_noteUE(idUE,codeNIP,noteUE)
        values ('" .'UE31' . "','" . $column[32] . "','" . $column[6] . "')";
        $sql18 = "INSERT into projets3_noteUE(idUE,codeNIP,noteUE)
        values ('" .'UE32' . "','" . $column[32] . "','" . $column[13] . "')";
        $sql19 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3301' . "','" . $column[32] . "','" . $column[21] . "')";
        $sql20 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3302' . "','" . $column[32] . "','" . $column[22] . "')";
        $sql21 = "INSERT into projets3_notemodule(idModule,codeNIP,note)
        values ('" .'M3303' . "','" . $column[32] . "','" . $column[23] . "')";
        */

        $cpt++;
        
       }
       else{
        //$result = mysqli_query($conn,$sql);
        //mysqli_query($conn,$sql);

        // importer dans la base de donnée tout les id de Module 

       mysqli_query($conn, "INSERT into projets3_ue(idUE,nomUE) values('".$column[6] . "','" .$column[6] . "')");
       mysqli_query($conn, "INSERT into projets3_ue(idUE,nomUE) values('".$column[13] . "','" .$column[13] . "')");
       //importation module UE 31
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[7] . "','" .$nom_var1 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[8] . "','" .$nom_var2 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[9] . "','" .$nom_var3 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[10] . "','" .$nom_var4 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[11] . "','" .$nom_var5 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[12] . "','" .$nom_var6 . "')");

       //importation module UE 12

       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[14] . "','" .$nom_var7 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[15] . "','" .$nom_var8 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[16] . "','" .$nom_var9 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[17] . "','" .$nom_var10 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[18] . "','" .$nom_var11 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[19] . "','" .$nom_var12 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[19] . "','" .$nom_var13 . "')");

      
        $cpt++;
       }  



        
        
        


      }  
    }
  }
  header('Location: import.php');
  exit;
?>



//,'" . $column[32] . "','" . $column[8] . "')");