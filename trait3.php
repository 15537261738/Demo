<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3 0003
 * Time: 23:07
 */


/*
 * trait
 *当Demo1和Demo2中都有hello方法时，程序不知道调用哪个方法，会报错，可用如下方法解决
 * */
//trait技术
trait Demo1
{
    public function hello()
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
class Demo
{
    use Demo1,Demo2{
      Demo1::hello insteadof Demo2;//将Demo1中的hello方法代替到Demo2中的hello方法
      Demo2::hello as Demo2Hello;//取别名
    }
    /*public function hello()
    {
        echo __METHOD__;
    }*/

    public function test1()
    {
        $this->hello();
    }

    public function test2()
    {
        $this->Demo2Hello();
    }



}
$obj = new Demo();
$obj->test1();
$obj->test2();
