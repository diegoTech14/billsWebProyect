<?php

include ('../usersQueries.php');
include ('./generalValidations.php');

    class ValidatingUser {
        
        //Object for queries
        private $queriesObject;
        private $generalValidationsObject; 

        function __construct()
        {
            $this -> queriesObject = new UsersQueries();
            $this -> generalValidationsObject = new GeneralValidations();
        }

        public function validatingExistingPhoneNumber($phoneNumber){
            
            $numbers = $this -> queriesObject -> getAllPeopleTelephones();
            $arrayOfNumbers = (json_decode($numbers));
            $response = false;
            
            foreach($arrayOfNumbers as $number){
                if($number == $phoneNumber){
                    $response = true;
                    break;
                }
                
            }
            return $response;
        }

        public function validatingCedula($cedula) : bool{
            return ctype_digit($cedula) ? true : false;
        }

        public function validatingTelephoneNumber($phoneNumber) : bool{
            return ctype_digit($phoneNumber) ? true : false;
        }

        //This function returns true when the complete name has numbers using a Regular expression
        public function validatingCompleteName($completeName) : bool{

            return ($this -> generalValidationsObject -> 
            validatingSpecialChars($completeName) or $this -> 
            generalValidationsObject -> validatingNumbers($completeName)) ? true : false;
        }
    }

    $valid = new ValidatingUser();
    var_dump($valid -> validatingCompleteName("Diego Duarte"));
?>