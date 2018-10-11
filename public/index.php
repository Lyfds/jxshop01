<?php
//定义常量
define('ROOT',__DIR__.'/../');
//实现类的自动加载
function autoload($class) {
    $path = str_replace('\\','/',$class);
    require(ROOT.$path.'.php');
}
spl_autoload_register('autoload');
//解析路由
$controller = '\controllers\IndexController';
$action = 'index';
if(isset($_SERVER['PATH_INFO'])) {
    $router = explode('/',$_SERVER['PATH_INFO']);
    $controller = '\controllers\\'.ucfirst($router[1]).'Controller';
    $action = $router[2];
}
$c = new $controller;
$c->$action();