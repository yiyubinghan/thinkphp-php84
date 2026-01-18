<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;

class Test extends BaseController
{
    public function testConcurrency1()
    {
        sleep(10);
        return 1;
    }

    public function testConcurrency2()
    {
        return 2;
    }

    public function testMysql()
    {
        //添加数据
        $admin_insert = Db::name('admin')->insert([
            'username' => 'admin'.time(),
            'password' => md5('123456'),
            'status' => 1
        ]);
        if($admin_insert != 1)
        {
            return 'insert error';
        }

        //查询数据
        $admins = Db::name('admin')->select();

        //返回
        return $admins;
    }
}
