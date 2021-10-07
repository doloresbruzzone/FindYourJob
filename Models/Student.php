<?php
    namespace Models;

    use Models\Person as Person;

    class Student extends Person
    {
        private $studentId; 
        private $fileNumber;
        private $gender; 
        private $birthDate;
        private $phoneNumber;
        private $active;
        private $careerId;

        ///asd
        ////asd
        ///asd


        public function getStudentId()
        {
            return $this->studentId;
        }

        public function setStudentId($studentId)
        {
            $this->studentId = $studentId;
        }

        public function getFileNumber(){
            return $this->fileNumber;
        }

        public function setFileNumber($fileNumber){
            $this->fileNumber = $fileNumber;
        }

        public function getGender(){
            return $this->gender;
        }

        public function setGender($gender){
            $this->gender = $gender;
        }

        public function getBirthDate(){
            return $this->birthDate;
        }

        public function setBirthDate($birthDate){
            $this->birthDate = $birthDate;
        }

        public function getPhoneNumber(){
            return $this->phoneNumber;
        }

        public function setPhoneNumber($phoneNumber){
            $this->phoneNumber = $phoneNumber;
        }

        public function getActive(){
            return $this->active;
        }

        public function setActive($active){
            $this->active = $active;
        }

        public function getCareerId(){
            return $this->careerId;
        }

        public function setCareerId($careerId){
            $this->careerId = $careerId;
        }

    }
?>

