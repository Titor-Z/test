<?php
namespace Home\Controller;

class SetController extends IndexController{

    public function myAccount() {
        self::init();
        $this->assign([
            'phone' => self::$user['phone']
        ]);
        $this->display("Index/setting");
    }

    public function editMyAccount() {

    }
}