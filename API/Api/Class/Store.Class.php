<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/30 4:32 PM
 */

namespace Store\Admin\Api;

use Think\Exception;

class Store {

    protected $db = null;
    private $table = 'store';

    public function __construct() {
        $set = Set::getSet();
        $this->db = $set->database();
    }

    public function create(array $data = []) {
        $result = $this->db->insert($this->table, array_filter($data));
        if ($result) {
            return true;
        }else {
            return false;
        }
    }

    // 根据用户id，返回店铺的所有信息
    public function getStore($userId = null) {
        if ($userId == null) throw new \Exception("需指定用户ID");
        try {
            $store = $this->db->get($this->table,'*',['user_id' => $userId]);
        }catch (\Exception $e) {
            $store = null;
        }
        return $store;
    }


    /**
     * 传入用户ID，输出StoreID
     * @param null $userId
     * @return array|bool|mixed|null
     * @throws Exception
     */
    public function getStoreID($userId = null) {
        if ($userId == null) throw new Exception("需指定用户ID");
        try{
            $outDB = $this->db->get($this->table, 'id', ['user_id' => $userId]);
        }catch (\Exception $e) {
            $outDB = null;
        }
        return $outDB;
    }



    /**
     * 传入用户id，返回店铺图片的所有信息
     * @param null $storeId     店铺id
     * @param bool $model       将pic数组信息分割后存放到pic的数组集合中
     * @return array|bool|mixed|null
     * @throws \Exception
     */
    public function getStorePic($storeId = null, $model = true) {
        $table = 'pic_store';
        if ($storeId == null) throw new \Exception("需指定店铺ID");
        try {
            $pic = $this->db->get($table,'pic',['store_id' => $storeId]);
        }catch (\Exception $e) {
            $pic = null;
        }

        // 开启返回pic数组格式,将pic的信息，存放到pic数组集合中：
        if ($model) {
            $picToArr = explode('|', $pic);
            return [ 'pic' => array_filter($picToArr) ];
        }else{
            return $pic;
        }
    }

}