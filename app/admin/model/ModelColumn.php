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

    //添加栏目
    public function mar_add(){
        $data = input('post.');
        $res = Db::table('admincolumn')->insert($data);
        return $res;

    }

    //查询全部栏目/文章
    public function mar_sel($table){
       $arr = Db::table($table)->select();

        return $arr;
    }


    //无限极分类查询
    public function mar_sfl($arr=[],$id=0,$lavaer=0){
        $arr1 = $this->mar_sel(admincolumn);
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

    //删除栏目
    public function artice_addel($id,$arr){
        var_dump($id);
        $obj = Db::table('admincolumn')->where('col_pid',$id)->select();
        if($obj){
            static $res = null;
            foreach($arr as $key=>$val){
                if($val['col_pid'] == $id ){
                    $res[] = Db::table('admincolumn')->where('col_pid',$id)->delete();
                    $this->artice_addel($val['col_id'],$arr);
                }
            }
        }

        $are = Db::table('admincolumn')->where('col_id',$id)->delete();
        return $are;

    }


    //查询全部文章
    public function articles_adsels(){
        $arr = Db::table('adminarticle')->select();
        return $arr;
    }


    //查询单条文章信息
    public function articles_adsel(){
        $res = Db::table('adminarticle')->where("article_id",$article_id)->find();
        return $res;
    }


}