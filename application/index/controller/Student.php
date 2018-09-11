<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Student extends Base
{
    //学生列表首页
    public function index()
    {
        //获取所有学生数据
        $studentList = \app\index\model\Student::paginate(5);

        //获取记录数量
        $count = \app\index\model\Student::count();

        //给结果集对象数组中的每个模板对象添加班级关联数据
        foreach ($studentList as $value) {
            $value->grade = $value->grade->name;
        }

        $this->assign('title', '学生列表');
        $this->assign('studentList', $studentList);
        $this->assign('count', $count);
        //todo:批量删除

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

    //学生编辑
    public function edit(Request $request)
    {
        $student_id = $request->param('id');
        $result = \app\index\model\Student::get($student_id);
        //获取关联表:grade数据
        $result->grade = $result->grade->name;


        $this->assign('title', '编辑学生');

        $this->assign('student_info', $result);

        //将班级表中所有数据赋值给当前模板
        $this->assign('gradeList', \app\index\model\Grade::all());

        return $this->fetch();
    }

    //更新学生信息
    public function doEdit(Request $request)
    {
        //获取前端提交过来的表单数据
        $data = $request->param();

        //设置更新条件
        $condition = ['id' => $data['id']];

        //更新当前记录,update必须要有条件,否则不会执行
        $result = \app\index\model\Student::update($data, $condition);

        //设置返回数据给前端ajax处理
        $status = 0;
        $message = '更新失败,请检查';

        //检测更新结果,将结果返回给student_edit模板中的ajax提交回调处理
        if (true == $result) {
            $status = 1;
            $message = '恭喜, 更新成功~~';
        }
        return ['status' => $status, 'message' => $message];
    }

    //学生添加页面
    public function add()
    {
        $this->view->assign('title', '添加学生');

        //将班级表中所有数据赋值给当前模板
        $this->view->assign('gradeList', \app\index\model\Grade::all());

        return $this->view->fetch();
    }

    //学生添加行为
    public function doAdd(Request $request)
    {
        //从提交表单中获取数据
        $data = $request->param();

        //新增学生记录
        $result = \app\index\model\Student::create($data);

        //设置返回数据
        $status = 0;
        $message = '添加失败,请检查';

        //检测更新结果,将结果返回给grade_edit模板中的ajax提交回调处理
        if (true == $result) {
            $status = 1;
            $message = '恭喜, 添加成功~~';
        }
        return ['status' => $status, 'message' => $message];
    }

    //学生删除
    public function delete(Request $request)
    {
        $user_id = $request->param('id');
        \app\index\model\Student::destroy($user_id);
    }
}