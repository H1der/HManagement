<?php

namespace app\index\model;


use app\index\validate\Login;
use think\Model;
use think\Validate;

class User extends Model
{

    // 保存自动完成列表
    protected $auto = [
        'delete_time' => NULL,
        'is_delete' => 1, //1:允许删除 0:禁止删除
    ];
    // 新增自动完成列表
    protected $insert = [
        'login_time' => NULL, //新增时登录时间应该为NULL,因为刚创建
    ];
    // 更新自动完成列表
    protected $update = [];
    // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimestamp = true; //自动写入
    // 创建时间字段
    protected $createTime = 'create_time';
    // 更新时间字段
    protected $updateTime = 'update_time';
    // 时间字段取出后的默认时间格式
    protected $dateFormat = 'Y/m/d';

    //数据表中角色字段:role返回值处理
    public function getRoleAttr($value)
    {
        $role = [
            0 => '管理员',
            1 => '超级管理员'
        ];
        return $role[$value];
    }

    //状态字段:status返回值处理
    public function getStatusAttr($value)
    {
        $status = [
            0 => '已停用',
            1 => '已启用'
        ];
        return $status[$value];
    }

    //密码修改器
    public function setPasswordAttr($value)
    {
        return md5($value);
    }

    //登录时间获取器
    public function getLoginTimeAttr($value)
    {
        return date('Y/m/d H:i', $value);
    }

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

        session('user_id', $user['id']);
        session('user_info', $user->getData());


        return ['valid' => 1, 'msg' => '登陆成功'];

    }
}