<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Find Your Job </h2>
          </header>
          <form action=<?php echo FRONT_ROOT.'Home/login'?> method="post" class="login-form bg-dark-alpha p-5 text-white">
               <div class="form-group">
                    <label for="">USERNAME</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="type email" requierd>
               </div>
               <button class="btn btn-dark btn-block btn-lg" type="submit" >Log In</button>
            </form>
     </div>
     
</main>
