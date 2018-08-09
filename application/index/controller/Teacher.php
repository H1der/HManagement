<?php

namespace app\index\controller;

use think\Controller;

class Teacher extends Controller
{

    protected $db;

    protected function initialize()
    {
        parent::initialize();
        $this->db = new \app\index\model\Teacher();
    }


    //教师列表首页
    public function index()
    {
        $teacherList = db('teacher')->select();
//        $count = count($this->db);
        $count = \app\index\model\Teacher::count();
//        dump($teacherList);
        $this->assign('teacherList', $teacherList);
        $this->assign('count', $count);
        return $this->fetch();
    }
}