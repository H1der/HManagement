<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

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

    //教师状态变更
    public function setStatus(Request $request)
    {
        //获取当前的班级ID
        $teacher_id = $request->param('id');

        //查询
        $result = \app\index\model\Teacher::get($teacher_id);

        //启用和禁用处理
        if ($result->getData('status') == 1) {
            \app\index\model\Teacher::update(['status' => 0], ['id' => $teacher_id]);
        } else {
            \app\index\model\Teacher::update(['status' => 1], ['id' => $teacher_id]);
        }
    }
}