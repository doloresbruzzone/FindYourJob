<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <strong>FindYourJob</strong>
     </span>
     <ul class="navbar-nav ml-auto">

          <?php if(isset($_SESSION['admin'])) { ?>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListViewAdmin">Company Management</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/LogOut">Logout</a>
          </li> 
          <?php } ?>   
          
          <?php if(isset($_SESSION['student'])) { ?>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListViewStudent">Companies List</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/LogOut">Logout</a>
          </li> 
          <?php } ?>
          



     </ul>
</nav>