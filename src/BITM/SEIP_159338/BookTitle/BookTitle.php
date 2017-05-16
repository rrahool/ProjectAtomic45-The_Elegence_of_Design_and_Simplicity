<?php
namespace App\BookTitle;

use \App\Model\Database as DB;

class BookTitle extends DB
{
 public $id;
 public $bookTiltle;
 public $authorName;

     public function setdata($allpostdata = Null){
         if (array_key_exists('id',$allpostdata)){
             $this->id = $allpostdata['id'];
         }
         if (array_key_exists('bookTitle',$allpostdata)){
             $this->bookTiltle = $allpostdata['bookTitle'];
         }
         if (array_key_exists('authorName',$allpostdata)){
             $this->authorName = $allpostdata['authorName'];
         }
     }

}