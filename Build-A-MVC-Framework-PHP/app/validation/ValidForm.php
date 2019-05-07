<?php
//Form Validation

class ValidForm
{
    public $currentValue;
    public $values = array();
    public $errors = array();


    public function __construct()
    {
        
    }


    public function post($key)
    {
        $this->values[$key]= trim($_POST[$key]);
        $this->currentValue = $key;
        return $this;
    }

    public function isEmpty()
    {
        if (empty($this->values[$this->currentValue])) 
        {
            $this->errors[$this->currentValue]['empty']= "Feild Must not be Empty" ;
        }
        return $this;
    }

    public function isCatEmpty()
    {
        if ($this->values[$this->currentValue]==0) 
        {
            $this->errors[$this->currentValue]['empty']= "Feild Must not be Empty" ;
        }
        return $this;
    }

    public function length($min , $max)
    {
        if (strlen($this->values[$this->currentValue]) < $min  OR strlen($this->values[$this->currentValue]) > $max ) 
        {
            $this->errors[$this->currentValue]['length'] = "Shold minimunm length ".$min." and maximum length ".$max;
        }
        return $this;
    }


    public function submit()
    {
        if (empty($this->errors)) //যদি উপরের empty feild গুলা সত্য হয় তাহলে return true হবে 
        {
            return true;
        }
        else {
            return false;
        }
    }



}



?>