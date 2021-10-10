<?php
    require_once("header.php");
    require_once("navbar.php");
?>
    <div class="container">
          <h2 class="mb-4">Add Company</h2>
          <form method="POST" action="Process/addCompany-action.php">
               <div class="row">
                    <div class="form-group">
                         <label for="">Name</label>
                         <input type="text" name="name" required>
                    </div>
                    
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
               </div>
               
               <button type="submit" name="button">Agregar</button>
          </label>
<?php
    require_once("footer.php");
?>