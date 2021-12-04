<div class="list_etudiant">
    <?php
      ///affichage de la liste d'etudiant.
      foreach($tab_v as $v)
        echo 'Nom : ' . $v->getNomEtudiant() . 'moyenne : ' . $v->getMoyenneGlobale();
        echo '<a href="../../index.php?action=read&controller=etudiant">Afficher le détails de l\'étudiant</a>';
              
    ?>
</div>