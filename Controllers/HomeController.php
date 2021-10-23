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

        public function login($email){
            $studentController = new StudentController();
            $student = new Student();
            $student->setEmail($email);

            if($email == 'admin@utn.com'){
                $admin = new Person();
                $admin->setEmail($email);
                $admin->setIsAdmin(true);
                $_SESSION['admin'] = $admin;

<<<<<<< HEAD
                require_once(VIEWS_PATH . "home-admin.php");
=======
                $this->companyController->ViewAddCompany("Welcome Admin");
                ///require_once(VIEWS_PATH . "home-admin.php");
                //require_once(VIEWS_PATH . "addCompany.php");
>>>>>>> parent of cc2575d (Merge branch 'develop' of https://github.com/doloresbruzzone/FindYourJob into develop)

            }
            else if($studentController->existsByEmail($student)){
                $_SESSION['student'] = $student;

                //$this->companyController->ShowListViewStudent("Welcome!"); 
                require_once(VIEWS_PATH . "home-student.php");

            }
            else{
                $this->Index("Error: el usuario no se encuentra en el sistema.");
            }
        }
    } 
    
    
?>