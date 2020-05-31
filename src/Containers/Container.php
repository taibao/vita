<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/24
 * remark: 容器类
 * Time: 19:15
 */

//框架的容器---app数据库
//在这个里面就是记录信息
//$bind 容器数据保存所有的注册信息
// $instances 保存从容器中解析出的实例做到共享，避免重复创建
//bind() 用来注册页面
// make()
namespace  Vitas\Wef\Containers;

class Container {

    protected $bind = []; //容器 存放绑定的功能，$aliases与$bindings的结合

    protected static $instance; //用于指定当前的实例，单例的创建
    protected  $instances = []; //保存从容器解析出的实例做到共享，避免重复创建

    //绑定到容器的方法
    public function bind($abstract, $object){
        $this->bind[$abstract] = $object;
    }

    //检验是否在容器中
    public function has($abstract){
        return isset($this->bind[$abstract]);
    }

    //将实例作为共享
    public function instance($abstract,$instance){
        //创建是否有创建过
        if(isset($this->bind[$abstract])){
            //如果创建成功就会移除绑定的容器
            unset($this->bind[$abstract]);
        }
        $this->instances[$abstract] = $instance;
    }

    //单例模式
    public static function getInstance(){
        if(is_null(static::$instance)){
            static::$instance = new static;
        }
        return static::$instance;
    }

    //从容器中解析
    public function make($abstract,$parameters = []){
        //判断是否之前已经从容器中解析出，如果存在实例就返回
        //避免重复的解析
        if(isset($this->instances[$abstract])){
            return $this->instances[$abstract];
        }

        //判断在容器中是否存在对应的实例类,存在就返回类对象
        if(isset($this->bind[$abstract])){
            $class =  $this->bind[$abstract];
            //这个过程对应于build方法
            $object = (empty($parameters))?new $class():new $class(...$parameters);
            return $this->instances[$abstract] = $object;
        }

        throw new \Exception("没有找到对应的实例",$abstract,1);

    }
}