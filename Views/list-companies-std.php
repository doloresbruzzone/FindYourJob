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
                    <th style="width: 10%">Name</th>
                    <th style="width: 10%">Foundation Year</th>
                    <th style="width: 10%">City</th>
                    <th style="width: 10%">Description</th>
                    <th style="width: 10%">Email</th>
                    <th style="width: 10%">Phone Number</th>
                    <th style="width: 10%">Logo</th>  
                    <th style="width: 30%">Accion</th>    
                    </thead>
                    <tbody>  
                   <form action="<?php echo FRONT_ROOT."Company/DeleteCompany";?>"  method ="post">  
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
                        <td>
                        <input id="nameCompany" name="nameCompany" type="hidden" value="<?php echo $company->getName();?>">
                        <button type="submit" name="remover" class="btn btn-danger" value="<?php echo $company->getEmail();?>"> Eliminar</button>
                        <button type="submit" name="modify" class="btn btn-danger" value=""> Modificar</button>
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
















