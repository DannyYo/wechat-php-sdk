<?php
include "wechat.class.php";
$options = array(
		'token'=>'weixin', //填写你设定的key
    //'encodingaeskey'=>'encodingaeskey', //填写加密用的EncodingAESKey
    'appid'=>'wxc4e0e4b33656924b', //填写高级调用功能的app id, 请在微信开发模式后台查询
    'appsecret'=>'e3a6dfce842a5c8c9f7a4d698b7ea4a5' //填写高级调用功能的密钥
	);
$weObj = new Wechat($options);
$weObj->valid();//明文或兼容模式可以在接口验证通过后注释此句，但加密模式一定不能注释，否则会验证失败
$type = $weObj->getRev()->getRevType();
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$weObj->text("hello, I'm wechat")->reply();
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
			break;
	case Wechat::MSGTYPE_IMAGE:
			$weObj->text("It's a photo")->reply();
			break;
	default:
			$weObj->text("help info")->reply();
}