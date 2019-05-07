<?php

//Child Class

class Category extends IController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categoryList()
    {
        $data = array();
        $table = "category";
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['cat'] = $catModel->catList($table);  //cat means= category
        $this->load->view("category",$data);
    }


    public function catById()
    {
        $data = array();
        $table = "category";
        $categoryId =3;
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   
        $data['catbyid'] = $catModel->catById($table,$categoryId);  //cat means= category
        $this->load->view("catbyid",$data);
    }


    public function addCategory()
    {
        $this->load->view("addcategory");
    }


    public function insertCategory() 
    {
        $table = "category";
        
        $categoryName = $_POST['categoryName'];
        $title        = $_POST['title'];
    
        $data  = array(
            'categoryName' => $categoryName,
            'title'        => $title 
        );   
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   
        $result = $catModel->insertCat($table,$data);
        
        $msgData = array();
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "Category Added Successfully";
        }
        else {
            $msgData['msg'] = "Category Not Added ";
        }
        $this->load->view("addcategory",$msgData);
    }


    public function updateCategory()  //সব ডাটা নিয়ে আসার জন্য 
    {
        $table = "category";
        $categoryId =10;
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   

        $data = array();
        $data['catById'] = $catModel->catById($table,$categoryId);  //cat means= category
        $this->load->view("catupdate",$data);
    }


    public function updateCat()
    {
        $table = "category";
        
        $categoryId   = $_POST['categoryId'];
        $categoryName = $_POST['categoryName'];
        $title        = $_POST['title'];
        
        $cond  = "categoryId=$categoryId";
        $data  = array(
            'categoryName' => $categoryName,
            'title'        => $title 
            ); 
        
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   
        $result   = $catModel->catUpdate($table,$data,$cond);

        $msgData = array();
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "Category Updated Successfully";
        }
        else {
            $msgData['msg'] = "Category Not Updated ";
        }
        $this->load->view("catupdate",$msgData);
    }


    public function deleteCatById()
    {
        $table = "category";
        $cond  = "categoryId=14";
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   
        $catModel->delCatById($table,$cond);
    }
}



?>