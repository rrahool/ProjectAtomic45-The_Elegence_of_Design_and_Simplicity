<?php
require_once "../../../vendor/autoload.php";
$objSummary = new\App\WareHouse\SummaryStore();
$objSummary->setdata($_POST);
$objSummary->store();