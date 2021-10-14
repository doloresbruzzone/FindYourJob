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
          <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/LogOut">Logout</a>
          </li> 
          <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/LogOut">2</a>
          </li> 
          <li class="nav-item">
          <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/LogOut">3</a>
          </li> 

          <?php } ?>   
          
          <?php if(isset($_SESSION['student'])) { ?>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT."Company/ShowViewsAdd";?>" >Agregar Empresas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Student/LogOut">Logout</a>
          </li> 
          <?php } ?>
          



     </ul>
</nav>