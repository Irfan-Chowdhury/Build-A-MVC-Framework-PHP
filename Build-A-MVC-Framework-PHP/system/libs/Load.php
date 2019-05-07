<?php

class Load
{
    function __construct()
    {
         
    }

    public function view($fileName , $data = false)
    {
        if ($data == true) 
        {
            extract($data);
        }
        include 'app/views/'.$fileName.'.php';
    }

    public function model($modelName)
    {
        include 'app/models/'.$modelName.'.php';
        return new $modelName();
        //new CatModel();
    }


    public function validation($validationName)
    {
        include 'app/validation/'.$validationName.'.php';
        return new $validationName();
        //new CatModel();
    }
}

?>