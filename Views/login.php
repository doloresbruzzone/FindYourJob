
<?php require_once "header.php";?>
<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
               <h2>Find Your Job </h2>
          </header>
          <form action=<?php echo FRONT_ROOT."Student/ShowListView"?> method="Post" class="login-form bg-dark-alpha p-5 text-white">
               <div class="form-group">
               <span><?php if(isset($message)){ echo $message; }?></span>
                    <label for="fname">Alumno</label>
                    <input type="text"  id="name" name="name" class="form-control form-control-lg" placeholder="Ingresar usuario" requierd>
               </div>
               <div class="form-group">
                    <label for="fpassword">Contraseña</label>
                    <input type="text" id="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" requierd>
               </div>
               <button class="btn btn-dark btn-block btn-lg" type="submit">Iniciar Sesión</button>
               <div>
               <br>
              <!-- <span style="font-weight: bold;"> No estas registrado? <a href="<?php echo FRONT_ROOT."Session/ShowSignUpView"?>">Hace click acá!</a></span> -->
               </div>
           </div>
            </form>
     </div>
     
</main>
