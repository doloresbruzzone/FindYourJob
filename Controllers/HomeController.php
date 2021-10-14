<?php
    namespace Controllers;

    use Models\Person as Person;
    use Models\Student as Student;
    use Controllers\CompanyController as CompanyController;
    
    class HomeController
    {
        private $studentController;
        private $companyController;

        public function __construct(){
            $this->studentController = new StudentController();
            $this->companyController = new CompanyController();
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

                $this->companyController->ShowListViewAdmin("Welcome Admin");
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