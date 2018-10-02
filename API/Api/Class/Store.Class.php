<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/9/30 4:32 PM
 */

namespace Store\Admin\Api;


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

}