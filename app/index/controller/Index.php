<?php
namespace app\index\controller;

use app\index\mode\Mindex;
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
}
