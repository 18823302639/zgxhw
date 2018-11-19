<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/30
 * Time: 9:18
 * 栏目管理
 */
namespace app\admin\controller;

use app\admin\model\ModelColumn;
use think\Db;
use think\Request;
use think\Controller;
use think\Model;


class AdminColumn extends Controller {

    public function index(){
        return $this->article_list();
    }

    //无限极分类查询
    public function article_sfl(){
        $mc = new ModelColumn();
        $arr = $mc->mar_sfl();
        return $arr;
    }

    //查询栏目
    public function article_list(){
        $arr = $this->article_sfl();
        $this->assign('arr',$arr);
        return $this->fetch('admin/article_list');
    }

    //添加栏目
    public function article_add(){

        $mc = new ModelColumn();

        if(Request::instance()->isPost()){

            $couAdd = $mc->mar_add();

            if($couAdd){

                $this->success('添加栏目成功',url('AdminColumn/article_list'));

            }else{

                $this->error('添加失败');

            }
        }

        $arr = $this->article_sfl();

        $this->assign('arr',$arr);

        return view('admin/article_add');

    }

    //修改栏目
    public function article_upd($col_id=0){

        if(Request::instance()->isPost()){
            $data = input('post.');
//            print_r($data);die;
            $res = Db::table('admincolumn')->where('col_id',$data['col_id'])->update(['col_user'=>$data['col_user']]);
            if($res){
                $this->success('修改成功，正在跳转……',url('AdminColumn/article_list'));
            }else{
                $this->error("修改失败，正在返回");
            }
        }
        $arr = $this->article_sfl();
        $this->assign('arr',$arr);
        $this->assign('col_id',$col_id);
        return $this->fetch("admin/article_upd");

    }

    //删除栏目
    public function article_del($id=0){
        $arr = $this->article_sfl();
        $mc = new ModelColumn();
        $obj = $mc->artice_addel($id,$arr);
        if($obj){
                $this->success('删除成功',url('AdminColumn/article_list'));
        }else{
            $this->error("删除失败");
        }
    }

    //文章管理
    public function article_index(){

        $arr = Db::table('adminarticle')->where('article_flag',0)->select();
        $this->assign('arr',$arr);
        return $this->view->fetch('admin/article_index');

    }

    //添加文章
    public function articles_add(){

        if(Request::instance()->isPost()){
            $data = input('post.');
            print_r($data);die;
            $res = Db::table('adminarticle')->insert($data);
            if($res){
                $this->success("添加成功，正在跳转请稍等……",ulr('article_index'));
            }else{
                $this->error("添加失败，请稍等……");
            }
        }
        $arr = $this->article_sfl();
        $this->assign('arr',$arr);
        return $this->view->fetch('admin/articles_add');
    }



}