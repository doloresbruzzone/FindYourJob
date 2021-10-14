<?php
    namespace Controllers;

    use Models\Person as Person;
    use Models\Student as Student;
    
    class HomeController
    {
        private $studentController;

        public function __construct(){
            $this->studentController = new StudentController();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }   

        /* 
        verifico si es admin
        verifico si es student-> si lo encuentro en la api x el mail
        */
        public function login($email){
            $studentController = new StudentController();
            $student = new Student();
            $student->setEmail($email);

            if($email == 'admin@utn.com'){
                $admin = new Person();
                $admin->setEmail($email);
                $admin->setIsAdmin(true);
                $_SESSION['admin'] = $admin;

                require_once(VIEWS_PATH."list-companies-std.php"); //despues habria que cambiarlo a admin-home.php
            }
            else if($studentController->existsByEmail($student)){
                $_SESSION['student'] = $student;

                require_once(VIEWS_PATH."home-student.php"); //despues habria que cambiarlo a student-home.php
            }
            else{
                $this->Index("Error: el usuario no se encuentra en el sistema.");
            }
        }
    } 
    
    
?>