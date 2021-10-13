<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Find Your Job </h2>

               <h3 style="color:royalblue">
            <?php
                if (isset($invalidEmail)) {
                    echo "Error: el usuario no se encuentra en el sistema.";
                }
                if (isset($userNotLogged)) {
                    echo "Error: Debe estar loggeado para acceder.";
                }
                if (isset($userNotAdmin)) {
                    echo "Error: Debe estar loggeado como Administrador para acceder.";
                }
            ?>
            </h3>


          </header>
          <form action=<?php echo FRONT_ROOT.'Home/login'?> method="post" class="login-form bg-dark-alpha p-5 text-white">
               <div class="form-group">
                    <label for="">USERNAME</label>
                    <input type="email" name="email" class="form-control form-control-lg" required placeholder="Type email" >
               </div>
               <button class="btn btn-dark btn-block btn-lg" type="submit" >Log In</button>
            </form>
     </div>
     
</main>
