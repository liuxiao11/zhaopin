<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends CommonController {
	
	public function _initialize(){
        parent::_initialize();
	}

    public function index(){
		$this->display();
    }
}
