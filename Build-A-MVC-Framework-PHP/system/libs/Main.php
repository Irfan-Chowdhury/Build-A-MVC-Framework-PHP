<?php

// ==================== মূলত নিচের এই প্রসেসের উপর ভিত্তি করেই বাকি কাজ গুলা করা হয়েছে  ===================================
/*
    $url =isset($_GET['url']) ? $_GET['url'] : NULL ;
    if ($url !=NULL) 
    {
        $url = rtrim($url, '/');
        $url = explode("/",filter_var($url,FILTER_SANITIZE_URL));
    }
    else{
        unset($url);
    }

    if (isset($url[0])) 
    {
        include_once 'app/controllers/'.$url[0].'.php';
        $controller = new $url[0]();
        if (isset($url[2])) 
        {
            $controller->$url[1]($url[2]); 
        }
        elseif(isset($url[1]))
        {
                $controller->$url[1]();
        }
    }
    else {
        include_once 'app/controllers/Index.php';
        $index = new Index();
        $index->home();
        //$index->category();
    }
*/
// =============================================================================================

class Main 
{
    public $url;
    public $controllerName = "Index";
    public $methodName ="Index";
    public $controllerPath = "app/controllers/";
    public $controller;  //for catch object of ControllerName

    public function __construct()
    {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    public function getUrl()
    {
        $this->url =isset($_GET['url']) ? $_GET['url'] : NULL ;
        if ($this->url !=NULL) 
        {
            $this->url = rtrim($this->url, '/');
            $this->url = explode("/",filter_var($this->url,FILTER_SANITIZE_URL));
        }
        else{
            unset($this->url);
        }
    }




    public function loadController()
    {
        if (!isset($this->url[0])) 
        {
            include $this->controllerPath. $this->controllerName.".php";  //already "" (invated coma) exist in this variable
            $this->controller = new $this->controllerName();  //create a new object and assign it in controller
        }
        else 
        {
            $this->controllerName = $this->url[0];
            $fileName = $this->controllerPath.$this->controllerName.".php";
            if (file_exists($fileName)) 
            {
                include $fileName;
                if (class_exists($this->controllerName)) 
                {
                    $this->controller = new $this->controllerName();
                }
                else 
                {
                    header("Location: ".BASE_URL."/Index");
                }
            }
            else 
            {
                header("Location: ".BASE_URL."/Index");
            }    
        }
    }



    public function callMethod()
    {
        if (isset($this->url[2])) 
        {
            $this->methodName = $this->url[1];
            if (method_exists($this->controller, $this->methodName)) 
            {
                $this->controller->{$this->methodName}($this->url[2]);
            }
            else 
            {
                header("Location: ".BASE_URL."/Index/notFound");
            }
        }
        else 
        {
            if (isset($this->url[1])) 
            {
                $this->methodName = $this->url[1];
                if (method_exists($this->controller, $this->methodName)) 
                {
                    $this->controller->{$this->methodName}();
                }
                else 
                {
                    header("Location: ".BASE_URL."/Index/notFound");
                }
            }
            else 
            {
                if (method_exists($this->controller, $this->methodName)) 
                {
                    $this->controller->{$this->methodName}();
                }
                else 
                {
                    header("Location: ".BASE_URL."/Index/notFound");
                }
            }   
        }
    }
}



?>