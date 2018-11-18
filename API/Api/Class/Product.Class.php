<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/10/15 12:56 PM
 */

namespace Store\Admin\Api;

class Product {
    protected $db = null;
    protected $table = 'product_hotel';

    public function __construct() {
        $set = Set::getSet();
        $this->db = $set->database();
    }


    /**
     * 传入Store ID, 输出产品列表
     * @param $storeID      //  Store ID (必填项)
     * @param $column       //  输出的字段列名，为空输出全部列
     * @return array|bool
     * @throws \Exception
     */
    public function getProduct($storeID, $column = []) {
        if (!isset($storeID)) throw new \Exception("需传入 Store ID");
        if (!isset($column)) $column = '*';

        try {
            $outDB = $this->db->select($this->table, $column, ['store_id'=> $storeID]);
        }catch (\Exception $e) {
            return false;
        }

        if (in_array('pic',$column)) {
            for ($i=0; $i<count($outDB); $i++) {
                $outDB[$i]["pic"] = explode('|', $outDB[$i]["pic"])[0];
            }
        }

        return $outDB;
    }


    /**
     * 传入产品ID, 输出产品信息
     * @param null $productId       // 产品id（必选项）
     * @return array|bool|mixed
     * @throws \Exception
     */
    public function getProductOnly ($productId = null) {
        if ($productId == null) throw new \Exception("需传入 Product ID");
        try {
            $outDB = $this->db->get($this->table, '*', ['id'=>$productId]);
        }catch (\Exception $e) {
            return false;
        }

        // 整理pic 字段为数组格式
        $picToArr = explode('|', $outDB["pic"]);
        $outDB["pic"] = array_filter($picToArr);

        return $outDB;
    }
}