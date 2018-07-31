<?php

namespace app\index\controller;

use app\index\controller\Base;
use \app\index\model\User as UserModel;
use think\Session;

class User extends Base
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
        Session::delete('id');
        Session::delete('name');
        $this->success('退出成功', 'user/login');
    }
}
