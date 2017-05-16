<?php
require_once "../../../vendor/autoload.php";
$objBirthDate = new\App\WareHouse\BirthdateStore();
$objBirthDate->setdata($_POST);
$objBirthDate->store();