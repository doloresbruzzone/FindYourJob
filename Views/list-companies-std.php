<?php
    require_once('nav.php');
?>
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Companies List</h2>
          </header>
          <form action=<?php echo FRONT_ROOT."Student/validateUser"?> method="get" class="login-form bg-dark-alpha p-5 text-white">
               <div class="form-group">
                    <label for="fname">USERS</label>
                    <input type="email"  id="fname" name="student" class="form-control form-control-lg" placeholder="Email" requierd>
               </div>
               <button class="btn btn-dark btn-block btn-lg" type="submit" >Log In</button>
            </form>
     </div>
     
</main>