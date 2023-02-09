<?php
class ValidatingUser
{

    private $regularExpression;

    //This function returns the text without white spaces 
    private function truncateText($text): string
    {
        $truncatedText = "";

        if (gettype($text) == "array") {
            foreach ($text as $word) {
                $truncatedText .= $word;
            }
        } else {
            $truncatedText = $text;
        }
        return $truncatedText;
    }

    //This function returns true when the text has any special char
    private function validatingSpecialChars($text): bool
    {
        $this->regularExpression = "/\W/";
        $text = $this->truncateText($text);

        return (preg_match($this->regularExpression, $text)) ? true : false;
    }

    //This function returns true when the text has any number
    private function validNumbers($text): bool
    {
        $this->regularExpression = "/[0-9]/";
        $text = $this->truncateText($text);
        return (preg_match($this->regularExpression, $text)) ? true : false;
    }

    private function validgAlphabet($text): bool
    {
        $this->regularExpression = "/[A-Z]/i";
        return (preg_match($this->regularExpression, $text)) ? true : false;
    }

    public function validatingMachineNumber($machineNumber): bool
    {
        $this->regularExpression = "/[^\w\-\\d]/";
        return (preg_match($this->regularExpression, $machineNumber)) ? true : false;
    }

    public function validatingNumbers($numbers): bool
    {
        $response = false;
        if (
            $this->validatingSpecialChars($numbers) == false and
            $this->validgAlphabet($numbers) == false and
            $this->validNumbers($numbers)
        ) {
            $response = true;
        }
        return $response;
    }
    private function processName($completeName) : string{
        $searchValue = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú");
        $replaceValue = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
        $nameFormatted = "";

        foreach($completeName as $partName){
            $nameFormatted .= str_replace($searchValue, $replaceValue, $partName);
        }
        
        return $nameFormatted;
    }
    //This function returns true when the complete name has numbers using a Regular expression
    public function validatingCompleteName($completeName): bool
    {   

        $name = $this -> processName($completeName);

        return ($this->validatingSpecialChars($name) or
            $this->validNumbers($name)) ? true : false;
    }

    private function truncateEmail($email): array
    {
        $arrayEmail = str_split($email);
        $leftPart = "";
        $rightPart = "";
        $flagOne = false;
        $flagTwo = false;

        for ($i = 0; $i < count($arrayEmail); $i++) {
            if ($arrayEmail[$i] == "@") {
                $flagOne = true;
                $flagTwo = true;
            }

            if (!$flagOne) {
                $leftPart .= $arrayEmail[$i];
            } else {
                if ($flagTwo == true) {
                    $rightPart .= $arrayEmail[++$i];
                    $flagTwo = false;
                } else {
                    $rightPart .= $arrayEmail[$i];
                }
            }
        }
        return array($leftPart, $rightPart);
    }

    public function validatingEmail($email): bool
    {
        $regularExpressionsLeft = array("/\W/", "/\s/");
        $regularExpressionsRight = array("/[^A-Za-z0-9.]/");

        $flagWrongEmail = false;
        $emailParts = $this->truncateEmail($email);

        foreach ($regularExpressionsLeft as $regexp) {
            if ($flagWrongEmail) {
                break;
            }
            if (preg_match($regexp, $emailParts[0])) {
                $flagWrongEmail = true;
            }
        }

        foreach ($regularExpressionsRight as $regexp) {
            if ($flagWrongEmail) {
                break;
            }
            if (preg_match($regexp, $emailParts[1])) {
                $flagWrongEmail = true;
            }
        }
        return $flagWrongEmail;
    }


    //This function returns true when the password matches with every pattern in the regular expression's array
    public function validatingPassword($password): bool
    {

        $response = true;
        $this->regularExpression = array("/\d/", "/\w/", "/\W/");

        foreach ($this->regularExpression as $expression) {
            if (!preg_match($expression, $password)) {
                $response = false;
                break;
            }
        }

        return $response;
    }
}
