<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    private $news = 'news';
    public function _initialize(){
        parent::_initialize();
    }

    public function index(){
        //获取热门资讯
        $params = [];
        $params['recommend'] = 2;
        $hot_news_list = M($this->news)
            ->field('id,title,description,img')
            ->where($params)
            ->order('create_time desc')
            ->limit(3)
            ->select();

        //最新资讯
        $new_news_list = M($this->news)
            ->field('id,title,description,img,create_time')
            ->order('create_time desc')
            ->limit(8)
            ->select();

        $this->assign('new_news_list',$new_news_list);
        $this->assign('hot_news_list',$hot_news_list);
        $this->display();
    }

    public function publish(){
        $user = session('user');

        $this->assign('user',$user);
        $this->display();
    }
}
