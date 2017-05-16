<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 31-Jan-17
 * Time: 11:11 PM
 */

namespace App\WareHouse;

use App\Message\Message;
use App\Utility\Utility;
use App\Gender\Gender;

class GenderStore extends Gender
{
    public function store()
    {
        if(!empty($this->gender)){
            $arrayData = array($this->gender);
            $query = "INSERT INTO `propic_tab`(gender) VALUES(?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("Successfully Inserted In To Database");
            } else {
                Message::setMessage("Failed to insert into database");
            }
        }else{
            Message::setMessage("Gender Can not be Empty!");
        }
        Utility::redirect("Gender.php");
    }
}