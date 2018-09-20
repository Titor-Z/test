<?php
namespace Home\Controller;

class SetController extends IndexController{

    public function myAccount() {
        self::init();
        $this->display("Index/setting");
    }
}