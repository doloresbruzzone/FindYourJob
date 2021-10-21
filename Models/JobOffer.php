<?php
    namespace Models;

    class JobOffer {

        private $idJobOffer;
        private $studentId_JobOffer;
        private $companyId_JobOffer;
        private $jobPositionId_JobOffer;
        private $description;
        private $datetime;
        private $limit_date;
        private $timeState;
        private $studentState;
        
        public function __construct($idJobOffer, $studentId, $companyId, $jobPositionId, $description, $datetime, 
                                    $limit_date, $timeState, $studentState){
            $this->idJobOffer = $idJobOffer;
            $this->studentId_JobOffer = $studentId;
            $this->companyId_JobOffer = $companyId;
            $this->jobPositionId_JobOffer = $jobPositionId;
            $this->description = $description;
            $this->datetime = $datetime;
            $this->limit_date = $limit_date;
            $this->timeState = $timeState;
            $this->studentState = $studentState;
        }

        public function setIdJobOffer($idJobOffer){
            $this->idJobOffer = $idJobOffer;
        }

        public function getIdJobOffer(){
            return $this->idJobOffer;
        }

        public function setStudentId_JobOffer($studentId){
            $this->studentIdJobOffer = $studentId;
        }

        public function getStudentId_JobOffer(){
            return $this->studentId_JobOffer;
        }

        public function setCompanyId_JobOffer($companyId){
            $this->companyId_JobOffer = $companyId;
        }

        public function getCompanyId_JobOffer(){
            return $this->companyId_JobOffer;
        }

        public function setJobPositionId_JobOffer($jobPositionId){
            $this->jobPositionId_JobOffer = $jobPositionId;
        }

        public function getJobPositionId_JobOffer(){
            return $this->jobPositionId_JobOffer;
        }

        public function setDescription($description){
            $this->description = $description;
        }

        public function getDescription(){
            return $this->description;
        }

        public function setDatetime($datetime){
            $this->datetime = $datetime;
        }

        public function getDatetime(){
            return $this->datetime;
        }

        public function setLimitDate($limit_date){
            $this->limit_date = $this->limit_date;
        }

        public function getLimitDate(){
            return $this->limit_date;
        }

        public function setTimeState ($timeState){
            $this->timeState = $timeState;
        }

        public function getTimeState(){
            return $this->timeState;
        }

        public function setStudentState($studentState){
            $this->studentState = $studentState;
        }

        public function getStudentState(){
            return $this->studentState;
        }

    }


?>