<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
class Verify{
    // Verification rules
    private $notEmpty;
    private $minLength;
    private $maxLength;
    private $aString;
    private $aNumber;
    private $isPassVerification = true;
    private $sanitizedInput;

    public function __construct($notEmpty, $minLength, $maxLength, $aString, $aNumber){
        $this->notEmpty = $notEmpty;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->aString = $aString;
        $this->aNumber = $aNumber;
    }
    
    public function verify($inputToVerify){
        // Sanitize user input
        $this->sanitizedInput = $this->sanitize($inputToVerify);

        // Run through all of the available filters
        $this->isNotEmpty()->isMinLength()->isMaxLength()->isANumber()->isAString();

        // Return whether user input pass all verification parameters
        return $this->isPassVerification;
    }

    private function isNotEmpty(){
        // Check whether check for empty is active
        if($this->notEmpty == true){
            // Check whether user input is empty
            if(empty($this->sanitizedInput)||$this->sanitizedInput == null){
                $this->isPassVerification = false;
            }
        }
        d($this->isPassVerification);

        return $this;
    }

    private function isMinLength(){
        // Check whether check for empty is active
        if($this->minLength == true){
            // Check whether user input is empty - Iz,caninacanteen@gmail.com: PS: THIS CHECK IS REDUNDANT, FIND A WAY TO ALLOW METHOD CHAINING WHILE STILL ALLOWING NON CONFORMING USER INPUT TO EXIT PROPERLY
            if(empty($this->sanitizedInput)||$this->sanitizedInput == null){
                $this->isPassVerification = false;
            }else{
                // Check whether user input is over the minimum length
                if(strlen($this->sanitizedInput)<$this->minLength){
                    $this->isPassVerification = false;
                }
            }
        }
        d($this->isPassVerification);
        
        return $this;
    }

    private function isMaxLength(){
        // Check whether check for empty is active
        if($this->maxLength == true){
            // Check whether user input is empty - Iz,caninacanteen@gmail.com: PS: THIS CHECK IS REDUNDANT, FIND A WAY TO ALLOW METHOD CHAINING WHILE STILL ALLOWING NON CONFORMING USER INPUT TO EXIT PROPERLY
            if(empty($this->sanitizedInput)||$this->sanitizedInput == null){
                $this->isPassVerification = false;
            }else{
                // Check whether user input is over the minimum length
                if(strlen($this->sanitizedInput)>=$this->maxLength){
                    $this->isPassVerification = false;
                }
            }
        }
        d($this->isPassVerification);
        
        return $this;
    }

    private function isAString(){
        // Check whether check for empty is active
        if($this->aString == true){
            // Check whether user input is empty - Iz,caninacanteen@gmail.com: PS: THIS CHECK IS REDUNDANT, FIND A WAY TO ALLOW METHOD CHAINING WHILE STILL ALLOWING NON CONFORMING USER INPUT TO EXIT PROPERLY
            if(empty($this->sanitizedInput)||$this->sanitizedInput == null){
                $this->isPassVerification = false;
            }else{
                // Check whether user input is of the type string
                if(!ctype_alpha($this->sanitizedInput)){
                    $this->isPassVerification = false;
                }
            }
        }
        d($this->isPassVerification);
        
        return $this;        
    }

    private function isANumber(){
        // Check whether check for empty is active
        if($this->aNumber == true){
            // Check whether user input is empty - Iz,caninacanteen@gmail.com: PS: THIS CHECK IS REDUNDANT, FIND A WAY TO ALLOW METHOD CHAINING WHILE STILL ALLOWING NON CONFORMING USER INPUT TO EXIT PROPERLY
            if(empty($this->sanitizedInput)||$this->sanitizedInput == null){
                $this->isPassVerification = false;
            }else{
                // Check whether user input is of the type number
                if(!preg_match('/^\d+(\.\d+)?$/', $this->sanitizedInput)){
                    $this->isPassVerification = false;
                }
            }
        }
        d($this->isPassVerification);
        
        return $this;                
    }

    private function sanitize($inputToVerify){
        // Remove any HTML tags from the input
        $filtered = strip_tags($inputToVerify);
        // Convert any special characters to HTML entities
        $filtered = htmlspecialchars($filtered, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Return the sanitized input
        d($filtered);
        return $filtered;
    }
}

class VerificationRulesBuilder{
    private $notEmpty;
    private $minLength;
    private $maxLength;
    private $aString;
    private $aNumber;

    // Public constructor
    public function __construct($notEmpty, $minLength, $maxLength, $aNumber){
        $this->notEmpty = $notEmpty;
        $this->aNumber = $aNumber;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }
    
    // Private static constructor for cloning
    private static function createClone($notEmpty, $minLength, $maxLength, $aNumber){
        return new self($notEmpty, $minLength, $maxLength, $aNumber);
    }

    // Public constructor for public instansiation
    public static function createNew(){
        return new self(null, null, null, null);
    }

    public function setIsNotEmpty(){
        $this->notEmpty = true;
        return $this;
    }

    public function setMinLength($minLength){
        $this->minLength = $minLength;
        return $this;
    }

    public function setMaxLength($maxLength){
        $this->maxLength = $maxLength;
        return $this;
    }

    public function isAString(){
        $this->aString = true;
        return $this;
    }

    public function isANumber(){
        $this->aNumber = true;
        return $this;
    }

    public function build(){
        return new Verify($this->notEmpty, $this->minLength, $this->maxLength, $this->aString, $this->aNumber);
    }

    public function clone(){
        return VerificationRulesBuilder::createClone($this->notEmpty, $this->minLength, $this->maxLength, $this->aString);
    }
}
?>