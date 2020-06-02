<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/24
 * php版本一定要在php7.2以上
 * Time: 11:09
 */

require './vendor/autoload.php';

use Vitas\Wef\Applications\Application;
use Vitas\Wef\Facades\DB;

echo DB::demo();


// 代码测试
//$app = new Application();

//解析实例对象时，注册的相似的类的同名方法，参数可能不一样
//假设oracle->mysql
//$app->bind(Vitas\Wef\Contracts\Databases\DB::class,Oracle::class);

// 契约--》 为了约束我们的服务
//$db = $app->make(DB::class); //解析db实例对象
//echo $db->demo();

