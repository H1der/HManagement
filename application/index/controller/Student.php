<?php

namespace app\index\controller;

use think\Controller;

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

        $this->assign('studentList', $studentList);
        $this->assign('count', $count);

        return $this->fetch();
    }
}