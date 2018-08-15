<?php

namespace app\index\controller;

use think\Controller;
use \app\index\model\User as UserModel;
use think\Session;

class User extends Controller
{
    public function login()
    {
        if (request()->isPost()) {
            $res = (new UserModel())->login(input('post.'));
            if ($res['valid']) {
                $this->success($res['msg'], 'index/index');
            } else {
                $this->error($res['msg']);
                exit;
            }
        }



        return $this->fetch();
    }


    public function logout()
    {
        //注销
        Session::delete('user_id');
        Session::delete('user_info');
        $this->success('退出成功', 'user/login');
    }

    public function index()
    {
        $this->assign('title', '管理员列表');

        $count = UserModel::count();

        //判断当前是不是admin用户
        //先通过session获取到用户登陆名
        $userName = Session::get('user_info.name');
        if ($userName == 'admin') {
            $list = UserModel::all();  //admin用户可以查看所有记录,数据要经过模型获取器处理
        } else {
            //为了共用列表模板,使用了all(),其实这里用get()符合逻辑,但有时也要变通
            //非admin只能看自己信息,数据要经过模型获取器处理
            $list = UserModel::all(['name' => $userName]);
        }


        $this->assign('list', $list);
        $this->assign('count',$count);
        //渲染管理员列表模板
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }

}
