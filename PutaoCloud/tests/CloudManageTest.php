<?php
namespace PutaoCloud\Tests;
require_once("../../vendor/autoload.php");
use PutaoCloud\CloudManage as CloudManage;

//callable,上传完成后会回调此方法
//$ret 上传类
//$err 上传状态,如果不为空说明上传错误,如果为空,用$ret->result查看上传结果
$c1 = function($ret,$err){
    var_dump($err);
    var_dump($ret->result);
};
$server = "http://10.1.11.44:8081";
$appid = "1001";
$accessKey = "69025f5e6c7dd0c1157e0daf94e9cef5";
$secretKey = "fce1f6bb6fcfd4fad5d98ee48b441abc";
$file = "/root/ceph.log";
$customize = ["test"=>"test"];
$cm = new CloudManage($server,$appid,$accessKey,$secretKey);
$cm->customize($customize)
    ->registerCallBack($c1)
	->upload($file);
