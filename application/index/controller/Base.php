<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();
        define('ID', Session::get('user_id'));

        if (!session('user_id')) {
            $this->error('用户未登陆', url('user/login'));
        }
    }


}
