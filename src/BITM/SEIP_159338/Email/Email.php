<?php
/**
 * Created by PhpStorm.
 * User: SFT
 * Date: 01-Feb-17
 * Time: 2:16 AM
 */

namespace App\Email;


use App\Model\Database as DB;

class Email extends DB
{
    public $mail;
    public function setdata($allpostdata = null){
        if(array_key_exists('mail',$allpostdata)){
            $this->mail = $allpostdata['mail'];
        }
    }
}