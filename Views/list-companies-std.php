<?php
    require_once('nav.php');
?>
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Companies List</h2>
          </header>
          <table style="text-align:center;">
          <thead>
            <tr>
              <th>Name</th>
              <th>Foundation Year</th>
              <th>City</th>
              <th>Description</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Logo</th>
            </tr>
          </thead>
          <tbody>
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
                      </tr>
                      <?php
                  }
              } ?>
            </tbody>
        </table>
     </div>
</main>