<div class="list_agreg">
    <?php
      ///affichage de la liste d'etudiant.
      if(!empty($tab_a)){
        foreach($tab_a as $a)
          echo 'id agreg : ' . $a->getIdAgregation() . ' ';
                

      }
    ?>
</div>