<?php
require_once "../../../vendor/autoload.php";
$objTrash = new\App\WareHouse\BookStore();
$objTrash->setdata($_REQUEST);
$objTrash->trash();