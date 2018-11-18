<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/30 9:57 AM
 */
namespace Store\Admin\Api;

class User {
    private $db = null;
    private $table = 'user';

    public function __construct() {
        $set =  Set::getSet();
        $this->db = $set->database();
    }


    public function has($mobile = '*') {

        $result = $this->db->has($this->table, [
            'phone' => $mobile,
        ]);

        return $result;
    }


    public function create(array $data = []) {
        $result = $this->db->insert($this->table, array_filter($data));
        if ($result){
            return $this->db->id();
        }else{
            return false;
        }
    }


    /**
     * 检出指定用户数据
     * @param null $phone 唯一电话
     * @param string $columns 要返回的列
     * @return array|bool|mixed|null
     * @throws \Exception
     */
    public function getUser($phone = null, $columns = '*') {
        if ($phone == null) throw new \Exception("没有指定phone");
        try{
            $userInfo = $this->db->get($this->table, $columns, ['phone'=>$phone]);
        }catch (\Exception $e) {
            $userInfo = null;
        }
        return $userInfo;
    }



}