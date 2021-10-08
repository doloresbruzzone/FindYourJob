<?php
    namespace Controllers;

    use Models\User as User;
    
    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }   
        
    } 
    
?>