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

    //海外公司
    public function register(){
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
