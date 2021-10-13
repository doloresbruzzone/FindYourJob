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

    public function ShowCompany ($nameCompany)
    {
        Utils:: checkAdminSession();
        $company = $this->companyDAO->GetCompany($nameCompany);
        if (isset($adminLoggedIn)) 
        {
            require_once(VIEWS_PATH."admin-company-show.php");
        }else
        {
            require_once(VIEWS_PATH."student-company-show.php");
        }
    }

    public function ShowListView()
    {
        Utils::checkAdminSession();
        $companies = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH."company-list.php");
    }

    public function AddCompany($companyName, $yearFoundation, $city, $description, $email, $phoneNumber, $logo)
    {
        Utils::checkAdminSession();

        if ($this->companyDAO->GetCompany($companyName)== NULL) 
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
        $company = $this->companyDAO->GetCompany($companyName);

    
        $company->setName($companyName);
        $company->setYearFoundantion($yearFoundation);
        $company->setCity($city);
        $company->setDescription($description);
        $company->setEmail($email);
        $company->setPhoneNumber($phoneNumber);
        $company->setLogo($logo);
        
        $this->companyDAO->modifyCompany($company);

        $this->ShowListView();
    }



}