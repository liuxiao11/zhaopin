<?php
namespace Admin\Services;
use Admin\Services\CommonServices;
class IndexServices extends CommonServices{
    public function _initialize(){
        parent::_initialize();
    }

    //把节点按照层级重新编辑
    public function editor_rules($rule_list){
        $key_rule_list = [];
        foreach($rule_list as $k=>$v){
            $key_rule_list[$v['id']] = $v;
        }

        foreach($key_rule_list as $k=>$v){
            if($v['level'] == 4){
                $key_rule_list[$v['pid']]['children_four'][] = $v;
                unset($key_rule_list[$k]);
            }
        }

        foreach($key_rule_list as $k=>$v){
            if($v['level'] == 3){
                $key_rule_list[$v['pid']]['children_three'][] = $v;
                unset($key_rule_list[$k]);
            }
        }

        foreach($key_rule_list as $k=>$v){
            if($v['level'] == 2){
                $key_rule_list[$v['pid']]['children_two'][] = $v;
                unset($key_rule_list[$k]);
            }
        }

        return $key_rule_list;
    }
}

