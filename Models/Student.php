<?php
    namespace Models;

    use Models\Person as Person;

    class Student extends Person
    {
        private $recordId;
        private $probando;

        public function getRecordId()
        {
            return $this->recordId;
        }

        public function setRecordId($recordId)
        {
            $this->recordId = $recordId;
        }

        /**
         * Get the value of probando
         */ 
        public function getProbando()
        {
                return $this->probando;
        }

        /**
         * Set the value of probando
         *
         * @return  self
         */ 
        public function setProbando($probando)
        {
                $this->probando = $probando;

                return $this;
        }
    }
?>

