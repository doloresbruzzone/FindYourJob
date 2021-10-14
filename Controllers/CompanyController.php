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

    public function ShowListViewAdmin()
    {
        Utils::checkAdminSession();
        $companies = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH."company-management.php");
    }

    public function ShowListViewStudent()
    {
        Utils::checkStudentSession();
        $companies = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH."list-companies-std.php");
    }

    public function AddCompany($companyName, $yearFoundation, $city, $description, $email, $phoneNumber, $logo)
    {
        Utils::checkAdminSession();

        if ($this->companyDAO->GetCompany($companyName, $email)== NULL) 
        {
            $newCompany = new Company();
            $newCompany->setName($companyName);
            $newCompany->setYearFoundation($yearFoundation);
            $newCompany->setCity($city);
            $newCompany->setDescription($description);
            $newCompany->setEmail($email);
            $newCompany->setPhoneNumber($phoneNumber);
            $newCompany->setLogo($logo);
        } 
        else {
            require_once(VIEWS_PATH . "addCompany.php");

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

    function ShowViewsAdd(){
        Utils::checkAdminSession();
        require_once(VIEWS_PATH."addCompany.php");
    }

    public function DeleteCompany($companyName, $email){
        Utils::checkAdminSession();

        $removed = $this->companyDAO->RemoveCompany($companyName, $email);
        
        if($removed == 1){
            //agregar para que muestre mensaje de exito
            $this->ShowListViewAdmin();
        }
        else{ 
            //agregar para que muestre mensaje de error
            $this->ShowListViewAdmin();
        }
    }

    public function LogOut(){
        Utils::logout();
    }




}