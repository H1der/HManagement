<?php

namespace app\index\model;


use think\Model;

class Teacher extends Model
{
    protected $pk = 'id';
    protected $table = 'teacher';

//设置当前表默认日期时间显示格式
    protected $dateFormat = 'Y/m/d';


    // 开启自动写入时间戳
    protected $autoWriteTimestamp = true;

    protected $createTime = 'create_time';

    protected $updateTime = 'update_time';

    protected $type = [
        'hiredate' => 'timestamp'
    ];

    // 定义自动完成的属性
    protected $insert = ['status' => 1];


    public function getDegreeAttr($value)
    {
        $degree = [
            1 => '专科',
            2 => '本科',
            3 => '研究生'
        ];
        //根据表中数据返回对应值
        return $degree[$value];
    }

    //设置与grade表的反关联
    public function grade()
    {
        // 教师表teacher BELONGS TO 关联班级grade
        return $this->belongsTo('Grade');
    }
}