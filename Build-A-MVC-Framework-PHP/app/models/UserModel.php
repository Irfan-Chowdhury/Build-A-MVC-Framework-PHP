<?php

//Category =child class
//IModel = parent class

class UserModel extends IModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList($tableCat)  //call from Index.php
    {
        $sql  = "SELECT *FROM $tableCat";
        return $this->db->select($sql);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।
    }

    public function addUser($table,$data)  //call from Index.php
    {
        return $this->db->insert($table,$data);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে। 
    }


    public function userById($tableCat,$categoryId) //call from Index.php
    {
        $sql  = "SELECT *FROM $tableCat WHERE categoryId=:categoryId";
        $data = array(":categoryId" => $categoryId);
        return $this->db->select($sql,$data);  //যেহেতু insertCat function টা Index থেকে কল হচ্ছে সো এই লাইনে return কথাটা লিখতে হবে।
    }


    

    public function userUpdate($table,$data,$cond)
    {
        return $this->db->update($table,$data,$cond);
    }


    public function delUserById($tableUser,$cond)
    {
        return $this->db->delete($tableUser,$cond);
    }
}

?>