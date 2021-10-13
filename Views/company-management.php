<html>
    
    <h2>company management</h2>
    <main>
        <table style="text-align:center;">
        <p><?php if(isset($message)){ echo $message; }?></p>
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
    
        <form action="<?php echo FRONT_ROOT."Company/DeleteCompany" ?>" method="post">
        
            <table style="max-width: 35%;" >
            <thead>
              <tr>
                <th style="width: 100px;">Name</th>
                <th style="width: 100px;">Email</th>
              </tr>
            </thead>
            <tbody align=center>
              <tr>
                <td>
                  <input type="text" name="name" style="height: 40px;" min="0">  
                </td>
                <td>
                    <input type="email" name="email" style="height: 40px;" min="0">
                </td>
                <td>
                  <button type="submit" class="btn" value="">Remover</button>
                </td>
              </tr>
            </tbody>
            </tr>
          </table>
          <form>
    </main>
    

    
</html>