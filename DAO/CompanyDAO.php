<?php
    namespace DAO;

    use Models\Company as Company;
    use DAO\ICompanyDAO as ICompanyDAO;

    class CompanyDAO extends ICompanyDAO{

        private $companyList = array();

        public function Add(Company $company) {
            $this->RetrieveData();

            array_push($this->companyList, $company);

            $this->SaveData();
        }

        public function GetAll(){
            $this->RetrieveData();

            return $this->companyList;
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
            $this->companyList = array();

            $jsonPath = $this->GetJsonFilePath(); //Get correct json path
            $jsonContent = file_get_contents($jsonPath);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray){

                $company = new Company();
                $company->setName($valuesArray["name"]);
                $company->setYearFoundation($valuesArray["yearFoundation"]);
                $company->setCity($valuesArray["city"]);
                $company->setDescription($valuesArray["description"]);
                $company->setEmail($valuesArray["email"]);
                $company->setPhoneNumber($valuesArray["phoneNumber"]);

                array_push($this->companyList, $company);
            }
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

        public function RemoveCompany($companyName, $email) {

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

        public function ModifyCompany (Company $modifiedCompany) {

            $this->RetrieveData();

            foreach ($this->companyList as $company) {
                if ($company->getName() == $modifiedCompany->getName ()) {
                    $company = $modifiedCompany;
                }
            }
            $this->SaveData;
        }

        //No sería mejor usar un numero de empresa?

    }

?>