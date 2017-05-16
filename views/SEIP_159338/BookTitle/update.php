<?php
require_once "../../../vendor/autoload.php";
$objUpdate = new\App\WareHouse\BookStore();
$objUpdate->setdata($_REQUEST);
$objUpdate->update();