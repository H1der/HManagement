<?php

namespace app\index\model;


use app\index\validate\Login;
use think\Model;
use traits\model\SoftDelete;

class Grade extends Model
{
    use SoftDelete;

    //设置当前表默认日期时间显示格式
    protected $dateFormat = 'Y/m/d';

    //定义表中的删除时间字段,来记录删除时间
    protected $deleteTime = 'delete_time';

    // 开启自动写入时间戳
    protected $autoWriteTimestamp = true;

    protected $createTime = 'create_time';

    protected $updateTime = 'update_time';

    // 定义自动完成的属性
    protected $insert = ['status' => 1];

    public function teacher()
    {
        return $this->hasOne('Teacher');
    }

    public function student()
    {
        return $this->hasMany('student');
    }

}
