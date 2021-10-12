<main class="d-flex align-items-center justify-content-center height-100">
    
    <div class="content">
          <header class="text-center">
               <h2>Find Your Job </h2>
          </header>
          <span><?php if(isset($message)){ echo $message; }?></span>
          <form action=<?php echo FRONT_ROOT."Student/validateUser"?> method="get" class="login-form bg-dark-alpha p-5 text-white">
               <div class="form-group">
                    <label for="fname">USERS</label>
                    <input type="email"  id="fname" name="student" class="form-control form-control-lg" placeholder="Email" requierd>
               </div>
               <button class="btn btn-dark btn-block btn-lg" type="submit" >Log In</button>
            </form>
     </div>
     <div class="container">
        <header class="text-center">
            <h2>Add Company</h2>
        </header>
        
        <form method="POST" action="Process/addCompany-action.php">
            <div class="form-group">
                <form>
                    <div class="form-group">
                        <label for="">Year Foundation</label>
                        <input type="number" name="yearFoundation" required>
                    </div>

                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" name="city" required>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" minlength="100" maxlength="1000" required>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="number" name="phoneNumber" required>
                    </div>
            </form>                      
        
    </div>
</main>