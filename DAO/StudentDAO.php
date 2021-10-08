<?php
    namespace DAO;

    use DAO\IStudentDAO as IStudentDAO;
    use Models\Student as Student;
    use Exception as Exception;

    class StudentDAO implements IStudentDAO
    {
        private $studentList = array();

        public function Add(Student $student)
        {
            $this->RetrieveData();
            
            array_push($this->studentList, $student); 

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->studentList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->studentList as $student)
            {
                $valuesArray["studentId"] = $student->getStudentId();
                $valuesArray["firstName"] = $student->getFirstName();
                $valuesArray["lastName"] = $student->getLastName();
                $valuesArray["dni"] = $student->getDni();
                $valuesArray["fileNumber"] = $student->getFileNumber();
                $valuesArray["email"] = $student->getEmail();
                $valuesArray["birthDate"] = $student->getBirthDate();
                $valuesArray["gender"] = $student->getGender();
                $valuesArray["phoneNumber"] = $student->getPhoneNumber();
                $valuesArray["active"] = $student->getActive();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents(''. API_KEY, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->studentList = array();
            try{
                $options = array(
                    'hhtp'=> array(
                        'method'=>'GET',
                        'header'=> 'x-api-key: 4f3bceed-50ba-4461-a910-518598664c08')
                );

                $context = stream_context_create($options);

                $jsonContent = file_get_contents(API_URL.'Student', false, $context);

                $arrayToDecode = json_decode($jsonContent, true);

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
            } catch (Exception $e) {
                print_r($e);
            }
        }

        private function login(){
            
        }



    }
?>