<?php

//Child

class LoginModel extends IModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userControl($tableUser,$username,$password)
    {
        $sql = "SELECT *FROM $tableUser WHERE username=? AND password=? ";
        return $this->db->affectedRows($sql,$username,$password);
    }

    public function getUserData($tableUser,$username,$password)
    {
        $sql = "SELECT *FROM $tableUser WHERE username=? AND password=? ";
        return $this->db->selectUser($sql,$username,$password);
    }
}

?>