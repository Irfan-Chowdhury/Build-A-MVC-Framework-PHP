<?php

class User extends IController
{
    public function __construct()
    {
        parent::__construct();
        $data = array();
    }

    public function Index() //watch system/Main.php
    {
        $this->makeUser();
    }

    public function makeUser()
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");
        $this->load->view("admin/makeuser");
        $this->load->view("footer");
    }

    public function  addNewUser()
    {
        if (!($_POST)) 
        {
            header("Location: ".BASE_URL."/User"); //URL এ যাস্ট User লিখলে সেটা প্রথমে অটোমেটিক্যালি Index->makeUser->addNewUser পেয়ে যাবে... 
        }
        $input = $this->load->validation("ValidForm");
        
        $input->post('username');
        $input->post('password');
        $input->post('level');

        
        $tableUser  ="tbl_user";
        $username   = $input->values['username'];
        $password   = $input->values['password'];
        // $password   = md5($input->values['password']);
        $level      = $input->values['level'];
    
        $data  = array(
            'username' => $username ,
            'password' => $password, 
            'level'    => $level 
        );   
        $userModel = $this->load->model("UserModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $result = $userModel->addUser($tableUser,$data);
        
        $msgData = array();
        
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "User Created Successfully";
        }
        else {
            $msgData['msg'] = "User Not Created ";
        }

        $url= BASE_URL."/User/listUser?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }

    public function listUser()
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");

        
        $table = "tbl_user";
        $userModel = $this->load->model("UserModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['users'] = $userModel->userList($table);  //cat means= category
        
        $this->load->view("admin/userList",$data);
        $this->load->view("footer");
    }


    public function deleteUser($userId=NULL)
    {
        $tableUser = "tbl_user";
        $cond  = "userId=$userId";
        $userModel = $this->load->model("UserModel");  //Create a Object of CatModel class   
        $result = $userModel->delUserById($tableUser,$cond);

        $msgData = array();
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "User Deleted Successfully";
        }
        else {
            $msgData['msg'] = "User Not Deleted ";
        }

        $url= BASE_URL."/User/listUser?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }

}

?>