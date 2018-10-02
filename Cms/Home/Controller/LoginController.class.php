<?php
namespace Home\Controller;
use Think\Controller;

// 登录控制器
class LoginController extends Controller {
    public function index(){
        I('session.mer_user') == false ? $this->showLogin(): $this->redirect('Index/index');
    }

    public function showLogin() {
        $this->assign([
            'href'=> U("Api/userLogin"),
        ]);
        $this->display('Index:login');
    }
}