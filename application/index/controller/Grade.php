<?php

namespace app\index\controller;

use think\Controller;
//use app\index\model\Teacher;
use think\Request;

class Grade extends Controller
{

    protected $db;

    protected function initialize()
    {
        parent::initialize();
        $this->db = new \app\index\model\Grade();
    }

    public function index()
    {
        $gradeList = db('grade')->select();
        $count = count($this->db);
        $this->assign('count', $count);
        $this->assign('gradeList', $gradeList);
        return $this->fetch();
    }

    //班级状态变更
    public function setStatus(Request $request)
    {
        //获取当前的班级ID
        $grade_id = $request->param('id');

        //查询
        $result = \app\index\model\Grade::get($grade_id);

        //启用和禁用处理
        if ($result->getData('status') == 1) {
            \app\index\model\Grade::update(['status' => 0], ['id' => $grade_id]);
        } else {
            \app\index\model\Grade::update(['status' => 1], ['id' => $grade_id]);
        }
    }

}