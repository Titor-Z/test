<?php
/**
 * Created by PhpStorm.
 * Author: titor
 * Date: 2018/10/4 5:07 PM
 */
namespace Store\Admin\Api;

use Symfony\Component\Filesystem\Filesystem;
use Think\Exception;

class Upload {

    private static $factory = null;
    private $db = null;
    private static $setting = [];
    private static $error = null;
    private static $info = null;


    public function __construct() {
        $defaultSetting = [
            'type' => ['image/jpg', 'image/png', 'image/jpeg'],
            'size' => Util::humanReadableToBytes("3M"),
            'path' => './Upload/'
        ];
        self::$setting = array_merge($defaultSetting, array_filter(self::$setting));
        $this->db = Set::getSet()->database();
    }

    public static function setType(array $type = null) {
        self::$setting['type'] = array_filter($type);
    }

    public static function getType()
    {
        return self::$setting["type"];
    }

    public static function setSize($size = null) {
        self::$setting['size'] = Util::humanReadableToBytes($size);
    }

    public static function getSize()
    {
        return Util::fixIntegerOverflow( self::$setting["size"] );
    }

    public static function setPath($path = null) {
        self::$setting['path'] = $path.DIRECTORY_SEPARATOR;
    }

    public static function getPath()
    {
        return self::$setting["path"];
    }

    /**
     * 初始化上传目录
     */
    public function pathResolver() {
        $fileSystem = new Filesystem();
        $fileSystem->mkdir(self::$setting["path"]);
    }

    public function fileUpload(array $file, $newName = null) {
        $fileError = $file['error'];

        if ($fileError > 0) {
            self::$error = $fileError;
            throw new \Exception("文件包含错误");
        }
        else {
            if (Util::fixIntegerOverflow($file["size"]) > Util::fixIntegerOverflow(self::$setting["size"])) {
                throw new \Exception("文件大小超过了上传的设置");
            }
            if (!in_array($file["type"], self::$setting["type"])) {
                throw new \Exception("文件类型不符合");
            }

            $fileName = self::fileNameGenerator($file["name"], $newName);
            $result = move_uploaded_file($file["tmp_name"], self::$setting['path'] . $fileName);

            if ($result) {
                self::$factory = new Upload();
                self::$info = [
                    'name' => $fileName,
                    'type' => $file["type"],
                    'size' => $file["size"],
                    'path' => self::$setting['path'] . $file["name"],
                ];
                return self::$factory;
            }else{
                throw new \Exception("文件上传失败");
            }
        }
    }

    // 文件名生成器：
    protected function fileNameGenerator($oldName,$fileName = null) {
        if ($fileName == null || !isset($fileName)) {
            return $oldName;
        } else {
            $suffix = Util::getFileSuffix($oldName);
            return $fileName.'.'.$suffix;
        }
    }

    // 更改文件名：
    public function changeFileName($fileName=null) {
        if (!$fileName == null) {
            $path = self::getUploadInfo('path');

            $fileSystem = new Filesystem();
            $result = $fileSystem->exists($path);
            if ($result) {
                $suffix = Util::getFileSuffix(self::getUploadInfo('name'));
                $newFileName = str_replace(self::getUploadInfo("name"), $fileName.'.'.$suffix, $path);
                $fileSystem->rename($path, $newFileName);
            }
        }
        return self::$factory = new Upload();
    }

    // 返回当前文件的上传信息（保存到文件中后的信息）：
    public static function getUploadInfo($key = null) {
        if ($key == null || !isset($key)) {
            return self::$info;
        } else {
            return self::$info[$key];
        }
    }

    // 写入数据库
    public function saveToDB(array $data = null) {
        $data = array_filter($data);
        if (!isset($data)) throw new \Exception("没有传入任何要保存到数据库中的数据");
        if (!isset($data['id'])) throw new \Exception("没有指定 StoreID");
        if (!isset($data['class'])) throw new \Exception("没有指定 Class");
        if (!isset($data['file'])) throw new \Exception("没有传入 File");

        $table = 'pic_'.$data['class'];

        $dbHas = $this->db->has($table, [
            'store_id' => $data['id']
        ]);

        if (!$dbHas) {
            return $this->db->insert($table, [
                'store_id' => $data['id'],
                "pic" => $data['file']['name'].'|'
            ]);
        }else{
            $dbPic = $this->db->get($table, 'pic', [
                'store_id' => $data['id']
            ]);
            $pic = $dbPic.$data['file']['name'].'|';

            return $this->db->update($table,[
                "pic" => $pic
            ], [
                'store_id' => $data['id']
            ]);
        }
    }

    // 保存产品信息到数据库：
    public function saveProductToDB($table, $data) {
        if (!isset($table)) throw new \Exception("没有指定 要写入的表");
        if (!isset($data['id'])) throw new \Exception("没有指定 产品ID");
        if (!isset($data['file'])) throw new \Exception("没有传入 File");


        $dbPic = $this->db->get($table, 'pic', [
            'id' => $data['id']
        ]);

        $pic = $dbPic.$data['file']['name'].'|';

        return $this->db->update($table,[
            "pic" => $pic
        ], [
            'id' => $data['id']
        ]);
    }


    // 删除文件：
    public function fileDel(array $file=null) {
        if (isset($file['path'])) {
            $fileSystem = new Filesystem();
            $fileSystem->remove($file['path']);
        }
    }

}