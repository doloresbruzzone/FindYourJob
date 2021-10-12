<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    
    class StudentDAO implements IStudentDAO
    {
        private $studentList = array();
        
        public function GetAll()
        {
            $this->RetrieveData();

            return $this->studentList;
        }

        private function RetrieveData()
        {
            $this->studentList = array();

            $apiStudent = curl_init(API_URL.'Student');

            //curl_setopt($apiStudent, CURLOPT_URL, API_URL.'Student');

            curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array(API_KEY));
            curl_setopt($apiStudent, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($apiStudent);

            $arrayToDecode = json_decode($response, true);
            
            foreach($arrayToDecode as $valuesArray)
            {
                $student = new Student();

                $student->setStudentId($valuesArray["studentId"]);
                $student->setFirstName($valuesArray["firstName"]);
                $student->setLastName($valuesArray["lastName"]);
                $student->setDni($valuesArray["dni"]);
                $student->setFileNumber($valuesArray["fileNumber"]);
                $student->setEmail($valuesArray["email"]);
                $student->setBirthDate($valuesArray["birthDate"]);
                $student->setGender($valuesArray["gender"]);
                $student->setPhoneNumber($valuesArray["phoneNumber"]);
                $student->setActive($valuesArray["active"]);

                array_push($this->studentList, $student);  
            } 
        }

        public function getEmail($email){

            $student = null;

            $studentList = $this->getAll();

            foreach($studentList as $students){

                if($students->getEmail() === $student){
                     
                    $student = new Student();

                    $student = $students;
                }
            }

            return $student;
        }
        /* 
        public function GetEmail($email){

            $this->RetrieveData();

            $student = null;
            
            if(!empty($this->studentList)){
                foreach($this->$studentList as $students){
                    if($students->getEmail() == $email){
                        $student= $students;
                    }
                }
            }
    
            return $student;
        } */
    }
?>