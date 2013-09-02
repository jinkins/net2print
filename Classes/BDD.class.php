<?php

class BDD extends PDO
{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost;dbname=net2print' , 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

}

?>
