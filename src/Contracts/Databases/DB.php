<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/5/31
 * 框架的契约 contracts
 * Time: 22:11
 */

namespace Vitas\Wef\Contracts\Databases;

//方法规范
//trait类中的方法体是一个实例的，无法起到约束的作用

// 抽象，接口 抽象的话只能单继承，接口可以多实现
//规范存在多种，需要多实现，所以只能用接口
interface DB
{
    public function demo(); //这就是一个具体的规范，弱性约束

    //public string demo(string $t);


}


