<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 31-Jan-17
 * Time: 9:36 PM
 */

namespace App\WareHouse;

use App\Hobbies\Hobbies;
use App\Message\Message;
use App\Utility\Utility;

class HobbyStore extends Hobbies
{
    public function store()
    {
        if(!empty($this->hobbies)){
            $arrayData = array($this->hobbies);
            $query = "INSERT INTO `propic_tab`(hobbies) VALUES(?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("Successfully Inserted In To Database");
            } else {
                Message::setMessage("Failed to insert into database");
            }
        }else{
            Message::setMessage("Select your Hobbies !");
        }
        Utility::redirect("Hobbies.php");
    }
}