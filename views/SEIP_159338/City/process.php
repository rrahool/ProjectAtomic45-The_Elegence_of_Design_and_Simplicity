<?php
require_once "../../../vendor/autoload.php";
$objCity = new\App\WareHouse\CityStore();
$objCity->setdata($_POST);
$objCity->store();