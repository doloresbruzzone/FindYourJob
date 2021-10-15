<?php
    require_once('nav.php');
?>

<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
          <h4 style="color:royalblue"><p><?php if(isset($message)){ echo $message; }?></p></h4>
               <h2 class="mb-4">Companies List</h2>
               <table class="table bg-light-alpha">
                    <thead>
                    <th>Name</th>
                    <th>Foundation Year</th>
                    <th>City</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Logo</th> 
                    <th>Company info</th>  
                    </thead>
                    <tbody>  
                    
                   <form action=<?php echo FRONT_ROOT.'Company/ShowListViewStudent'?> method ="get">  
                   <?php if(!empty($companies)){ 
                    foreach($companies as $company){ ?>
                    
                    <tr>
                         <td><?php echo $company->getName(); ?></td>
                         <td><?php echo $company->getYearFoundation(); ?></td>
                         <td><?php echo $company->getCity(); ?></td>
                         <td><?php echo $company->getDescription(); ?></td>
                         <td><?php echo $company->getEmail(); ?></td>
                         <td><?php echo $company->getPhoneNumber(); ?></td>
                         <td><?php echo $company->getLogo(); ?></td> 
                         <!-- Button trigger modal -->
                         <td><a href="<?php echo FRONT_ROOT."Company/ShowCompany/?nameCompany=".$company->getName()."&email=".$company->getEmail();?>" >Ver</a></td>
                         <td>
                         <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                         
                         </button>

                         <div class="modal" tabindex="-1" role="dialog">
                         <div class="modal-dialog" role="document">
                         <div class="modal-content">
                         <div class="modal-header">
                         <h5 class="modal-title">Modal title</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                         </button>
                           </div>
                          <div class="modal-body">
                            <p>Modal body text goes here.</p>
                          </div>
                          <div class="modal-footer">
                           <button type="button" class="btn btn-primary">Save changes</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>
                         </div>
                         </div>
                         </div>
















                    </td>
                             <?php }
                          }?>
                          </form>    
                    </tbody>

                    <form action="<?php echo FRONT_ROOT ?>Company/FilterCompanies" method="POST" enctype="multipart/form-data">
                    <input type="text" name="search" class="form-control form-control-ml" placeholder="Company Name"  required>
                    <button type="submit"  class="btn btn-dark ml-auto d-block" >Buscar</button>
                    
                              
                    
            </form>
               </table>
          </div>
     </section>
</main>
