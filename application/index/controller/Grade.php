<?php

namespace app\index\controller;

use think\Controller;
//use app\index\model\Teacher;
use think\Request;

class Grade extends Base
{

    protected $db;

    protected function initialize()
    {
        parent::initialize();
        $this->db = new \app\index\model\Grade();
    }

    //班级列表首页
    public function index()
    {
       $gradeList = \app\index\model\Grade::all();

//        $count = count($this->db);
        $count = \app\index\model\Grade::count();
        foreach ($gradeList as $value) {
            $value->teacher = isset($value->teacher->name) ? $value->teacher->name : '<span style="color:red;">未分配</span>';
        }
        $this->assign('title', '班级列表');
        $this->assign('gradeList', $gradeList);
        $this->assign('count', $count);
        return $this->fetch();
    }

    public function show(Request $request)
    {
        //获取到要编辑的班级ID
        $grade_name = $request->param('name');

        //根据ID进行查询
        $result = \app\index\model\Grade::where('name',$grade_name)->find();

        //给当前编辑模板赋值
        $this->assign('grade_info', $result);

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

    //班级编辑首页
    public function edit(Request $request)
    {
        //获取到要编辑的班级ID
        $grade_id = $request->param('id');

        //根据ID进行查询
        $result = \app\index\model\Grade::get($grade_id);

        //关联查询,获取与当前班级对应的教师姓名
//        $result -> teacher = $result -> teacher->name;

        //给当前页面seo变量赋值
        $this->assign('title', '编辑班级');

        //给当前编辑模板赋值
        $this->assign('grade_info', $result);

        //渲染编辑模板
        return $this->fetch('edit');
    }

    //班级编辑
    public function doEdit(Request $request)
    {
        //从提交表单中排除关联字段teacher字段
//        $data = $request -> except('teacher');
        $data = $request->param();  //如果全部获取,提交会提示缺少字段teacher

        //设置更新条件
        $condition = ['id' => $data['id']];

        //更新当前记录
        $result = \app\index\model\Grade::update($data, $condition);

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

    //班级添加界面
    public function add()
    {
        //给模板赋值seo变量
        $this->assign('title', '添加班级');

        //渲染添加模板
        return $this->fetch();
    }

    //添加班级
    public function doAdd(Request $request)
    {
        //从提交表单中获取数据
        $data = $request->param();

        //更新当前记录
        $result = \app\index\model\Grade::create($data);

        //设置返回数据的初始值
        $status = 0;
        $message = '添加失败,请检查';

        //检测更新结果,将结果返回给grade_edit模板中的ajax提交回调处理
        if (true == $result) {
            $status = 1;
            $message = '恭喜, 添加成功~~';
        }

        //自动转为json格式返回
        return ['status' => $status, 'message' => $message];
    }

    //班级删除
    public function delete(Request $request)
    {
        $user_id = $request->param('id');
        \app\index\model\Grade::destroy($user_id);

    }

}