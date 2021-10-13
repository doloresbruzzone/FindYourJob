<main class="d-flex align-items-center justify-content-center height-100">
     <div class="container">
        <header class="text-center">
            <h2>Add Company</h2>
        </header>
        
        <form method="POST" action=<?php echo FRONT_ROOT."Company/add"?> method="post">
            <div class="form-group">
                <form>
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
                    <button type="submit" name="add">Add</button>
            </form>                      
        
    </div>
</main>