<?php
namespace Home\Controller;
use Think\Controller;
class AjaxController extends CommonController {
    private $city = 'city';
    public function _initialize(){
        parent::_initialize();
    }

    public function get_full_cat(){
        dd(123);
    }
}