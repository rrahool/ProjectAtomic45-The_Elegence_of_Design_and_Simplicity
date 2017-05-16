<?php
require_once"../../../vendor/autoload.php";
$objHobbies= new\App\WareHouse\HobbyStore();
$objHobbies->setdata($_POST);
$objHobbies->store();
