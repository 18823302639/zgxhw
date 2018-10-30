<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 9:18
 * 栏目管理
 */
namespace app\admin\Controller;

use app\admin\model\ModelColumn;
use think\Request;
use think\Controller;
use think\Model;


class AdminColumn extends Controller {

    //查询栏目
    public function article_list(){
        $mc = new ModelColumn();
        $arr = $mc->mse();
//            echo "<pre>";
//        print_r($arr);
        $this->assign("arr",$arr);
        return $this->fetch('admin/article_list');
    }

    //添加栏目
    public function article_add(){
        if(Request::instance()->isPost()){
            $mc = new ModelColumn();
            $couAdd = $mc->mar_add();
            if($couAdd){
                $this->success('添加栏目成功',url('AdminColumn/article_list'));
            }else{
                $this->error('添加失败');
            }
        }
        $mc = new ModelColumn();
        $arr = $mc->mse();
        $this->assign('arr',$arr);
        return view('admin/article_add');

    }

    //修改栏目
    public function article_upd(){


        $this->fetch("admin/article_upd");

    }

    //删除栏目
    public function article_del($id){
        $mc = new ModelColumn();
        $obj = $mc->artice_addel($id);
        if($obj){
            $this->success('删除成功',url('AdminColumn/article_list'));
        }else{
            $this->error("删除失败");
        }
    }



}