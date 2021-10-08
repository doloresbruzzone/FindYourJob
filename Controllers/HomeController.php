<?php
    namespace Controllers;

    use Models\User as User;
    
    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."index.php");
        }   
        
        public function login($emailUser,$passwordUser){
            require_once(VIEWS_PATH."login.php");

            $correctEmail = "usuario@gmail.com";
            $correctPassword = "123";
            $message = "";
            
            if($emailUser == $passwordUser){
                if($passwordUser == $correctPassword){

                    $user = new User();
                    $user->setEmail($emailUser);
                    $user->setPassword($passwordUser);

                    $_SESSION['login'] = $user->getEmail();
                    header("location:Views/student-add.php");
                }
            }
            
            
        }
    }
?>