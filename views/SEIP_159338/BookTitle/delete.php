<?php
require_once "../../../vendor/autoload.php";
$objDel = new\App\WareHouse\BookStore();
$objDel->setdata($_REQUEST);
$objDel->Delete();