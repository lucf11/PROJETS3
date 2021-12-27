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
        $var3 = $column[20];
        //importation module UE 31
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

        //importation module UE 33

        $var16=$column[21];
        $var17=$column[22];
        $var18=$column[23];// code...
       }

       //nom des modules 

       $nom_var1 = "Principes des systèmes d'exploitation";
       $nom_var2 = "Services réseaux";
       $nom_var3 = "Algorithmique avancée";
       $nom_var4 = "Programmation Web côté serveur";
       $nom_var5 = "Conception et programmation objet avancées";
       $nom_var6 = "Bases de données avancées";
       $nom_var7 = "Probabilités et statistiques";
       $nom_var8 = "Modélisations mathématiques";
       $nom_var9 = "Droit des technologies de l’information et de la communication (TIC)";
       $nom_var10 = "Gestion des systèmes d'information";
       $nom_var11 = "Expression-Communication – Communication professionnelle";
       $nom_var12 = "Collaborer en anglais";
       $nom_var13 = "Méthodologie de la production d’applications";
       $nom_var14 = "Projet tutoré – Mise en situation professionnelle";
       $nom_var15 = "PPP – Préciser son projet";
       
       


       

       
    

       if($cpt>=1){
        mysqli_query($conn,"INSERT INTO projets3_dossier(idDossier) values('".'d'.$column[32]."')");
        mysqli_query($conn,"INSERT INTO projets3_etudiant(idDossier,nomEtudiant,baccalaureat,codeNIP,moyenneGlobale) values('".'d'.$column[32]."','" . $column[1] . "','" . $column[2] . "','" . $column[32]."','" .$column[4] . "')");
        mysqli_query($conn,"INSERT into projets3_semestreetud (idSemestre, codeNIP, moyenne,groupe,rangGroupe,rangGlobal,bonusSport,bonusLangue)
        values ('" .$column[32]."3" . "','" .$column[32] . "','" .$column[4] . "','" .$column[3] . "','" . $column[5] . "','" . $column[0] . "','" .$column[25] . "','" . $column[26] . "')");

        //importation note module 1er UE

        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var4 . "','" .$column[32] . "','" . $column[7] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var5 . "','" .$column[32] . "','" . $column[8] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var6 . "','" .$column[32] . "','" . $column[9] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var7 . "','" .$column[32] . "','" . $column[10] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var8 . "','" .$column[32] . "','" . $column[11] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var9 . "','" .$column[32] . "','" . $column[12] . "')");

        // importation notes module UE 32

        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var10 . "','" .$column[32] . "','" . $column[14] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var11 . "','" .$column[32] . "','" . $column[15] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var12 . "','" .$column[32] . "','" . $column[16] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var13 . "','" .$column[32] . "','" . $column[17] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var14 . "','" .$column[32] . "','" . $column[18] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var15 . "','" .$column[32] . "','" . $column[19] . "')");

        // importation notes module UE 33

        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var16 . "','" .$column[32] . "','" . $column[21] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var17 . "','" .$column[32] . "','" . $column[22] . "')");
        mysqli_query($conn,"INSERT into projets3_notemodule(idModule,codeNIP,notemodule)
        values ('" .$var18 . "','" .$column[32] . "','" . $column[23] . "')");

        // importation notes UE 

        mysqli_query($conn,"INSERT into projets3_noteue(idUE,codeNIP,noteUE)
        values ('" .$var1 . "','" .$column[32] . "','" . $column[6] . "')");
        mysqli_query($conn,"INSERT into projets3_noteue(idUE,codeNIP,noteUE)
        values ('" .$var2 . "','" .$column[32] . "','" . $column[13] . "')");
        mysqli_query($conn,"INSERT into projets3_noteue(idUE,codeNIP,noteUE)
        values ('" .$var3 . "','" .$column[32] . "','" . $column[20] . "')");
       



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
       mysqli_query($conn, "INSERT into projets3_ue(idUE,nomUE) values('".$column[20] . "','" .$column[20] . "')");
       //importation module UE 31
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[7] . "','" .$nom_var1 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[8] . "','" .$nom_var2 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[9] . "','" .$nom_var3 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[10] . "','" .$nom_var4 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[11] . "','" .$nom_var5 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[6] . "','" .$column[12] . "','" .$nom_var6 . "')");

       //importation module UE 32

       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[14] . "','" .$nom_var7 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[15] . "','" .$nom_var8 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[16] . "','" .$nom_var9 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[17] . "','" .$nom_var10 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[18] . "','" .$nom_var11 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[13] . "','" .$column[19] . "','" .$nom_var12 . "')");

       //importation module UE 33

       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[20] . "','" .$column[21] . "','" .$nom_var13 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[20] . "','" .$column[22] . "','" .$nom_var14 . "')");
       mysqli_query($conn, "INSERT into projets3_module(idUE, idModule, nomModule) values('".$column[20] . "','" .$column[23] . "','" .$nom_var15 . "')");



        
        $cpt++;
       }  



        
        
        


      }  
    }
  }
  header('Location: import.php');
  exit;
?>



//,'" . $column[32] . "','" . $column[8] . "')");