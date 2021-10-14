<?php

namespace Controllers;

use DAO\CompanyDAO as CompanyDAO;
use Models\Company;
use Utils\Utils as Utils;

class CompanyController
{
    private $companyDAO;

    public function __construct()
    {
        $this->companyDAO = new CompanyDAO();
    }

    public function ShowListViewStudent($message = "")
    {
        Utils::checkStudentSession();
        $companies = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH."list-companies-std.php");
    }

    function ViewAddCompany($message = ""){
        Utils::checkAdminSession();
        require_once(VIEWS_PATH."addCompany.php");
    }

    public function AddCompany($name,$year,$city,$description,$email,$phone,$logo)
    {
        Utils::checkAdminSession();

        $newCompany = new Company();
            $newCompany->setName($name);
            $newCompany->setYearFoundation($year);
            $newCompany->setCity($city);
            $newCompany->setDescription($description);
            $newCompany->setEmail($email);
            $newCompany->setPhoneNumber($phone);
            $newCompany->setLogo($logo);

            $this->companyDAO->Add($newCompany);

            $this->ViewAddCompany("Company added");
    }

    public function DeleteCompany($name, $email)
    {
        Utils::checkAdminSession();

        $removed = $this->companyDAO->RemoveCompany($name, $email);
        
        if($removed == 1){
            //agregar para que muestre mensaje de exito
            $this->ShowListViewStudent("Company deleted");
        }
        else{ 
            //agregar para que muestre mensaje de error
            $this->ShowListViewStudent("error");
        }
    }

    public function ModifyCompany($companyName, $yearFoundation, $city, $description, $email, $phoneNumber, $logo)
    {
        Utils::checkAdminSession();
        $company = $this->companyDAO->GetCompany($companyName, $email);

        $company->setName($companyName);
        $company->setYearFoundantion($yearFoundation);
        $company->setCity($city);
        $company->setDescription($description);
        $company->setEmail($email);
        $company->setPhoneNumber($phoneNumber);
        $company->setLogo($logo);
        
        $this->companyDAO->modifyCompany($company);

        $this->ShowListViewAdmin();
    }


    public function ShowCompany ($nameCompany, $email)
    {
        Utils:: checkAdminSession();
        $company = $this->companyDAO->GetCompany($nameCompany, $email);
        if (isset($adminLoggedIn)) 
        {
            require_once(VIEWS_PATH."admin-company-show.php");
        }else
        {
            require_once(VIEWS_PATH."student-company-show.php");
        }
    }

    public function ShowListViewAdmin($message = "")
    {
        Utils::checkAdminSession();
        $companies = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH."company-management.php");
    }

    public function LogOut(){
        Utils::logout();
    }


}