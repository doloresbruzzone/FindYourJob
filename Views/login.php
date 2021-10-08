<?php

echo "Hola, Bienvenido al Login !";
echo "<br>";
echo "Aca hay que hacer la vista del login...";

?>
<br>
<hr>
<br>
<br>
<form action="DAO/StudentDAO.php" method="POST">
                    <div class="form-group">
                         <label for="">Email</label>
                         <input type="email" name="username" class="form-control form-control-lg" placeholder="Ingrese email" required>
                    </div>
                    <div class="form-group">
                         <label for="">Contraseña</label>
                         <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" >
                    </div>
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Iniciar Sesión</button>
               </form>