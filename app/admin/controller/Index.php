<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 14:16
 */
namespace app\index\Controller;


use app\admin\mode\Mindex;
use think\Controller;
use think\Session;
use think\Request;
use think\Db;
use think\Model;


class admin
{

    public function index(){

        return $this->fetch();

    }


}