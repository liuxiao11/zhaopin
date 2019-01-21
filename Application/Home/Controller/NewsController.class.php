<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController {
    private $_pageNum = 10;
    public function _initialize(){

    }

    //资讯列表
    public function lists(){
        $get = I('get.');
        if(!$get['type']){
            $get['type'] = key($this->news_type);
        }

        $params = [];
        $params['type'] = $get['type'];

        //分页
        $count=M('news')
            ->where($params)
            ->count();
        $page = $this->Tpage($count,$this->_pageNum);
        $this->assign('page',$page);
        //end

        $news_list = M('news')
            ->field('id,title,description,author,img,create_time')
            ->where($params)
            ->page($page['page'])
            ->order('id desc')
            ->select();

        $this->assign('news_type',$this->news_type);
        $this->assign('news_list',$news_list);
        $this->assign('get',$get);
        $this->display();
    }

    //资讯详情
    public function show(){
        $get = I('get.');
        $news_info = M('news')
            ->field('id,type,title,description,keywords,author,content,create_time')
            ->find($get['id']);

        $this->assign('news_type',$this->news_type);
        $this->assign('news_info',$news_info);
        $this->assign('get',$get);
        $this->display();
    }
}
