<?php

namespace Home\Controller;

use http\Exception\BadMethodCallException;
use Think\Controller;
use Think\Exception;

class ApiController extends Controller
{


    static $userTable = 'user';
    static $storeTable = 'store';
    static $industry = 'industry';


    /**
     * 查看用户信息
     * - 通过用户ID，查看指定的用户信息
     * @param string $userid
     * @return mixed
     * @throws \Think\Exception
     */
    public static function getUser($userid = '')
    {
        if (isset($userid)) {
            $result = M(self::$userTable)->where("id='%s'", $userid)->find();
            return $result;
        } else {
            E('必须输入用户ID');
        }
    }


    /**
     * 查找登录的账户记录
     * - 通过用户手机号查询用户的信息
     * @param string $phone
     * @return mixed
     * @throws \Think\Exception
     */
    public static function findUser($phone = "")
    {
        # 传入用户的id
        # 如果存在，返回用户的信息
        if (isset($phone)) {
            $result = M(self::$userTable)->where("phone='%s'", $phone)->find();
            return $result;
        } # 反之，返回失败
        else {
            E('你没有传入要查找的用户手机号');
        }
    }


    /**
     * 查找店铺
     * - 通过用户ID查询用户的店铺信息
     * @param $userId
     * @return mixed
     * @throws \Think\Exception
     */
    public static function findStore($userId)
    {
        # 传入用户的ID
        # 返回查到的信息
        if (isset($userId)) {
            $result = M(self::$storeTable)->where("user_id='%s'", $userId)->find();
            return $result;
        } # 反之，返回失败
        else {
            E('请传入你要操作的用户ID，以便查找该用户的店铺');
        }
    }


    /**
     * 查看店铺信息
     * - 通过店铺ID，查看指定的店铺信息
     * @param $storeId
     * @return mixed
     * @throws \Think\Exception
     */
    public static function getStore($storeId)
    {
        # 传入店铺ID
        # 返回店铺信息：
        if (isset($storeId)) {
            $result = M(self::$storeTable)->where("id='%s'", $storeId)->find();
            return $result;
        } # 反之，返回失败
        else {
            E("你没有传入店铺ID");
        }
    }


    /**
     * @param int $industryId
     * @return mixed
     * @throws \Think\Exception
     */
    public static function getIndustry($industryId)
    {
        # 传入行业ID
        # 返回与之关联的行业名称：
        if (isset($industryId)) {
            $result = M(self::$industry)->where("id='%s'", $industryId)->find();
            return $result;
        } # 反之，返回失败
        else {
            E("你没有传入行业ID");
        }
    }


    public static function getIndustrys()
    {
        $result = M(self::$industry)->select();
        return $result;
    }


    /**
     * 用户登录
     * - 判断前端是否进行登录操作，如果进行，则保存session,跳转到首页
     * -否则，返回 登录失败 的数据。
     */
    public function userLogin()
    {
        # 获取登录信息
        $data = $_POST['data'];

        # 检测登录信息是否完整：
        if (isset($data) && count($data) > 0) {
            # 对照数据表：
            $result = self::findUser($data['username']);

            # 登录信息对照数据表信息：
            if (isset($result)) {
                # 信息完全一致，双向绑定：
                if ($result['password'] == $data['password']) {
                    $_SESSION['mer_user'] = $result['id'];
                    $this->ajaxReturn([
                        'state' => true,
                        'data' => [
                            'message' => '登录成功',
                            'href' => U("Index/index")
                        ],
                    ]);
                } # 密码不对，则提示：
                else {
                    $this->ajaxReturn([
                        'state' => false,
                        'data' => [
                            'message' => '密码错误'
                        ],
                    ]);
                }
            } # 信息不存在，则提示：
            else {
                $this->ajaxReturn([
                    'state' => false,
                    'data' => [
                        'message' => '账户不存在'
                    ],
                ]);
            }
        } # 登录信息不完整，提示：
        else {
            $this->ajaxReturn([
                'state' => false,
                'data' => [
                    'message' => '完整的登录信息，应该包含账户和密码两部分'
                ],
            ]);
        } // End of 检测登录信息是否完整.
    }


    /**
     * 用户退出
     * - 删除用户的session，
     * - 并跳转到用户登录页面
     */
    public function userLogout()
    {
        unset($_SESSION['mer_user']);
        $this->redirect("Login/index");
    }

    // 查找门店照片
    public static function getStorePic(array $data)
    {
        $dbResult = M('pic_store')->where('store_id=' . I('session.mer_user'))->getField('pic');

        $result = null;
        foreach (array_filter(explode('|', $dbResult)) as $key => $value) {
            $result .= FILE_HOST . I('session.mer_user') . '/store/' . $value . '|';
        }

        return array_filter(explode('|', $result));
    }

    public static function saveStoreBash($storeId, $data)
    {
        if ($storeId == null) E("没有传入任何店铺ID");
        try {
            M('store')->where('id=' . $storeId)->save($data);
        } catch (E $e) {
            return 0;
        }
        return 1;
    }

    // 获取店铺的所有产品信息
    public static function getProductInfo($storeId = null)
    {
        if ($storeId == null) E("没有传入任何店铺ID");
        try {
            $fromDB = M('product_hotel')->where('store_id=' . $storeId)->select();
        } catch (E $e) {
            return false;
        }
        return $fromDB;
    }

    // 删除指定的产品
    public static function delProduct($productId = null)
    {
        if ($productId == null) E("没有传入任何产品ID");
        try {
            $inDB = M('product_hotel')->where('id=' . $productId)->delete();
        } catch (E $e) {
            return false;
        }

        return $inDB;
    }

    // 获取指定产品信息
    public static function getProduct($productId = null)
    {
        if ($productId == null) E("没有传入任何产品ID");
        try {
            $fromDB = M('product_hotel')->where('id=' . $productId)->find();
        } catch (E $e) {
            return false;
        }

        return $fromDB;
    }

    // 更新指定产品的信息
    public static function setProduct($productId, $data)
    {
        if (!isset($productId)) E("没有传入任何产品ID");
        try {
            $fromDB = M('product_hotel')->where('id=' . $productId)->save($data);
        } catch (E $e) {
            return false;
        }

        return $fromDB;
    }

    public static function getProductPic($table, array $data)
    {
        if (!isset($table)) throw E("输入要操作的表");
        if (!isset($data["id"])) throw E("输入要操作的产品 ID");
        if (!isset($data["class"])) throw E("输入保存的文件夹 名称");
        if (!isset($data["user"])) throw E("输入保存的用户 名称");

        $dbResult = M($table)->where('id='.$data["id"])->getField('pic');

        $result = null;
        foreach (array_filter(explode('|', $dbResult)) as $key => $value) {
            $result .= FILE_HOST . $data["user"] . '/'.$data["class"].'/' . $value . '|';
        }

        return array_filter(explode('|', $result));

    }

}