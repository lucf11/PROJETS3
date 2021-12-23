<form method="POST" action="index.php?action=created&controller=agreg">
  <fieldset>
    <legend>Créez une note agréger :</legend>
    <p>
      
      <!-- <input type="text" placeholder="idAgregation" name="idAgregation" id="idAgregation" required/> -->
      
      <input type="text" placeholder="nom" name="nom" id="nom_id" required/>
      <input type="text" placeholder="coeff" name="coeff" id="coeff_id" required/>
    <p>Cochez les modules que vous voulez agréger</p>
    <?php
        foreach($tab_module as $m){
            echo '<input type="checkbox" name="module[]" value="'.$m->getidModule().'" id="'.$m->getidModule().'" /> <label for="'.$m->getnomModule().'">'.$m->getnomModule().'</label><br />';
        }
    ?>
   </p>
   <p>Cochez les agregations que vous voulez agréger</p>
   <?php
        if(!empty($tab_agreg)){
          foreach($tab_agreg as $a){
              echo '<input type="checkbox" name="agreg[]" value="'.$a->getIdAgregation().'" id="'.$a->getIdAgregation().'" /> <label for="'.$a->getNom().'">'.$a->getNom().'</label><br />';
          }
        }
    ?>
    
    <p>Cochez la catégorie de la note agreger</p>
    <select name="cate" id="cate-select">
      <option value="">Choix catégorie</option>
      <?php
        if(!empty($tab_cate)){
          foreach($tab_cate as $c){
              echo '<option value="'.$c->getNomCate().'">'.$c->getNomCate().'</option>';
          }
        }
      ?>
    </select>
    <p>
      <input type="submit" value="Envoyer" />
    </p>
  </fieldset> 
    </form>