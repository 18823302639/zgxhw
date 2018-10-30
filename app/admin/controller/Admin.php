<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29
 * Time: 14:25
 */
namespace app\admin\controller;

//use app\admin\mode\Mindex;
use think\Controller;
use think\Session;
use think\Request;
use think\Db;
use think\Model;

class Admin extends Controller
{


    /*
     *
     * 框架继承
     */
    public function base(){
        return $this->fetch();
    }

    /*
     *首页
     * 获取服务器的资料
     */
    public function index(){
        if(Session::has('name')){
            $arr = array(
                '操作系统'     => PHP_OS,
                '运行环境'     => $_SERVER['SERVER_SOFTWARE'],
                '服务器IP地址' => $_SERVER['SERVER_ADDR'],
                '主机名'       => $_SERVER['SERVER_NAME'],
                '请求的时间戳' => $_SERVER['REQUEST_TIME'],
                '用户的IP地址' => $_SERVER['REMOTE_ADDR'],
                '上传文件限制' => ini_get('upload_max_filesize'),
//            '用户的主机名' => $_SERVER['REMOTE_HOST'],
                '用户链接端口' => $_SERVER['REMOTE_PORT'],
                '运行路径'     => $_SERVER['SCRIPT_FILENAME'],
                'web服务端口'  => $_SERVER['SERVER_PORT'],
                '服务器语言'   => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            );
            $this->assign('arr',$arr);
            return $this->fetch();
        }else{
            $this->error('您还未登陆，请登录',url('admin/login'));
        }

    }


    //登陆
    public function login(){
        if(Request::instance()->isPost()) {
            $data = input('post.');
            $arr = Db::table('adminuser')
                ->field('ad_user,ad_pwd')
                ->where('ad_user', $data['ad_user'])
                ->where('ad_pwd', $data['ad_pwd'])
                ->select();
            if (!empty($arr)) {
                Session::set('name',$data['ad_user']);
                $this->success('登陆成功', url('admin/index'));
            } else {
                $this->error('用户名或者密码错误，请重新登陆');
            }
        }
        return $this->fetch();
    }


}