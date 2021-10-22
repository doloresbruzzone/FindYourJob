<?php

    namespace Controllers;

    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\JobPositionDAO as JobPositionDAO;
    use Utils\Utils as Utils;
    use Models\JobPosition as JobPosition; 
    use Models\JobOffer as JobOffer;
    use DAO\Connection as Connection;

    class JobOfferController {

        private $jobOfferDAO;
        private $jobPositionDAO;

        public function __construct()
        {
            $this->jobOfferDAO = new JobOfferDAO();
            $this->jobPositionDAO = new JobPositionDAO();
        }

        public function viewAddJobOffer() {
            Utils::checkAdminSession();

            $jobPositionList = $this->jobPositionDAO->GetAll();
            require_once(VIEWS_PATH."addJobOffer.php");
        }

        public function addJobOffer($description, $datetime, $limit_date, $jobPositionId_JobOffer)
        {
            if($description != "" && $datetime != "" && $limit_date != "" && $jobPositionId_JobOffer != "")
            {
                $err_string = $this->jobOfferDAO->add($description, $datetime, $limit_date, $jobPositionId_JobOffer);
    
                if ($err_string) {
                    $alertMessage = $err_string;
                    $redirectUrl = 'JobOffer/showAddJobOffer';
                } else {
                    $alertMessage = 'Job offer added successfully.';
                    $redirectUrl = 'JobOffer';
                }
               /*  include(ROOT."presentation/alert.php"); */
            }
        }

        

    }

?>