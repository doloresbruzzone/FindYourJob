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

            $apiStudent = curl_init();

            curl_setopt($apiStudent, CURLOPT_URL, API_URL.'Student');

            curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array(API_KEY));

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
                $student->setRole($valuesArray["role"]);

                array_push($this->studentList, $student);  
            } 
        }

    }
?>