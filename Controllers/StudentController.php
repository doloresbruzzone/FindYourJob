<?php
     namespace Controllers;

     use DAO\StudentDAO as StudentDAO;
     use Models\Student as Student;
     use Utils\Utils as Utils;
 
     class StudentController
     {
         private $studentDAO;
 
         public function __construct()
         {
             $this->studentDAO = new StudentDAO();
         }
 
         public function ShowCompaniesView(){
             Utils::checkStudentSession(); 
             require_once(VIEWS_PATH."list-companies-std.php");
         }
 
         public function ExistsByEmail($student){
             $exists = $this->studentDAO->existsByEmail($student->getEmail());
 
             return $exists;
         }
    }

?>