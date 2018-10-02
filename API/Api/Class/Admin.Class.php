<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/29 9:53 PM
 */
namespace Store\Admin\Api;


class Admin {

    public $db = null;
    private $table = 'admin';

    function __construct() {
        $set =  Set::getSet();
        $this->db = $set->database();
    }

    function searchUsers($mobile = '', $column = '*') {

        $result = $this->db->select($this->table,$column, [
            'phone' => $mobile,
        ]);

        if (!$result) {
            return false;
        }

        return $result;
    }

}