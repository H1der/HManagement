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

}
