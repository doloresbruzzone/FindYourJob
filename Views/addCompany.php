<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          <h4 style="color:royalblue"><p><?php if(isset($message)){ echo $message; }?></p></h4>
               <h2 class="mb-4">Add Company</h2>
               <form action="<?php echo FRONT_ROOT."Company/AddCompany";?>" method="post" class="bg-light-alpha p-5">
                    <div class="row">
                         <div class="col-lg-3">
                              <div class="form-group">
                                 <label for="">Name</label>
                                 <input type="text" name="name" placeholder="Name"required>
                                 <label for="">Year Foundation</label><br>
                                 <input type="number" name="year" min="0" max="2021" placeholder="aaaa" required><br>
                                 <label for="">City</label>
                                 <input type="text" name="city" placeholder="City" required>
                                 <label for="">Description</label>
                                 <input type="text" name="description" minlength="10" maxlength="1000" placeholder="Description" required>
                                 <label for="">Email</label>
                                 <input type="email" name="email" placeholder="email"required>
                                 <label for="">Phone Number</label>
                                 <input type="text" name="phone" placeholder="Phone Number" required>
                                 <label for="">Photo</label>
                                 <input type="file" name ="logo" value ="<?php/* echo IMGCOOL_PATH.$product->getPhoto();*/?>"> 
                              </div>
                         </div>

                    </div>
                    <button type="submit"  class="btn btn-dark ml-auto d-block">Add</button>
               </form>
          </div>
     </section>
</main>
