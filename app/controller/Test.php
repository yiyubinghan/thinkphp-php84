<?php

namespace app\controller;

use app\BaseController;

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
}
