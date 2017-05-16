<?php
require_once "../../../vendor/autoload.php";
$objTrash = new\App\WareHouse\BirthdateStore();
$objTrash->setdata($_REQUEST);
$objTrash->trash();