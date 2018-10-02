<?php
namespace Home\Controller;
use Think\Controller;
// 首页控制器
class IndexController extends ApiController {

    static $user = null;

    /**
     * 检测是否登录，登录则渲染首页，反之，跳转到登录页面
     */
    public function index(){
        I('session.mer_user') == false ? $this->redirect('Login/index'): $this->home();
    }


    /**
     * 公共模版赋值
     */
    public function init() {
        self::$user = self::getUser($_SESSION['mer_user']);
        $this->assign([
            'logout' => U("Api/userLogout"),
            'myAccount' => U("Set/myAccount"),
            'store' => U("Store/index"),
            'storeEdit' => U("Store/edit"),
            'home'  => U("Index/index"),
            'username' => self::$user['name'],
        ]);
    }

    /**
     * 渲染首页模版
     */
    public function home() {
        $this->init();
        $this->display('index');
    }
}