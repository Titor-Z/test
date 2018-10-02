<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/30 9:57 AM
 */
namespace Store\Admin\Api;


use Medoo\Medoo;

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



}