<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/29 11:25 PM
 */
/*
 * 命名空间自动加载函数
 * 根据 use 的类名，或者 new 的类名，
 * 自动去Class目录下加载对应的 类文件。
 */
function autoLoad($className) {
    # 过滤命名空间中的\，使它称为一个\：
    $className = trim($className, '\\');
    # 当前类名的命名空间：
    $nameSpace = 'Store\Admin\Api\\';
    # 文件名：类名去掉命名空间标示，就是文件名
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, str_ireplace($nameSpace, '', $className));
    # 文件完整路径：当前目录下/文件名.Class.php；
    $file = __DIR__.DIRECTORY_SEPARATOR.$fileName.'.Class.php';

    # 引入文件
    require_once $file;
}

# 注册加载函数：
spl_autoload_register('autoLoad');