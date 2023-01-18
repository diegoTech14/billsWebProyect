<?php

    class GeneralValidations{

        private $regularExpression;

        //This function returns the text without white spaces        
        private function truncateText($text) : string {
            $truncatedText = "";
            $arrayText = explode(" ", $text);

            foreach($arrayText as $word){
                $truncatedText .= $word;
            }

            return $truncatedText;
        }

         //This function returns true when the text has any special char
        public function validatingSpecialChars($text) : bool {
            $this -> regularExpression = "/\W/";
            $text = $this -> truncateText($text);

            return (preg_match($this -> regularExpression, $text)) ? true : false;
        }   

        //This function returns true when the text has any number
        public function validatingNumbers($text) : bool {
            $this -> regularExpression = "/[0-9]/";
            return (preg_match($this -> regularExpression, $text)) ? true : false;
        }

        public function validatingAlphabetic($text) : bool {
            $this -> regularExpression = "/[A-Z]/";
            return (preg_match($this -> regularExpression, $text)) ? true : false;
        }

    }

?>