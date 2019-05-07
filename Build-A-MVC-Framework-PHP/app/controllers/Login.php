<?php
//child(Login) controller

class Login extends IController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function Index()
    {
        $this->login();
    }

    public function login()
    {   
        Session::checkLogin();  

        $this->load->view("header");
        $this->load->view("Login/login");
        $this->load->view("footer");
    }

    // =============================================================

    public function loginAuth()
    {
        $tableUser = "tbl_user";  
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        $loginModel= $this->load->model("LoginModel");
        $count     = $loginModel->userControl($tableUser,$username,$password); 
        if ($count>0) 
        {
            $result = $loginModel->getUserData($tableUser,$username,$password);
            Session::init();
            Session::set("login", true);
            Session::set("username", $result['0']['username']);
            Session::set("userId", $result['0']['userId']);
            Session::set("level", $result['0']['level']);
            header("Location:".BASE_URL."/Admin");
            // echo $result[0]['username']; // -->টেস্টিং জন্য এরকম লিখলে লগিন বাটনে শঠিকভাবে প্রেস করলে admin লেখাটি ভেসে উঠবে  
        }
        else {
            header("Location:".BASE_URL."/Login");
        }
    }


    // ===============================================
                    // LOG Out
    // ===============================================


    public function logout()
    {
        Session::init();
        Session::destroy();
        header("Location:".BASE_URL."/Login");
    }
}


?>