<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>Framework</strong>
     </span>
     <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['admin'])) { ?>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT."Company/ShowViewsAdd";?>" >Agregar Empresas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT."Company/ShowListViewStudent";?>" >Listar Empresas</a>
          </li> 
          <?php } ?>         
     </ul>
</nav>