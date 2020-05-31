<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/24
 * php版本一定要在php7.2以上
 * Time: 11:09
 */

require './vendor/autoload.php';

use  Vitas\Wef\Applications\Application;

// 代码测试
$app = new Application();
$db = $app->make('db'); //解析db实例对象
print_r($db);exit;
echo $db->demo();

