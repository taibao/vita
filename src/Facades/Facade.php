<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/6/1
 * Time: 6:59
 */


//门面类的父类
//快速调用
//便于维护
namespace Vitas\Wef\Facades;

use Vitas\Wef\Applications\Application;

abstract class Facade
{
    protected static $resolvedInstance = [];

    //子类必须要重写
    public static function getFacadeClass(){
        throw new Exception("你没有指定代理的门面类 ",1);
    }

    //获取要调用的类
    public static function createFacade()
    {
        // 1： 找到这个类
        $class = static::getFacadeClass();
        // 如果传来的是对象直接返回对象
        if(is_object($class)){
            return $class;
        }
        // 2：判断类实例是否存在
        if(isset(static::$resolvedInstance[$class])){
            return static::$resolvedInstance[$class];
        }
        // 3： 创建这个类实例
        // $app->make
        return static::$resolvedInstance[$class] = Application::getInstance()->make($class);
    }

    //最为核心的因素就是通过__CallStatic实现
    public static function __CallStatic($method,$args)
    {
        //1：获取要调用的类
        $class = static::createFacade();
        if(!$class){
            throw new \Exception("类没有找到 ".$class,1);
        }
        //2：执行这个类
        return $class->{$method}(...$args);
    }



}