<?php
    namespace Process;

    require('..\Config\Autoload.php');

    use Config\Autoload as Autoload;
    use Models\Company as Company;
    use DAO\CompanyDAO as CompanyDAO;

    Autoload::Start();

    if($_POST){

        if(isset($_POST["name"]) && isset($_POST["city"]) && isset($_POST["description"]) && isset($_POST["email"])){

            $yearFoundation = isset($_POST["yearFoundation"]) ? $_POST["yearFoundation"] : "";
                $phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : "";

                $company = new Company();

                $company->setName($_POST["name"]);
                $company->setYearFoundation($_POST["yearFoundation"]);
                $company->setCity($_POST["city"]);
                $company->setDescription($_POST["description"]);
                $company->setEmail($_POST["email"]);
                $company->setPhoneNumber($_POST["phoneNumber"]);

                $companyDAO = new CompanyDAO();
                $exists = $companyDAO->GetCompany($company->getName()); 

                if($exists == null){ //if the company name is not charged in the system
                    $companyDAO->Add($company);

                    echo "<script> alert('La compania fue agregada correctamente');";  
                    echo "window.location = '../bill-content.php'; </script>";
                }
                else{
                    echo "<script> if(confirm('El nombre ingresado corresponde a otra empresa cargada en el sistema, intente nuevamente'));";  
                    echo "window.location = '../add-bill.php'; </script>";
                }
            }
            else{
                echo "<script> if(confirm('Debe completar todos los campos requeridos para cargar la empresa correctamente'));";  
                echo "window.location = '../add-bill.php'; </script>";
            }
    }
    else{
        echo "<script> if(confirm('No es posible procesar informacion, esta tratando de ingresar incorrectamente!'));";  
        echo "window.location = '../add-bill.php'; </script>";
    }
        
?>