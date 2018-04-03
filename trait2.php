<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3 0003
 * Time: 22:46
 */

/*
 * trait的优先级
 * 当前类的方法与父类重名，优先访问本类方法
 * trait类同名方法高于父类
 * */
trait Demo1
{
    public function hello1()
    {
        echo __METHOD__;
    }
}

trait Demo2
{
    public function hello()
    {
        echo __METHOD__;
    }
}

class Test
{
    public function hello(){
        echo __METHOD__;
    }
}

class Demo extends Test
{
    use Demo2,Demo1;
//    public function hello(){
//        echo __METHOD__;
//    }
}
$obj = new Demo();
$obj->hello();
