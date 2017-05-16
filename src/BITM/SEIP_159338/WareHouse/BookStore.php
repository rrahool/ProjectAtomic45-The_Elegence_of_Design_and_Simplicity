<?php

namespace App\WareHouse;
use \App\BookTitle\BookTitle;
use \App\Message\Message;
use \App\Utility\Utility;
use PDO;

class BookStore extends BookTitle
{

    public function store(){
        if(!empty($this->bookTiltle) && !empty($this->authorName)){
            $arrayData = array($this->bookTiltle, $this->authorName);
            $query = "INSERT INTO `book_title`(bookTitle,authorName) VALUES(?,?)";
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("<div class='success'>Successfully Inserted In To Database</div>");
            } else {
                Message::setMessage("<div class='error'>Failed to insert into database</div>");
            }
        }else {
            Message::setMessage("<div class='error'>Book Name Or Author Name Can not be Empty !!</div>");
        }
    Utility::redirect("create.php");
    }
    public function index(){
        $sql = "Select * from book_title where softDelete='No'";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }
    public function view(){
        $sql = "Select * from book_title where id=".$this->id;
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();
    }
    public function update(){
        if(!empty($this->bookTiltle) && !empty($this->authorName)){
            $arrayData = array($this->bookTiltle, $this->authorName);
            $query = "UPDATE `book_title` SET bookTitle=?,authorName=? WHERE id=".$this->id;
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("<div class='yes'>Successfully Updated</div>");
            } else {
                Message::setMessage("<div class='no'>Failed to Update</div>");
            }
        }else {
            Message::setMessage("<div class='no'>Book Name Or Author Name Can not be Empty !!</div>");
        }
        Utility::redirect("BookList.php");
    }
    public function trash(){
            $arrayData = array('yes');
            $query = "UPDATE `book_title` SET `softDelete`=?  WHERE id=".$this->id;
            $STH = $this->DBH->prepare($query);
            $result = $STH->execute($arrayData);
            if ($result) {
                Message::setMessage("<div class='yes'>Added to Trash</div>");
            } else {
                Message::setMessage("<div class='no'>Failed to Trash</div>");
            }
        Utility::redirect("BookList.php");
    }
    public function trashList(){
        $sql = "Select * from book_title where softDelete='Yes'";
        $STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
    }
    public function restore(){
        $arrayData = array('No');
        $query = "UPDATE `book_title` SET `softDelete`=?  WHERE id=".$this->id;
        $STH = $this->DBH->prepare($query);
        $result = $STH->execute($arrayData);
        if ($result) {
            Message::setMessage("<div class='yes'>Added to Book Store</div>");
        } else {
            Message::setMessage("<div class='no'>Failed to Add</div>");
        }
        Utility::redirect("trashList.php");
    }
    public function Delete(){
        $query = "DELETE FROM `book_title` WHERE id=".$this->id;
        $result = $this->DBH->exec($query);
        if ($result) {
            Message::setMessage("<div class='yes'>Removed Permanently</div>");
        } else {
            Message::setMessage("<div class='no'>Failed to Remove</div>");
        }
        Utility::redirect("trashList.php");
    }
    public function indexPaginator($page=1, $DataPerPage=3){

            $start = (($page-1) * $DataPerPage);
            if($start<0) $start=0;
            $sql = "SELECT * from book_title  WHERE softDelete = 'No' LIMIT $start,$DataPerPage";

            $STH = $this->DBH->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $arrSomeData  = $STH->fetchAll();
            return $arrSomeData;
    }

    public function trashPaginator($page=1, $DataPerPage=3){

        $start = (($page-1) * $DataPerPage);
        if($start<0) $start=0;
        $sql = "SELECT * from book_title  WHERE softDelete = 'Yes' LIMIT $start,$DataPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;
    }

    public function listSelectedData($selectedIDs){

        foreach($selectedIDs as $id){

            $sql = "Select * from book_title  WHERE id=".$id;


            $STH = $this->DBH->query($sql);

            $STH->setFetchMode(PDO::FETCH_OBJ);

            $someData[]  = $STH->fetch();


        }


        return $someData;


    }



    public function search($requestArray){
        $sql = "";
        if(isset($requestArray['byTitle']) && !isset($requestArray['byAuthor']) ) $sql = "SELECT * FROM `book_title` WHERE `softDelete` ='No' || `bookTitle` LIKE '%".$requestArray['search']."%'";
        if(!isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `book_title` WHERE `softDelete` ='No' AND `authorName` LIKE '%".$requestArray['search']."%'";
        if( isset($requestArray['byTitle']) && isset($requestArray['byAuthor']) )  $sql = "SELECT * FROM `book_title` WHERE `softDelete` ='No' AND (`bookTitle` LIKE '%".$requestArray['search']."%' AND `authorName` LIKE '%".$requestArray['search']."%')";

        $STH  = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $Data2view = $STH->fetchAll();

        return $Data2view;

    }// end of search()





    public function getAllKeywords()
    {
        $_allKeywords = array();
        $WordsArr = array();

        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->bookTitle);
        }

        $allData = $this->index();


        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->bookTitle);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);

            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end




        // for each search field block start
        $allData = $this->index();

        foreach ($allData as $oneData) {
            $_allKeywords[] = trim($oneData->authorName);
        }
        $allData = $this->index();

        foreach ($allData as $oneData) {

            $eachString= strip_tags($oneData->authorName);
            $eachString=trim( $eachString);
            $eachString= preg_replace( "/\r|\n/", " ", $eachString);
            $eachString= str_replace("&nbsp;","",  $eachString);
            $WordsArr = explode(" ", $eachString);

            foreach ($WordsArr as $eachWord){
                $_allKeywords[] = trim($eachWord);
            }
        }
        // for each search field block end


        return array_unique($_allKeywords);


    }// get all keywords

    public function trashMultiple($selectedIDsArray){


        foreach($selectedIDsArray as $id){


            $sql = "UPDATE  book_title SET softDelete='Yes' WHERE id=".$id;

            $result = $this->DBH->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("<div class='yes'>Selected datas trashed successfully</div>");
        else
            Message::message("<div class='no'>Failed! couldn't trash datas</div>");


        Utility::redirect('trashList.php?Page=1');


    }


    public function recoverMultiple($markArray){


        foreach($markArray as $id){

            $sql = "UPDATE  book_title SET softDelete='No' WHERE id=".$id;

            $result = $this->DBH->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("<div class='yes'>Seleted has been Datas Recovered </div>");
        else
            Message::message("<div class='no'>Failed! Datas couldn't recover</div>");


        Utility::redirect('BookList.php');


    }



    public function deleteMultiple($selectedIDsArray){


        foreach($selectedIDsArray as $id){

            $sql = "Delete from book_title  WHERE id=".$id;

            $result = $this->DBH->exec($sql);

            if(!$result) break;

        }



        if($result)
            Message::message("<div class='yes'>Success! All Seleted Data Has Been  Deleted Successfully :)</div>");
        else
            Message::message("<div class='yes'> Failed! All Selected Data Has Not Been Deleted  :(</div>");


        Utility::redirect('BookList.php');


    }

}
