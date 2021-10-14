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
                        <td>
                         <!-- Button trigger modal -->
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                         Company Info
                         </button>

                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                   <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel"><?php echo $company->getName(); ?></h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                   </button>
                                   </div>
                                   <div class="modal-body">
                                        <td><?php echo $company->getYearFoundation(); ?></td>
                                        <td><?php echo $company->getCity(); ?></td>
                                        <td><?php echo $company->getDescription(); ?></td>
                                        <td><?php echo $company->getEmail(); ?></td>
                                        <td><?php echo $company->getPhoneNumber(); ?></td>
                                        <td><?php echo $company->getLogo(); ?></td> 
                                   </div>
                                   <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   </div>
                              </div>
                              </div>
                              </div>
                              </td>
                              </tr>
                              
                             <?php }
                          }?>
                          </form>    
                    </tbody>
               </table>
          </div>
     </section>
</main>
