<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 31-Jan-17
 * Time: 11:09 PM
 */

namespace App\Gender;


use App\Model\Database as DB;

class Gender extends DB
{
    public $gender;
    public function setdata($allpostdata = Null)
    {
        if (array_key_exists('Gender', $allpostdata)) {
            $this->gender = $allpostdata['Gender'];
        }
    }
}