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


    public function mse(){

        $mod = new ModelColumn;
        $arr = $mod::all();
        return $arr;

    }

    public function mar_add(){

        $data = input('post.');
        $mod = new ModelColumn;
        $res = $mod->save($data);
        return $res;


    }



}