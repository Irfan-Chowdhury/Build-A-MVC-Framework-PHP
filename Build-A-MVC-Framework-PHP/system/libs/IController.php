<?php

//Parent(Main) Contrller


class IController
{
    protected $load = array();

    public function __construct()
    {
        //echo "I am From Parent Controller- (libs/ IController.php) <br>";
        $this->load = new Load();
    }
}

?>