<?php
require_once("../../../vendor/autoload.php");

use App\WareHouse\BookStore;
use App\Message\Message;
use App\Utility\Utility;


if(isset($_POST['mark'])) {

$objBookTitle= new BookStore();


$objBookTitle->trashMultiple($_POST['mark']);
    Utility::redirect("trashList.php?Page=1");
}
else
{
    Message::message("Empty Selection! Please select some records.");
    Utility::redirect("BookList.php");
}