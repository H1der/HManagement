<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Student extends Controller
{
//    学生列表首页
    public function index()
    {
        //获取所有学生数据
        $studentList = \app\index\model\Student::paginate(5);

        //获取记录数量
        $count = \app\index\model\Student::count();

        //给结果集对象数组中的每个模板对象添加班级关联数据,非常重要
        foreach ($studentList as $value) {
            $value->grade = $value->grade->name;
        }

        $this->assign('title', '学生列表');
        $this->assign('studentList', $studentList);
        $this->assign('count', $count);

        return $this->fetch();
    }

    //学生状态变更
    public function setStatus(Request $request)
    {
        $student_id = $request->param('id');
        $result = \app\index\model\Student::get($student_id);

        if ($result->getData('status') == 1) {
            \app\index\model\Student::update(['status' => 0], ['id' => $student_id]);
        } else {
            \app\index\model\Student::update(['status' => 1], ['id' => $student_id]);
        }
    }
}