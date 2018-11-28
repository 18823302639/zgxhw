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

    //查看详细文章内容
    public function articles_select($article_id){

        $res = Db::table('adminarticle')->where('article_id',$article_id)->find();
        $this->assign("res",$res);
        return $this->view->fetch("admin/article_select");

    }

    //修改文章
    public function articles_upd(){

        $mc = new ModelCoulumn();
        $res = $mc->articles_adsel();

    }


    //添加文章
    public function articles_add(){

        if(Request::instance()->isPost()){
            $data = input('post.');

            $file = $data['article_img'];
            //路径
            $filename = $_SERVER['DOCUMENT_ROOT']."/uploads/".date('Ymd') ;
            echo $filename;die;
            if(!file_exists($filename)){
                mkdir($filename,0777,true);
            }
            $file1 = move_uploaded_file($file,$filename);

            if($file1){
                $res = Db::table('adminarticle')->insert($data);
                if($res){
                    $this->success("添加成功，正在跳转请稍等……",url('article_index'));
                }else{
                    $this->error("添加失败，请稍等……");
                }
            }else {
                $this->error("图片上传失败，请重新上传……");
            }



        }
        $arr = $this->article_sfl();
        $this->assign('arr',$arr);
        return $this->view->fetch('admin/articles_add');
    }



}