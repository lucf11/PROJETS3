<div class="sidebar">
            <div class="logo-details">
                <box-icon type='logo' name='medium'></box-icon>
                <div class="logo_name">Université</div>
                <i class='bx bx-menu' id="btn" ></i>
            </div>
            <ul class="nav-list">
              <li>
                  <i class='bx bx-search' ></i>
                 <input type="text" placeholder="Rechercher">
                 <span class="tooltip">Rechercher</span>
              </li>
              <li>
                <a href="../index.php">
                    <i class='bx bx-user' ></i>
                  <span class="links_name">Connexion</span>
                </a>
                 <span class="tooltip">Connexion</span>
              </li>
              <li>
               <a href="#">
                <i class='bx bx-folder' ></i>
                    <span class="links_name">Importer le CSV</span>
               </a>
               <span class="tooltip">Importer le CSV</span>
             </li>
             <li>
                <a href="../pagesMentionslegales.html">
                    <i class=' bx bx-bookmarks' ></i>
                     <span class="links_name">Mentions Légales</span>
                </a>
                <span class="tooltip">Mentions Légales</span>
              </li>
            </ul>
</div>  
<script>
    let sidebar = document.querySelector(".sidebar");//déf des classes 
    let closeBtn = document.querySelector("#btn");
          let searchBtn = document.querySelector(".bx-search");
        
          closeBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("open");
            menuBtnChange();//appel de la fcontion
          });
        
          searchBtn.addEventListener("click", ()=>{ // le menu va s'ouvrir si on clique sur la barre de recherche
            sidebar.classList.toggle("open");
            menuBtnChange(); 
          });
        
          // code pour changer le logo du menu quand il est ouvert 
          function menuBtnChange() {
           if(sidebar.classList.contains("open")){
             closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//on remplace le logo de menu 
           }else {
             closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//on le remet d'origine 
           }
          }
</script>