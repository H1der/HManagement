<?php

namespace app\index\model;


use app\index\validate\Login;
use think\Model;
use think\Validate;

class User extends Model
{

    public function login($data)
    {
        $validate = new Validate(
            [
                'name' => 'require',
                'password' => 'require',
                'verify' => 'require|captcha',
            ],
            [
                'name.require' => '请输入用户名',
                'password.require' => '请输入密码',
                'verify.require' => '请输入验证码',
                'verify.captcha' => '验证码不正确',
            ]
        );

        if (!$validate->check($data)) {
            return ['valid' => 0, 'msg' => $validate->getError()];
        }

        //对比用户名和密码是否正确
        $user = $this->where('name', $data['name'])->where('password', md5($data['password']))->find();

        //登陆失败
        if (!$user) {
            return ['valid' => 0, 'msg' => '用户名或密码错误'];
        }

        $user->setInc('login_count');

        session('user_id', $user['id']);
        session('user_info', $user->getData());



        return ['valid' => 1, 'msg' => '登陆成功'];

    }
}