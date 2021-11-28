<form method="post" action="../../controller/index.php?action=created&controller=agreg">
  <fieldset>
    <legend>Créez un utilisateur :</legend>
    <p>
      
      <input type="text" placeholder="idAgregation" name="idAgregation" id="idAgregation" required/>
      <input type="text" placeholder="nom" name="nom" id="nom_id" required/>
      <input type="text" placeholder="coeff" name="coeff" id="coeff_id" required/>
    <p>Cochez les modules que vous voulez agréger</p>
    <?php
        foreach($tab_modules as $m){
            echo '<input type="checkbox" name="'.{$m->getnomModule()}.'" id="'.{$m->getidModule()}.'" /> <label for="'.{$m->getnomModule()}.'">'.{$m->getnomModule()}.'</label><br />';
        }
    ?>
   </p>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
    </form>