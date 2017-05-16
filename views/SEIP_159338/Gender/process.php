<?php
require_once "../../../vendor/autoload.php";
$objGender= new\App\WareHouse\GenderStore();
$objGender->setdata($_POST);
$objGender->store();