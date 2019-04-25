<?php
/**
 * Created by PhpStorm.
 * User: 5000 Series
 * Date: 1/14/2019
 * Time: 8:52 PM
 */

class Example
{
    public $name = 'Rafiqul Islam';
    protected $city = 'Dhaka';
    private $country = 'Bangladesh';
    private $value;


    public function __construct()
    {

    }

    public function addition(){
        echo "BITM";
    }
    protected function subtraction(){
        echo $this->value;
    }
    private function division(){
        echo $this->value;
    }
}