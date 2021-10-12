<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        public function ShowLoginView($message = "")
        {
            $studentList = $this->studentDAO->GetAll();

            var_dump($studentList);

            require_once(VIEWS_PATH."login.php");
        }
        
        public function ShowListView($message = "")
        {
            require_once(VIEWS_PATH."validate-session.php");

            $studentList = $this->studentDAO->GetAll();

            var_dump($studentList);
            
            require_once(VIEWS_PATH."student-list.php");
        }

        public function ShowAdminHomeView($message = "")
        {
            require_once(VIEWS_PATH."validate-session.php");

            require_once(VIEWS_PATH."admin-home.php");
        }
        
        public function validateUser($email){

            $admin = "adminUser@gmail.com";

           $student = $this->studentDAO->GetEmail($email);

           if($student != null){

            $_SESSION['login'] = $student;

            $this->ShowListView("welcome student");

           }if($admin === $email){

            $_SESSION['login'] = $admin;

                $this->ShowAdminHomeView("welcome admin");

             }else{

                $this->ShowLoginView("user does not exist");
             }

           }
            

        }

?>