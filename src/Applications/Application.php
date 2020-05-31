<?php
/**
 * Created by PhpStorm.
 * User: Vitas
 * Date: 2020/5/31
 * Time: 13:06
 */
// 框架运行的应用 ，整个框架的核心
namespace Vitas\Wef\Applications;

use Vitas\Wef\Containers\Container;
use Vitas\Wef\Databases\Mysql;
use Vitas\Wef\Databases\Oracle;


//Container 提供初始
class Application extends Container
{
    // 用来启动程序，启动软件
    // 有用户的信息，继承于Container类
    // 启动的方法

    public function __construct()
    {
        $this->registerBaseBindings();
        $this->registerBaseService();
    }

    //注册系统运行所需要的服务
    //事先注册一些管理员的信息
    public function registerBaseService()
    {
        //定义系统服务注册
        $bind = [
            //标识=>服务类
            // Mysql::class => 'Vitas\Wef\Databases\Mysql'
            'db' => Mysql::class,
        ];
        foreach($bind as $key => $value){
            $this->bind($key,$value);
        }
    }

    //事先绑定程序 所需要的共享实例
    //将自身绑定为共享实例
    public function registerBaseBindings()
    {
        $this->instance('app',$this);
        $this->instance(Container::class,$this);
    }

    //从容器中解析实例
    //$abstract 标识： 一个字符串， 一个接口标识
    public function make($abstract,$parameters=[])
    {
        //先判断类是否在容器中
        if(!$this->has($abstract)){
            return $abstract;
        }
        //标识存在于bind容器就去解析出实例对象

        return parent::make($abstract,$parameters);
    }






}