<?php
namespace Home\Controller;
use Home\Controller\IndexController;

class StoreController extends IndexController{

    public function index() {
        self::init();
        $this->display('Index/store');
    }

    public function edit() {
        self::init();
        $this->display('Index/store-edit');
    }

}