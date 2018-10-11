<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/29 10:36 PM
 */
namespace Store\Admin\Api;

use FileUpload\Validator\Simple;
use Medoo\Medoo;


/**
 * Class Set
 * 配置表，用来存放站点配置 （数据库配置）
 * @package Store\Admin\Api
 */
class Set {

    static $host = "192.168.0.100";
    static $user = "root";
    static $pasd = "root";
    static $port = 3306;
    static $charset = 'utf8';
    static $databaseType = 'mysql'; // MariaDB and MySQL.
    static $database = 'myStore';   // Use the database name.
    static $tablePrefix = '';       // 表前缀
    static $logging = false;        // 是否启用日志记录. true 启用, false 关闭。

    static $set = null;


    /**
     * 禁止在类外实例化
     * Set constructor.
     */
    private function __construct() { }

    /**
     * 禁止克隆
     */
    private function __clone() { }


    /**
     * 单例模式
     * - 每个实例类操作当前对象时，都只使用在内存中存放的当前唯一的类。
     * @return null|Set
     */
    public static function getSet () {
        if (self::$set == null) self::$set = new Set();
        return self::$set;
    }


    /**
     * 连接数据库：
     * 使用 Medoo 连接数据库。
     * - 返回的对象在User或者其他实例类中调用。
     * @return Medoo
     */
    function database() {
        $database = new Medoo([
            'database_type' => self::$databaseType,
            'database_name' => self::$database,
            'server'        => self::$host,
            'username'      => self::$user,
            'password'      => self::$pasd,
            'port'          => self::$port,

            'charset'       => self::$charset,
            'prefix'        => self::$tablePrefix,
            'logging'       => self::$logging,
        ]);

        return $database;
    }

}