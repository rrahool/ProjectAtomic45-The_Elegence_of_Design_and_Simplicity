<?php
require_once "../../../vendor/autoload.php";
$objRestore= new \App\WareHouse\BirthdateStore();
$objRestore->setdata($_REQUEST);
$objRestore->restore();