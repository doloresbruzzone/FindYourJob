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

    public function ShowModifyCompany($nameCompany , $email)
    {

       $company =  $this->companyDAO->GetCompany($nameCompany , $email);

        require_once(VIEWS_PATH."modifyCompany.php");
    }

    public function ShowCompany ($nameCompany, $email)
    {

        $company = $this->companyDAO->GetCompany($nameCompany, $email);
        //require_once(VIEWS_PATH."student-company-show.php");
        if (isset($adminLoggedIn)) 
        {
            require_once(VIEWS_PATH."admin-company-show.php");
        }else
        {
            require_once(VIEWS_PATH."student-company-show.php");
        }
    }
    public function RedirectAddForm()
    {
        Utils::checkAdminSession();
        require_once(VIEWS_PATH . "addCompany.php");
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
         
            $this->ShowListViewAdmin("Company deleted");
        }
        else{ 
          
            $this->ShowListViewAdmin("error");
        }
    }

    public function ModifyCompany($name, $year, $city, $description, $email, $phone, $logo, $nameCompany , $emailCompany)
    {
        Utils::checkAdminSession();

        $this->companyDAO->modifyCompany($name, $year, $city, $description, $email, $phone, $logo,$nameCompany , $emailCompany);

        $this->ShowListViewAdmin("Company modified");
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

    public function FilterCompanies($search)
    {

        $search = strtolower($search);
        $filteredCompanies = array();
        foreach ($this->companyDAO->getAll() as $company) 
        {
            $companyName = strtolower($company->getName());

            if (Utils::completeSearch($companyName, $search)) 
            {
                 array_push($filteredCompanies, $company);
            }
            /*else
            {
                $this->ShowListViewStudent ("La Empresa no se encuentra registrada");
            }*/
        }
        $companies = $filteredCompanies;
        require_once(VIEWS_PATH . "list-companies-std.php");
    }

}