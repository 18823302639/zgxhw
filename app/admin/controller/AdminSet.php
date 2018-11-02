<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 17:34
 * 管理员设置
 */
namespace app\admin\Controller;

use think\Controller;
use think\Session;
use think\Request;
use think\Db;
use think\Model;

class AdminSet extends Controller
{


    //查看管理员
    public function admin_list(){
        return $this->fetch('admin/admin_list');
    }

    //添加管理员
    public function admin_add(){
        if(Request::instance()->isPost()){
            $data = input('post.');
            $res = Db::table('adminuser')->insert($data);
            if($res){
                $this->success('添加成功',url('admin/admin_list'));
            }else{
                $this->error('添加失败');
            }
        }

        return $this->fetch('admin/admin_add');
    }


}