<?php

namespace App\WareHouse;
use App\Birthdate\Birthdate;
use App\Message\Message;
use App\Utility\Utility;
use PDO;
use PDOException;
class BirthdateStore extends Birthdate
{
    public function store(){
        if(!empty($this->name) && !empty($this->birth)){
            $arrayData = array($this->name, $this->birth);
            $query = "INSERT INTO `birthdate`(user,birth) VALUES(?,?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("<div class='success'>Successfully Inserted In To Database</div>");
            } else {
                Message::setMessage("<div class='error'>Failed to insert into database</div>");
            }
        }else {
            Message::setMessage("<div class='error'>Name Or Birth Date Can not be Empty !!</div>");
        }
        Utility::redirect("create.php");
    }
    public function index(){
        $sql = "Select * from `birthdate` where softDelete='No'";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }
    public function view(){
        $sql = "Select * from birthdate where id=".$this->id;
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    }

    public function update(){
        if(!empty($this->name) && !empty($this->birth)){
            $arrayData = array($this->name, $this->birth);
            $query = "UPDATE `birthdate` SET user=?,birth=? WHERE id=".$this->id;
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("<div class='yes'>Successfully Updated</div>");
            } else {
                Message::setMessage("<div class='no'>Failed to Update</div>");
            }
        }else {
            Message::setMessage("<div class='no'>Name Or Date Can not be Empty !!</div>");
        }
        Utility::redirect("Birthdate.php");
    }


    public function trash(){
        $arrayData = array('yes');
        $query = "UPDATE `birthdate` SET `softDelete`=?  WHERE id=".$this->id;
        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($arrayData);
        if ($result) {
            Message::setMessage("<div class='yes'>Added to Trash</div>");
        } else {
            Message::setMessage("<div class='no'>Failed to Trash</div>");
        }
        Utility::redirect("BirthDate.php");
    }


    public function trashList(){
        $sql = "Select * from birthdate where softDelete='Yes'";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }


    public function restore(){
        $arrayData = array('No');
        $query = "UPDATE `birthdate` SET `softDelete`=?  WHERE id=".$this->id;
        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($arrayData);
        if ($result) {
            Message::setMessage("<div class='yes'>Added to List</div>");
        } else {
            Message::setMessage("<div class='no'>Failed to Add</div>");
        }
        Utility::redirect("trashList.php");
    }







    public function indexPaginator($page=1, $Data2view=3){

        $start = (($page-1) * $Data2view);
        if($start<0) $start=0;
        $sql = "SELECT * from birthdate  WHERE softDelete = 'No' LIMIT $start,$Data2view";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }

    public function trashPaginator($page=1, $Data2view=3){

        $start = (($page-1) * $Data2view);
        if($start<0) $start=0;
        $sql = "SELECT * from birthdate  WHERE softDelete = 'Yes' LIMIT $start,$Data2view";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }

}