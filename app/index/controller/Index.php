<?php
namespace app\index\controller;

use app\index\model\Mindex;
use think\Controller;
use think\Session;
use think\Request;
use think\Db;
use think\Model;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    
    /*
     *
     * 模板继承
     */
    public function base(){
        return $this->fetch();
    }

    public function base_the(){
        return $this->fetch();
    }

    //海外公司
    public function register(){
        return $this->fetch();
    }

    //海外商标
    public function for_trade(){
        return $this->fetch();
    }

    //海外专利
    public function for_patent(){
        return $this->fetch();
    }

    //香港公司年审
    public function review(){
        return $this->fetch();
    }

    //香港公司服务
    public function service(){
        return $this->fetch();
    }

    //香港公司年审-审计
    public function audit(){
        return $this->fetch();
    }

    public function aa(){
         $a = '1'; $b = "1998"; $c = 19; echo $a+$b+$c;
    }

    public function cs(){
        var_dump($GLOBALS);
        return $this->fetch();
    }

}
