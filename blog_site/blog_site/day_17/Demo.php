<?php


require_once 'Example.php';


class Demo extends Example
{
        public $age = 22;
        protected $location = "Farmgate";
        private $mobile = '01686313821';

        public function newOne(){
            $this->addition();
        }

        public function newTwo(){
        echo "In new two";
        }

        public function newThree(){
        echo "In new three";
        }

}