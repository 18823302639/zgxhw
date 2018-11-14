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

    //添加数据
    public function mar_add(){
        $data = input('post.');
        $res = Db::table('admincolumn')->insert($data);
        return $res;

    }

    //查询数据
    public function mar_sel(){
       $arr = Db::table('admincolumn')->select();
        return $arr;

    }

    //无限极分类查询
    public function mar_sfl($arr=[],$id=0,$lavaer=0){
        $arr1 = $this->mar_sel();
        static $data = [];
        foreach($arr1 as $key=>$val){

            if($val['col_pid'] == $id ){
                $val['lavaer'] = $lavaer;
                $data[] = $val;
                $this->mar_sfl($arr1,$val['col_id'],$lavaer+1);
            }
        }
        return $data;
    }

    //删除
    public function artice_addel($id,$arr){
        var_dump($id);
//        var_dump($arr);die;
        static $res = [];
        foreach($arr as $key=>$val){
            if($val['col_pid'] == $id ){
                $res = Db::table('admincolumn')->where('col_pid',$id)->delete();
                $this->artice_addel($val['col_id'],$arr);
            }
        }
        return $res;

    }

}