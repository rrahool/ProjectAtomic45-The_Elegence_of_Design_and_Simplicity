<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;
use App\Utility\Utility;
use App\WareHouse\BookStore;

if(isset($_POST['mark'])) {

    $objBookTitle = new BookStore();
    $objBookTitle->recoverMultiple($_POST['mark']);

    Utility::redirect("BookList.php?Page=1");
}
else
{
    Message::message("Empty Selection! Please select some records.");
    Utility::redirect("trashList.php");

}