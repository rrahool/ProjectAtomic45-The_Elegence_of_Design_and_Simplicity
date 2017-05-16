<?php

namespace App\WareHouse;
use App\ProfilePic\ProfilePic;
use App\Message\Message;
use App\Utility\Utility;

class PicStore extends ProfilePic
{
    public function store(){
        $image = $_FILES['Propic']['tmp_name'];
        if(!empty($image)) {
            $imgsize    = $_FILES['Propic']['size'];
            if($imgsize<2097152) {
                $path_parts = pathinfo($_FILES["Propic"]["name"]);

                $imagename      = $_FILES['Propic']['name'];
                $allowed =array('jpg','JPEG','PNG');
                $ext = pathinfo($imagename, PATHINFO_EXTENSION);
                if(in_array($ext,$allowed)) {
                    $image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
                    $arrayData = array($image_path);
                    $query = "INSERT INTO `Propic_tab`(imageName) VALUES(?)";
                    $STH = $this->DBH->prepare($query);
                    $result = $STH->execute($arrayData);
                    if ($result) {
                        $target = "img/" . basename($image_path);
                        if (move_uploaded_file($_FILES['Propic']['tmp_name'], $target)) {
                            Message::setMessage("Successfully Inserted In To Database");
                        } else {
                            Message::setMessage("$target");
                        }
                    } else {
                        Message::setMessage("Failed to insert into database");
                    }
                }else{
                    Message::setMessage("File Extension doesnot Support !!!");
                }
            }else{
                Message::setMessage("Image is too big !!!");
            }
        }else{
            Message::setMessage("Upload a pic !!!");
        }
        Utility::redirect("ProPic.php");
    }
}