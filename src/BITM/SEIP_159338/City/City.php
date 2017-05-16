<?php
namespace App\City;
use App\Model\Database as DB;

class City extends DB
{
    public $city;
    public function setdata($allpostdat=null){
        if(array_key_exists('city',$allpostdat)){
            $this->city=$allpostdat['city'];
        }
    }
}