<?php
    namespace DAO;

    use Models\Company as Company;
    use DAO\ICompanyDAO as ICompanyDAO;
    use DAO\Connection as Connection;

    class CompanyDAO implements ICompanyDAO{

        private $companyList = array();
        private $connection;
        private $tabletName = "companies";

        /* public function Add(Company $company) {
            $this->RetrieveData();

            array_push($this->companyList, $company);

            $this->SaveData();
        }*/

        public function Add(Company $company)
        {
            try {

            $sql = "INSERT INTO company(name, year_foundation, city, description, logo, email, phone_number) 
                    VALUES(:name, :year_foundation, :city, :description, :logo, :email, :phone_number);";
    
            $parameters['name'] = $company->getName();
            $parameters['year_foundation'] = $company->getYearFoundation();
            $parameters['city'] = $company->getCity();
            $parameters['description'] = $company->getDescription();
            $parameters['logo']=$company->getLogo();
            $parameters['email'] = $company->getEmail();
            $parameters['phone_number'] = $company->getPhoneNumber();
    
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($sql, $parameters);
            } catch (\PDOException $exeption) {
                throw $exeption;
            }
        }
        
        /*public function GetAll(){
            $this->RetrieveData();

            return $this->companyList;
        }*/
        public function GetAll()
        {
    
            $sql = "SELECT * FROM ".$this->tabletName;
    
            try {
                $this->connection = Connection::getInstance();
                $this->companiesList = $this->connection->execute($sql);
               
            } catch (\PDOException $exeption) {
                throw $exeption;
            }
    
            if (!empty($this->companiesList)) {
                return $this->retrieveData();
            } else {
                return false;
            }
        }


        private function SaveData(){

            $arrayToEncode = array();

            foreach($this->companyList as $company){
                $valuesArray["name"] = $company->getName();
                $valuesArray["yearFoundation"] = $company->getYearFoundation();
                $valuesArray["city"] = $company->getCity();
                $valuesArray["description"] = $company->getDescription();
                $valuesArray["logo"] = $company->getLogo();
                $valuesArray["email"] = $company->getEmail();
                $valuesArray["phoneNumber"] = $company->getPhoneNumber();

                array_push($arrayToEncode, $valuesArray);
            }
          
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            $jsonPath = $this->GetJsonFilePath();

            file_put_contents($jsonPath, $jsonContent);
        }

        private function RetrieveData(){
            //$this->companyList = array();

            //$jsonPath = $this->GetJsonFilePath(); //Get correct json path
            //$jsonContent = file_get_contents($jsonPath);
            //$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            $listCompanies = array ();

            foreach($this->companiesList as $valuesArray){

                $company = new Company();
                //Agregar id
                $company->setName($valuesArray["name"]);
                $company->setYearFoundation($valuesArray["yearFoundation"]);
                $company->setCity($valuesArray["city"]);
                $company->setDescription($valuesArray["description"]);
                $company->setLogo($valuesArray["logo"]);
                $company->setEmail($valuesArray["email"]);
                $company->setPhoneNumber($valuesArray["phoneNumber"]);
                

                array_push($listCompanies, $company);
            }

            return $listCompanies;
        }

        public function GetCompany($companyName, $email)
        {
            $this->RetrieveData();
            $comp = null;

            foreach($this->companyList as $company) {
                if($company->getName() == $companyName && $company->getEmail() == $email) {
                    $comp = $company;
                }
            }
            return $comp;
        }

        /*public function RemoveCompany($companyName, $email) {

            $this->RetrieveData();
            $flag=0;
    
            foreach($this->companyList as $company){
                if(($company->getName() == $companyName) && ($company->getEmail() == $email)){
                    $key = array_search($company, $this->companyList);
                    unset($this->companyList[$key]);
                    $flag=1;
                }
            }
            $this->SaveData();
            return $flag;
        }*/

        public function DeleteCompany($companyId)
        {
            $sql = "DELETE FROM companies WHERE companyId=:companyId";
            $parameters['companyId'] = $companyId;
    
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $exception) {
                throw $exception;
            }
        }

        //Need this function to return correct file json path
        function GetJsonFilePath(){

            $initialPath = "Data/companies.json";
            
            if(file_exists($initialPath)){
                $jsonFilePath = $initialPath;
            }else{
                $jsonFilePath = "../".$initialPath;
            }
            return $jsonFilePath;
        }


        /*public function ModifyCompany($name, $year, $city, $description, $email, $phone, $logo,$nameCompany , $emailCompany){
            $this->RetrieveData();
            $newList = array();
            foreach ($this->companyList as $company){
                if(($company->getName() != $nameCompany) && ($company->getEmail() != $emailCompany) ){
                    array_push($newList,$company);
    
               }else{
                $company->setName($name);
                $company->setYearFoundation($year);
                $company->setCity($city);
                $company->setDescription($description);
                $company->setEmail($email);
                $company->setPhoneNumber($phone);
                $company->setLogo($logo);

                array_push($newList,$company);
                    }
    
              } 
              $this->companyList = $newList;
             $this->SaveData(); 
    
           }
        */

        public function UpdateCompany(Company $company)
        {
            $sql = "UPDATE campanies SET name=:name, yearFoundation=:yearFoundation, city=:city, description=:description, logo=:logo, email=:email, phoneNumber=:phoneNumber WHERE companyId= :companyId;";
    
            //$parameters['companyId'] = $company->getCompanyId();
            $parameters['name'] = $company->getName();
            $parameters['yearFoundation'] = $company->getYearFoundation();
            $parameters['city'] = $company->getCity();
            $parameters['description'] = $company->getDescription();
            $parameters['logo'] = $company->getLogo();
            $parameters['email'] = $company->getEmail();
            $parameters['phoneNumber'] = $company->getPhoneNumber();
    
            try {
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $exception) {
                throw $exception;
            }
        }

        public function Search($companyId)
        {
            $sql = "SELECT * FROM companies WHERE companyId=:companyId";
            $parameters['companyId'] = $companyId;
    
            try {
                $this->connection = Connection::getInstance();
                $companiesList = $this->connection->execute($sql, $parameters);
            } catch (\PDOException $exception) {
                throw $exception;
            }
            if (!empty($companiesList)) {
                return $this->retrieveData();
            } else {
                return false;
            }
        }

           public function GetInstance(){
            $this->connection = Connection::getInstance();
            return $this->connection;
           }
       

    }

?>