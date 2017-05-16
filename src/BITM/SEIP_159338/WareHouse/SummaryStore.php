<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 01-Feb-17
 * Time: 2:37 AM
 */

namespace App\WareHouse;


use App\Message\Message;
use App\Summary\Summary;
use App\Utility\Utility;

class SummaryStore extends Summary
{
    public function store(){
        if(!empty($this->summary)){
            $arrayData = array($this->summary);
            $query = "INSERT INTO `propic_tab`(summary) VALUES(?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("Successfully Inserted In To Database");
            } else {
                Message::setMessage("Failed to insert into database");
            }
        }else{
            Message::setMessage("Please Write a Summary!!");
        }
        Utility::redirect("Summary.php");
    }

}