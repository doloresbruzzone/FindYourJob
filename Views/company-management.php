<?php
    require_once('nav-admin.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Company Management</h2>
               <table class="table bg-light-alpha">
                    <thead>
                    <th>Name</th>
                    <th>Foundation Year</th>
                    <th>City</th>
                    <th>Description</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Logo</th>  
                    <th>Modify</th> 
                    </thead>
                    <tbody>  
                   <form action=<?php echo FRONT_ROOT.'Company/ModifyCompany'?> method ="put">  
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
                        <td><button type="submit" name="modify" class="btn btn-danger" value="">Modify</button></td>
                        
                              </tr>
                             <?php }
                          }?>
                        </form>
                    </tbody>
               </table>
          </div>
     </section>
</main>
    
<main class="py-5">  
<div class="container">
<h3 class="mb-4">Remove Company</h3>
        <form action="<?php echo FRONT_ROOT."Company/DeleteCompany" ?>" method="post">
        <table  style="max-width: 35%;">
            <thead>
              <tr>
                <th style="width: 100px;">Name</th>
                <th style="width: 100px;">Email</th>
              </tr>
            </thead>
            <tbody align=center>
              <tr>
                <td>
                  <input type="text" name="name" style="height: 40px;" min="0" placeholder="company name">  
                </td>
                <td>
                    <input type="email" name="email" style="height: 40px;" min="0" placeholder="company email">
                </td>
                <td>
                  <button type="submit" class="btn" value="">Remove</button>
                </td>
              </tr>
            </tbody>
            </tr>
          </table>
          <form>
      </div>
    </main>
