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
                         <td>
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                         Company Info
                         </button>
                    </td>
                             <?php }
                          }?>
                          </form>    
                    </tbody>
               </table>
          </div>
     </section>
</main>
