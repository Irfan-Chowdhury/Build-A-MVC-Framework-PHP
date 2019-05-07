<?php

//PostModel =child class
//IModel = parent class

class PostModel extends IModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPost($table)  //call from Index.php
    {
        $sql  = "SELECT *FROM $table ORDER BY postId DESC limit 3";
        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।
    }
    
    public function getPostList($table)  //call from Index.php
    {
        $sql  = "SELECT *FROM $table ORDER BY postId DESC ";
        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।
    }

    public function getPostById($tablePost,$tableCat,$postId)
    {
        $sql  = "SELECT  $tablePost.* , $tableCat.categoryName 
                FROM $tablePost INNER JOIN $tableCat
                ON $tablePost.cat = $tableCat.categoryId
                WHERE $tablePost.postId= $postId";

        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।        
    }

    public function getPostByCat($tablePost,$tableCat,$cat)
    {
        $sql  = "SELECT  $tablePost.* , $tableCat.categoryName 
                FROM $tablePost INNER JOIN $tableCat
                ON $tablePost.cat = $tableCat.categoryId
                WHERE $tableCat.categoryId= $cat";

        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।        

    }


    public function getLatestPost($table)  //call from Index.php
    {
        $sql  = "SELECT *FROM $table ORDER BY postId DESC limit 5";
        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।
    }
    


    public function getPostBySearch($tablePost,$keyword,$cat)
    {

//this is not working --> // if (empty($keyword) && $cat == 0) {     //0 means no category option selected
                            //     header("Location: ".BASE_URL."/Index/home");
                            // }

        if (isset($keyword) && !empty($keyword)) 
        {
            $sql = "SELECT *FROM $tablePost WHERE title LIKE '%$keyword%' OR 
                    content LIKE '%$keyword%' ";            
        }
        else {
            $sql = " SELECT *FROM $tablePost WHERE cat = $cat ";
        }

        return $this->db->select($sql);
    }


    public function insertPost($tablePost,$data)
    {
        return $this->db->insert($tablePost,$data);
    }

    public function postById($tablePost, $postId)  //call from Index.php
    {
        $sql  = "SELECT *FROM $tablePost WHERE postId = $postId ";
        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।
    }

    public function updatePost($tablePost,$data,$cond)
    {
        return $this->db->update($tablePost,$data,$cond);
    }
    
    public function delPostById($tablePost,$cond)
    {
        return $this->db->delete($tablePost,$cond);
    }
}

?>