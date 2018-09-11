<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Teacher extends Base
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
        $teacherList = \app\index\model\Teacher::all();
//        $count = count($this->db);
        $count = \app\index\model\Teacher::count();
//        dump($teacherList);
        $this->assign('title', '教师列表');
        $this->assign('teacherList', $teacherList);
        $this->assign('count', $count);
        //todo:入职时间,学历,负责班级
        //给结果集对象数组中的每个模板对象添加班级关联数据
        foreach ($teacherList as $value) {
            $value->grade = $value->grade->name;
        }
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


    public function show(Request $request)
    {
        //获取到要编辑的班级ID
        $teacher_name = $request->param('name');

        //根据ID进行查询
        $result = \app\index\model\Teacher::where('name',$teacher_name)->find();

        //给当前编辑模板赋值
        $this->assign('teacher_info', $result);

        return $this->fetch();

    }

    //教师编辑
    public function edit(Request $request)
    {
        $teacher_id = $request->param('id');
        $result = \app\index\model\Teacher::get($teacher_id);

        //设置当前页面的seo模板变量
        $this->assign('title', '编辑教师信息');

        //给当前教师编辑页面模板赋值
        $this->assign('teacher_info', $result);
        //将班级表中所有数据赋值给当前模板
        $this->assign('gradeList', \app\index\model\Grade::all());

        //渲染出当前的编辑模板
        return $this->fetch();
    }

    //教师更新
    public function doEdit(Request $request)
    {
        //从提交表单中排除关联字段teacher字段
        $data = $request->except('grade');

        //设置更新条件
        $condition = ['id' => $data['id']];

        //更新当前记录
        $result = \app\index\model\Teacher::update($data, $condition);

        //设置返回数据
        $status = 0;
        $message = '更新失败,请检查';

        //检测更新结果,将结果返回给grade_edit模板中的ajax提交回调处理
        if (true == $result) {
            $status = 1;
            $message = '恭喜, 更新成功~~';
        }
        return ['status' => $status, 'message' => $message];
    }

    //渲染教师添加界面
    public function add()
    {
        $this->assign('title', '添加教师');

        //将班级表中所有数据赋值给当前模板
        $this->assign('gradeList', \app\index\model\Grade::all());

        return $this->fetch();
    }

    //添加教师
    public function doAdd(Request $request)
    {
        //从提交表单中获取数据
        $data = $request->param();

        //向表中新增记录
        $result = \app\index\model\Teacher::create($data);

        //设置返回数据
        $status = 0;
        $message = '添加失败,请检查';

        //检测更新结果,将结果返回给teacher_add模板中的ajax提交回调处理
        if (true == $result) {
            $status = 1;
            $message = '恭喜, 添加成功~~';
        }
        return ['status' => $status, 'message' => $message];
    }

    public function delete(Request $request)
    {
        $user_id = $request->param('id');
        \app\index\model\Teacher::destroy($user_id);
    }
}