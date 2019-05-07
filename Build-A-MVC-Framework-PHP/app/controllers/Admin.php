<?php
//child(Admin) controller

class Admin extends IController
{
    public function __construct()
    {
        parent::__construct();
        Session::checkSession();
        $data = array(); // যেসব লাইনে এটা আছে ওই লাইঙ্গুলা কেটে দিলেও হবে 
    }


    public function Index()  //watch system/Main.php
    {
        $this->home();
    }

    public function home()
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");

        // $data["user"] = array(
        //     "username" => Session::get("username")
        // );
        // $this->load->view("admin/home",$data);
        $this->load->view("admin/home");
        $this->load->view("footer");
    }


    public function addCategory()
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");
        $this->load->view("admin/addcategory");
        $this->load->view("footer");

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

        // header("Location:".BASE_URL."/Admin/categoryList");
        $url= BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }

    public function categoryList()
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");

        $data = array();
        $table = "category";
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['cat'] = $catModel->catList($table);  //cat means= category
        
        $this->load->view("admin/categoryList",$data);
        $this->load->view("footer");

    }

    public function editCategory($categoryId=NULL) //সব ডাটা নিয়ে আসার জন্য & NULL use for free from unnecessary error
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");

        $data = array();
        $table = "category";
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   

        $data = array();
        $data['catById'] = $catModel->catById($table,$categoryId);  //cat means= category
        
        $this->load->view("admin/editCategory",$data);
        $this->load->view("footer");
    }


    public function updateCategory($categoryId=NULL)  //NULL use for free from unnecessary error
    {
        $table = "category";        
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

        $url= BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }

    public function deleteCategory($categoryId=NULL)
    {
        $table = "category";
        $cond  = "categoryId=$categoryId";
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class   
        $result = $catModel->delCatById($table,$cond);

        $msgData = array();
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "Category Deleted Successfully";
        }
        else {
            $msgData['msg'] = "Category Not Deleted ";
        }

        $url= BASE_URL."/Admin/categoryList?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }


    public function addArticle()
    {
        $tableCat ="category";
        $this->load->view("header");
        $this->load->view("admin/sidebar");

        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category

        $this->load->view("admin/addpost",$data);
        $this->load->view("footer");
    }


    public function addNewPost()
    {
        if (!($_POST)) 
        {
            header("Location: ".BASE_URL."/Admin/addArticle");
        }

        $input = $this->load->validation("ValidForm");
        
        $input->post('title')
              ->isEmpty()
              ->length(10,500);
        
        $input->post('content')
              ->isEmpty();

        $input->post('cat')
              ->isCatEmpty();

        if ($input->submit()) 
        {
            $tablePost  ="post";
            $title      = $input->values['title'];
            $content    = $input->values['content'];
            $cat        = $input->values['cat'];
        
            $data  = array(
                'title'      => $title ,
                'content'    => $content, 
                'cat'        => $cat 
            );   
            $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class   
            $result = $postModel->insertPost($tablePost,$data);
            
            $msgData = array();
            if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
            {
                $msgData['msg'] = "Article Added Successfully";
            }
            else {
                $msgData['msg'] = "Article Not Added ";
            }

            // header("Location:".BASE_URL."/Admin/categoryList");
            $url= BASE_URL."/Admin/articlelist?msg=".urlencode(serialize($msgData));
            header("Location:$url");
        }
        else 
        {
            $data["postErrors"] = $input->errors;
            $tableCat ="category";
            $this->load->view("header");
            $this->load->view("admin/sidebar");

            $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
            $data['catlist'] = $catModel->catList($tableCat);  //cat means= category

            $this->load->view("admin/addpost",$data);
            $this->load->view("footer");

        }

        
    }


    public function articleList()
    {
        $tableCat ="category";
        $tablePost="post";

        $this->load->view("header");
        $this->load->view("admin/sidebar");

        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['listPost'] = $postModel->getPostList($tablePost);  //cat means= category

        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category

        $this->load->view("admin/articlelist", $data);
        $this->load->view("footer");
    }

    public function editArticle($postId)
    {
        $this->load->view("header");
        $this->load->view("admin/sidebar");

        $tableCat ="category";
        $tablePost="post";

        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['postbyid'] = $postModel->postById($tablePost, $postId);  //cat means= category

        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category

        $this->load->view("admin/editpost", $data);
        $this->load->view("footer");
    }


    public function updateArticle($postId=NULL)  //NULL use for free from unnecessary error
    {
        $input = $this->load->validation("ValidForm");
        $input->post('title');
        $input->post('content');
        $input->post('cat');
                        
        $title      = $input->values['title'];
        $content    = $input->values['content'];
        $cat        = $input->values['cat'];


        $tablePost  ="post";
        $data  = array(
            'title'      => $title ,
            'content'    => $content, 
            'cat'        => $cat 
        );   
        $cond  = "postId=$postId";

        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class   
        $result = $postModel->updatePost($tablePost,$data,$cond);

        $msgData = array();
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "Article Updated Successfully";
        }
        else {
            $msgData['msg'] = "Article Not Updated ";
        }

        $url= BASE_URL."/Admin/articleList?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }


    public function deleteArticle($postId=NULL)
    {
        $table = "post";
        $cond  = "postId=$postId";
        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class   
        $result = $postModel->delPostById($table,$cond);

        $msgData = array();
        if ($result ==1 )  //execute করা সময় ডাটাবেজের $stmt->execute() হলে 1 হয়, সেটাই এটা।
        {
            $msgData['msg'] = "Article Deleted Successfully";
        }
        else {
            $msgData['msg'] = "Article Not Deleted ";
        }

        $url= BASE_URL."/Admin/articleList?msg=".urlencode(serialize($msgData));
        header("Location:$url");
    }


}


?>