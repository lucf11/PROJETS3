<div class="listagreger">
    <?php
      ///affichage des moyennes agreger.
      foreach($tab_v as $v)
        echo 'Nom : ' . $v->getNomEtudiant() . 'moyenne agréger : ' . $v->getMoyenneAggreg();
           
    ?>
  </div>