<?php

namespace App\Hobbies;
use \App\Model\Database as DB;
class Hobbies extends DB{
    public $hobbies;
    public function setdata($allpostdata=null){
        if(array_key_exists('hob',$allpostdata)){
            $this->hobbies = implode(', ',$_POST['hob']);
        }
}
}