<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/31
 * 框架的契约 contracts
 * Time: 22:11
 */

namespace Vitas\Wef\Facades;

//使其快速调用数据库的实例类
class DB extends Facade
{
    //子类必须要重写
    public static function getFacadeClass(){
//        return 'db';
//        return new \Vitas\Wef\Databases\Mysql;
        return \Vitas\Wef\Databases\DB::class; //返回类地址
    }


}


