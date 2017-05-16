<?php
require_once"../../../vendor/autoload.php";
use App\WareHouse\BookStore;
$objBookStore = new BookStore();
$objBookStore->setdata($_POST);
$objBookStore->store();