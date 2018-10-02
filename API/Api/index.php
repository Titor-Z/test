<?php
require_once "../vendor/autoload.php";
require_once "Class/autoLoad.php";

use Store\Admin\Api\Admin,
    Store\Admin\Api\User,
    Store\Admin\Api\Store;

/*
 * 是否登录
 */
Flight::route('GET /', function () {
    session_start();

    if (isset($_SESSION['admin'])) {
        Flight::json([
            'state' => true,
        ]);
    } else {
        Flight::json([
            'state' => false
        ]);
    }
});



/*
 * 管理员登录
 * 接受数据，并与数据库结果对照：
 */
Flight::route('POST /login', function () {
    header("Access-Control-Allow-Origin", "*");
    # 开启session
    session_start();

    @$data = $_POST["data"];

    # 判断登录信息是否正常
    # 有信息提交
    if (isset($data) && count($data) > 0) {
        $User = new Admin();
        $mobile = trim($data['mobile']);
        $pasd = trim($data['password']);

        # 从表中找寻匹配的记录
        $result = $User->searchUsers($mobile, ['password','id']);

        # 如果结果为空：
        if (!$result[0]) {
            Flight::json([
                'control' => "mobile",
                'text' => '用户名不存在',
                'state' => false
            ]);
        }

        else {
            # 如果密码不匹配：
            if ($result[0]['password'] != $pasd) {
                Flight::json([
                    'control' => "password",
                    'text' => '密码错误',
                    'state' => false
                ]);
            }
            # 登录成功
            else {
                $_SESSION['admin'] = $result[0]['id'];
                Flight::json([
                    'state' => true,
                    'href' => 'index.html',
                ]);
            }
        }
    }
    # 如果没有收到任何数据：
    else {
        Flight::json([
            'text' => '请输入用户名和密码',
            'state' => false
        ]);
    }
});



/*
 * 商户注册查询
 */
Flight::route('POST /user/has', function () {
    header("Access-Control-Allow-Origin", "*");
    # 验证输入：
    @$data = $_POST['data'];
    # 数据传输正确：
    if ( isset($data) & count($data) > 0 ) {
        $user = new User();
        $mobile = trim($data['mobile']);
        $result = $user->has($mobile);

        if ($result==false) {
            Flight::json([
                'state' => true,
                'text' => '可以使用'
            ]);
        }
        else{
            Flight::json([
                'state' => false,
                'text' => '已被注册'
            ]);
        }
    }

    # 如果没有传输数据：
    else {
        Flight::json([
            'text' => '请输入要注册的商家账号',
            'state' => false
        ]);
    }
});



/*
 * 开户（商铺入驻）
 */
Flight::route('POST /store/create', function () {
    @$data = $_POST['data'];

    # 创建账户：
    $userData = [
        'phone' => $data["mobile"],
        'password' => $data["password"]
    ];

    $user = new User();
    $store = new Store();
    #$createUserResult = $user->create($userData);

    $serviceTimeArr = [
        'start' => @$data['start_time'],
        'end'   => @$data['end_time'],
    ];
    $storeData = [
        'user_id' => $user->create($userData),
        'name' => @$data['store_name'],
        'business_number' => @$data['store_number'],
        'business_address' => @$data['store_address'],
        'service_time [JSON]' => array_filter($serviceTimeArr),
    ];

    $createStoreResult = $store->create($storeData);

    if ($createStoreResult) {
        Flight::json([
            'state'=> true,
        ]);
    }
    else {
        Flight::json([
            'state'=> false,
        ]);
    }
});



Flight::route('/test', function () {
    $arr1 = [
        'start' => null,
        'end'   => 0
    ];

    $arr = [
        'business_address' => 132,
        'service_time' => array_filter($arr1),
    ];

    $arr2 = array_filter($arr);

    if (array_key_exists('service_time', $arr2)){
        $arr2['service_time'] = json_encode($arr2['service_time']);
    }


    echo "<pre>";
    print_r(array_filter($arr2));
});

# 启动应用
Flight::start();