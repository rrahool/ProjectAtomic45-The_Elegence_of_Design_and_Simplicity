<?php
require_once"../../../vendor/autoload.php";
use App\WareHouse\PicStore;
$objPicStore= new PicStore();
$objPicStore->setdata($_FILES);
$objPicStore->store();