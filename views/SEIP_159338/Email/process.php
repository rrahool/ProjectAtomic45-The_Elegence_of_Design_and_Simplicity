<?php
require_once "../../../vendor/autoload.php";
$objMail= new\App\WareHouse\EmailStore();
$objMail->setdata($_POST);
$objMail->store();