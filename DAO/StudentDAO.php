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

        /*public function GetCompany($companyName)
        {
            $this->RetrieveData();
            $companyExists = null;

            foreach($this->companyList as $company) {
                if($company->getName() == $companyName) {
                    $companyExists = $company;
                }
            }
            return $companyExists;
        }*/
 
        public function GetByStudentDni($studentDni)
        {
            $this->RetrieveData();
    
            foreach ($this->studentList as $student) {
                if ($student->GetByStudentDni() == $studentDni){
                    return $student;
                }
            }
    
            return null;
        }

        public function existsByEmail($email){
            $exists=false;
            $this->RetrieveData();

            foreach($this->studentList as $student){
                if($student->getEmail() == $email){
                    $exists = true;
                }
            }
            return $exists;
        }
        
    }
?>