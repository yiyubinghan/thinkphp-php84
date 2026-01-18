<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP8!';
});

Route::get('hello/:name', 'index/hello');

Route::get('phpinfo', function () {
    return phpinfo();
});

Route::get('time', function () {
    return date('Y-m-d H:i:s', time());
});

Route::get('opcache', function () {
    print_r(opcache_get_status());
});

Route::group('api', function (){
    //登录
    Route::get('test-concurrency-1', 'test/testConcurrency1');
    Route::get('test-concurrency-2', 'test/testConcurrency2');
    Route::get('test-mysql', 'test/testMysql');
    Route::get('test-redis', 'test/testRedis');
});