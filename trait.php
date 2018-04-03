<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3 0003
 * Time: 22:13
 */

/*
 * trait
 * 实现了代码的服用，
 * 突破了单继承的限制
 * trait是类不是类，不能实例化
 *
 * */
//trait技术
trait Demo1
{
    public function hello1()
    {
        echo __METHOD__;
    }
}
trait Demo2
{
    public function hello2()
    {
        echo __METHOD__;
    }
}
class Demo
{
    use Demo1,Demo2;
    public function hello()
    {
        echo __METHOD__;
    }

    public function test1()
    {
        $this->hello1();
    }

    public function test2()
    {
        $this->hello2();
    }



}
$obj = new Demo();
$obj->test1();