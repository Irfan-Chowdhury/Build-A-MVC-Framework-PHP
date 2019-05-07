<?php

//Database = child class
//PDO  = Parent Class

class Database extends PDO
{
    public function __construct($dsn,$user,$pass)
    {
        parent::__construct($dsn,$user,$pass);
    }


    // **************  S E L E C T **************

    public function select($sql, $data= array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        $stmt  = $this->prepare($sql); //stmt = statement
        foreach ($data as $key => $value) 
        {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll($fetchStyle);
    }

    // **************  I N S E R T **************

    public function insert($table,$data)
    {
        $keys   = implode(", ", array_keys($data));   //array_keys use for recieve table field name from Database
        $values = ":".implode(", :", array_keys($data));

        //$sql = "INSERT INTO $table(categoryName, title) VALUES(:categoryName, :title) ";
        $sql = "INSERT INTO $table($keys) VALUES($values) ";
        $stmt  = $this->prepare($sql);

        foreach ($data as $key => $value) 
        {
            // $stmt->bindParam(":$key", $value);  //for use bindparam categoryName & title will be same
            $stmt->bindValue(":$key", $value);  //for use bindparam categoryName & title will not be same
        }
        
        return $stmt->execute();
    }


    // **************  U P D A T E  **************

    public function update($table,$data,$cond)
    {
        $updateKeys = NULL;
        foreach ($data as $key => $value) 
        {
            $updateKeys .="$key=:$key,";
        }
        $updateKeys =rtrim($updateKeys, ",");  //লাসেটের কমা দেয়া হইছে ডাটাবেজের লাস্ট ফাটা থেকে কমা যেন না থাকে

        //$sql = "UPDATE $table SET name=:name, title=:title WHERE $cond";
        $sql = "UPDATE $table SET $updateKeys WHERE $cond";
        $stmt  = $this->prepare($sql);

        foreach ($data as $key => $value) 
        {
            // $stmt->bindParam(":$key", $value); //for use bindparam categoryName & title will be same
            $stmt->bindValue(":$key", $value);  //for use bindValue categoryName & title will not be same
        }
        return $stmt->execute();
    }


    // **************  D E L E T E **************

    public function delete($table, $cond, $limit=1)
    {
        $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
        return $this->exec($sql);  //execute a special method of PDO
    }  

    
    // **************  Affected Rows **************

    public function affectedRows($sql,$username,$password)
    {
        $stmt = $this->prepare($sql);
        $stmt ->execute(array($username,$password));
        return $stmt->rowCount();  //false হলে 0 এবং  true হলে 1 দেখাবে  
    }


    // **************  S E L E C T    U S E R **************


    public function selectUser($sql,$username,$password)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username,$password));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}

?>