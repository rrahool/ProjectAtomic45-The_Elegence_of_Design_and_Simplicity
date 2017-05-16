<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 01-Feb-17
 * Time: 2:21 AM
 */

namespace App\WareHouse;


use App\Email\Email;
use App\Message\Message;
use App\Utility\Utility;

class EmailStore extends Email
{
    public function store()
    {
        if(!empty($this->mail)){
            $arrayData = array($this->mail);
            $query = "INSERT INTO `propic_tab`(mail) VALUES(?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("Successfully Inserted In To Database");
            } else {
                Message::setMessage("Failed to insert into database");
            }
        }else{
            Message::setMessage("Email Cannot be Empty");
        }
        Utility::redirect("Email.php");
    }
}