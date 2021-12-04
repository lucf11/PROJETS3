<!DOCTYPE html>
<html lang="en">
<div class="etudiant">
    <?php
      echo '<div class="nomEtud">'. $v->getNomEtudiant()'</div>'.
      '<div class="rang">'$v->getRangIUT()'</div>'.
      '<div class="bac">'$v->getBaccalaureat()'</div>'.
      '<div class="classementGlobale">'$v->getClassementGlobale()'</div>'.
      '<div class="moyenne">'$v->getMoyenneGlobale()'</div>';
      echo '<a href="/index.php?action=donnerAvis&controller=etudiant">Donner un avis sur l\'étudiant</a>';
      /// afficher toutes les infos de l'étudiants.
    ?>


</div>