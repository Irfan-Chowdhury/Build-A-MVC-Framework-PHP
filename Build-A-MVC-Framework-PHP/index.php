<?php

    include_once "app/config/config.php";
    
    spl_autoload_register(function($class){
        include_once "system/libs/".$class.".php";    
    });
        
    $main = new Main();


    // include_once "system/libs/Main.php";
    // include_once "system/libs/IController.php";
    // include_once "system/libs/IModel.php";
    // include_once "system/libs/Database.php";
    // include_once "system/libs/Load.php";

    // $url =isset($_GET['url']) ? $_GET['url'] : NULL ;
    // if ($url !=NULL) 
    // {
    //     $url = rtrim($url, '/');
    //     $url = explode("/",filter_var($url,FILTER_SANITIZE_URL));
    // }
    // else{
    //     unset($url);
    // }

    // if (isset($url[0])) 
    // {
    //     include_once 'app/controllers/'.$url[0].'.php';
    //     $controller = new $url[0]();
    //     if (isset($url[2])) 
    //     {
    //         $controller->$url[1]($url[2]); 
    //     }
    //     elseif(isset($url[1]))
    //     {
    //             $controller->$url[1]();
    //     }
    // }
    // else {
    //     include_once 'app/controllers/Index.php';
    //     $index = new Index();
    //     $index->home();
    //     //$index->category();
    // }
    

?>
