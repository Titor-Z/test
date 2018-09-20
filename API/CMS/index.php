<?php
require_once "../vendor/autoload.php";

// 调试模式



Flight::route('/',function () {
    echo 123;
});

/* 用户登录 */
Flight::route('/login',function () {
    session_start();
    # 获取登录信息
    $data = $_POST['data'];
    if (isset($data) && count($data) > 0) {
        $_SESSION['mer_user'] = $data['username'];
        Flight::json([
            'message'=> '登录成功',
            'href' => 'http://localhost:81/cms/'
        ]);
    }else {
        Flight::json([
            'message'=> '登录失败'
        ]);
    }
});

/* 用户退出 */
Flight::route('/logout', function () {
    session_start();
    unset($_SESSION['mer_user']);
    Flight::redirect("http://localhost:81/cms/");
});


Flight::route('/test', function () {
    $date = new DateTime();
    var_dump($date);

});


Flight::start();