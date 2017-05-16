<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 31-Jan-17
 * Time: 11:33 PM
 */

namespace App\Birthdate;


use App\Model\Database as DB;

class Birthdate extends DB
{
    public $id;
    public $name;
    public $birth;

    public function setdata($allpostdata = Null){
        if (array_key_exists('id',$allpostdata)){
            $this->id = $allpostdata['id'];
        }

        if (array_key_exists('user',$allpostdata)){
            $this->name = $allpostdata['user'];
        }

        if (array_key_exists('date', $allpostdata)) {
            if(!empty($allpostdata['date'])) {
                date_default_timezone_set('Asia/Dhaka');
                $strBirth = strtotime($allpostdata['date']);
                $this->birth = date('Y-m-d', $strBirth);
            }else{
                $strBirth ="";
            }
        }

    }
}