<?php

namespace App\WareHouse;
use App\City\City;
use App\Message\Message;
use App\Utility\Utility;
class CityStore extends City
{
    public function store(){
        if(!empty($this->city)){
            $arrayData = array($this->city);
            $query = "INSERT INTO `propic_tab`(city) VALUES(?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("Successfully Inserted In To Database");
            } else {
                Message::setMessage("Failed to insert into database");
            }
        }else{
            Message::setMessage("City can not be Empty");
        }
        Utility::redirect("City.php");
    }
}