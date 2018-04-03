<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/1 0001
 * Time: 19:13
 */
//单例模式
class Site
{
    //属性
    public $siteName;
    //本类静态实例
    protected static $instance = null;
    public function __construct($siteName)
    {
        $this->siteName = $siteName;
    }
    //获取本类唯一实例
    public static function getInstance($siteName = 'www.php.cn')
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self('PHP中文网');
        }
        return self::$instance;
    }



}
//用工厂模式生成当前类的单一实例
class Factory
{
    //创建当前类的静态实例
    public static function create()
    {
        return Site::getInstance('php中文网');
    }
}
//注册树模式
/*
 * class Register
 * 1.注册：set(),把对象挂到树上
 * 2.获取：get(),把对象取下来用
 * 3.注销：_unset(),把对象吃掉
 * */
class Register
{
    //创建对象池，数组
    protected static $objects = [];
    //生成对象并上树
    public static function set($alias,$objects)
    {
        self::$objects[$alias] = $objects;
    }
    //从树上取对象
    public static function get($alias)
    {
        return self::$objects[$alias];
    }
    //把对象吃掉
    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }

}

//将site类的实例上树，放到对象chi
Register::set('site',Factory::create());

//从树上取出一个对象
$obj = Register::get('site');
print_r($obj);

//把对象吃掉
Register::_unset('site');

