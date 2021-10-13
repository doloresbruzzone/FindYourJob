<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Listado de Alumnos</h2>
               <table class="table bg-light-alpha">
                    <thead>
                         <th>Legajo</th>
                         <th>Apellido</th>
                         <th>Nombre</th>
                    </thead>
                    <tbody>
                         <?php
                         if (isset ($studentList)){ 
                              foreach($studentList as $student)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $student->getRecordId() ?></td>
                                             <td><?php echo $student->getLastName() ?></td>
                                             <td><?php echo $student->getFirstName() ?></td>
                                             echo "<td><a href=" . FRONT_ROOT . "Student/ShowStudent/". $studentId .">Ver Alumno</a></td>";
                                        </tr>
                                   <?php
                              }
                         }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>