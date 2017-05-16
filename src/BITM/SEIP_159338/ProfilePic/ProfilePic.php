<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 31-Jan-17
 * Time: 1:59 PM
 */

namespace App\ProfilePic;
use \App\Model\Database as DB;

class ProfilePic extends DB
{
    public $ProPic;
    public function setdata($allpostdata = Null)
    {
        if (array_key_exists('Propic', $allpostdata)) {
            $this->ProPic = $allpostdata['Propic'];
        }
    }
}

