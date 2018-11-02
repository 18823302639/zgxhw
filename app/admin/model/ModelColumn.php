<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 9:54
 * 栏目管理
 */
namespace app\admin\model;
use think\Model;
use think\Db;

class ModelColumn extends Model
{
    //前置操作
    protected $beforeActionList = [
        ['sele'] => ['only'=>'artice_adupd,artice_addel'],
    ];

    //前置查询
    public function sele(){
        $arr = Db::table('admincolumn')->select();
        return $arr;
    }

    //添加栏目
    public function mar_add(){
        $data = input('post.');
        $res = Db::table('admincolumn')->insert($data);
        return $res;
    }

    //查询栏目
    public function mse(){

            $arr = Db::table('admincolumn')->select();
            return $this->sele($arr);
    }

    public function sele($arr,$pid=0,$laver=0){
        static $data = array();
        foreach($arr as $key=>$val){

            if($val['col_pid'] == $pid ){
                $val['laver'] = $laver;
                $data[] = $val;

                $this->sele($arr,$val['col_id'],$laver+1);
            }
        }
        return $data;

    }
    
    //修改栏目
    public function artice_adupd(){

    }

    //删除栏目
    public function artice_addel($id){

    }



}