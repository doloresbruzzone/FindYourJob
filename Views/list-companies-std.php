<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
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
                    </thead>
                    <tbody>  
                   <form action="" method ="">  
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
                        <button type="submit" name="remover" class="btn btn-danger" value=""> Eliminar </button>
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






























