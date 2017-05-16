<?php
require_once "../../../vendor/autoload.php";
$objRestore= new \App\WareHouse\BookStore();
$objRestore->setdata($_REQUEST);
$objRestore->restore();