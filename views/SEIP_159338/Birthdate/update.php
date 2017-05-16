<?php
require_once "../../../vendor/autoload.php";
$objUpdate = new\App\WareHouse\BirthdateStore();
$objUpdate->setdata($_REQUEST);
$objUpdate->update();