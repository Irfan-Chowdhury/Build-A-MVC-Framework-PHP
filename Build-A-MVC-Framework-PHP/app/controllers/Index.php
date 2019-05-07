<?php  

//child class

class Index extends IController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $this->home();
    }

// ================================================================
                        // Home   
// ================================================================

    public function home()
    {
        $data = array();
        $tablePost = "post";
        $tableCat = "category";
        $this->load->view("header");

//-----------> for Select Option          
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category
        $this->load->view("search",$data);
// -------- X -----

        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['allPost'] = $postModel->getAllPost($tablePost);  //cat means= category
        $this->load->view("content",$data);

//-----------> for Sidebar        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);  //cat means= category
        $this->load->view("sidebar",$data);
// -------- X -----
        $this->load->view("footer");
    }

// ================================================================
                        // postDetails   
// ================================================================
    public function postDetails($postId=NULL)
    {
        $data = array();
        $tablePost ="post";
        $tableCat = "category";
        $this->load->view("header");

//-----------> for Select Option          
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category
        $this->load->view("search",$data);
// -------- X -----

        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['postbyid'] = $postModel->getPostById($tablePost,$tableCat,$postId);        
        $this->load->view("details",$data);

//-----------> for Sidebar        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);  //cat means= category
        $this->load->view("sidebar",$data);
// -------- X -----
        
        $this->load->view("footer");        
    }

// ================================================================
                        // postByCat   
// ================================================================

    public function postByCat($cat=NULL)
    {
        $data = array();
        $tablePost ="post";
        $tableCat = "category";
        $this->load->view("header");

//-----------> for Select Option          
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category
        $this->load->view("search",$data);
// -------- X -----
 
        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['getcat'] = $postModel->getPostByCat($tablePost,$tableCat,$cat);
        $this->load->view("postbycat",$data); 

//-----------> for Sidebar        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);  //cat means= category
        $this->load->view("sidebar",$data);
// -------- X -----

        $this->load->view("footer");
    }

// ================================================================
                        // Search
// ================================================================

    public function search()
    {
        $data = array();
        $keyword= $_REQUEST['keyword'];
        $cat    = $_REQUEST['cat'];

        $tablePost ="post";
        $tableCat = "category";
        $this->load->view("header");

//-----------> for Select Option          
        $catModel = $this->load->model("CatModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['catlist'] = $catModel->catList($tableCat);  //cat means= category
        $this->load->view("search",$data);
// -------- X -----

//-----------> for Search           
        $postModel = $this->load->model("PostModel");  //Create a Object of CatModel class & catch it by $catModel variable   
        $data['postbysearch'] = $postModel->getPostBySearch($tablePost,$keyword,$cat);
        $this->load->view("srcresult",$data); 
// -------- X -----

//-----------> for Sidebar        
        $data['latestPost'] = $postModel->getLatestPost($tablePost);  //cat means= category
        $this->load->view("sidebar",$data);
// -------- X -----

        $this->load->view("footer");
    }



    public function notFound()
    {
        $this->load->view("404");
    }

}



?>