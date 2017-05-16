<?php

namespace App\Model;
use PDO, PDOException;

class Database
{
    public $DBH;
    public function __construct(){
    try{
        $address = "mysql:host=localhost;dbname=myproject";
        $uname = "root";
        $pass = "";
        $this->DBH = new PDO($address,$uname,$pass);
        $this->DBH->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $error){
        echo "DB ERR : $error->getMessage()";
    }
    }
}