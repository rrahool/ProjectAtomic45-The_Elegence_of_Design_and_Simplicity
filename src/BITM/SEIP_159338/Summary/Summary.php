<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 01-Feb-17
 * Time: 2:32 AM
 */

namespace App\Summary;


use App\Model\Database as DB;

class Summary extends DB
{
    public $summary;
    public function setdata($allpostdata=null){
        if(array_key_exists('summary',$allpostdata)) {
            $this->summary = $allpostdata['summary'];
        }
    }
}