<?php
/**
 * user
 * mail
 * comment
 * post
 * category
 * school
 */
require_once ("lib/nusoap.php");
require_once '../config.php';
//$baseurl = 'http://127.0.0.1/zend/campus/';
/*
 * 通过WSDL调用WebService 参数1 WSDL文件的地址(问号后的wsdl不能为大写) 参数2 指定是否使用WSDL $client = new soapclient('http://localhost/WebService/nusoapService.php?wsdl',true);
 */
/* exmaple
$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$client->xml_encoding = 'UTF-8';
// 参数转为数组形式传递
$paras = array (
		'name' => 'Bruce Lee',
		'last' => '088'
);
// 目标方法没有参数时，可省略后面的参数
$result = $client->call ( 'sayHello', $paras );
//$result = $client->call('show_post_json', array('pid'=>'4'));
// 检查错误，获取返回值
if (! $err = $client->getError ()) {
	echo "返回结果：", $result;
	echo print_r(json_decode($result));
} else {
	echo "调用出错：", $err;
}
*/

// post begain

function get_post($pid) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_post_json', array('pid'=>"$pid"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

function get_plist($id, $page) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_plist_json', array('id'=>"$id", "page"=>"$page"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

function get_post_count($id) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_post_count', array('id'=>"$id"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function add_post($catid, $ptitle, $pdetail, $uid) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('add_post', array('catid'=>"$catid", 'ptitle'=>"$ptitle", 'pdetail'=>"$pdetail", 'uid'=>"$uid"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function update_post($pid, $catid, $ptitle, $pdetail) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('update_post', array('pid'=>"$pid", 'catid'=>"$catid", 'ptitle'=>"$ptitle", 'pdetail'=>"$pdetail"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function del_post($pid) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('del_post', array('pid'=>"$pid"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

// post end

// comment begain

function add_comment( $pid, $uname, $cdetail, $uemail) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('add_comment', array('pid'=>"$pid", 'uname'=>"$uemail", 'uemail'=>"$uemail"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function del_comment($cid) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('del_comment', array('cid'=>"$cid"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function get_clist($id, $page) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_clist_json', array('id'=>"$id", "page"=>"$page"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

function get_comment_count($id) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_comment_count', array('id'=>"$id"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

// comment end

// category begain
function get_cat($catid) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_cat_json', array('catid'=>"$catid"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}
function get_catlist($sid) {
	$client = new soapclient ( $GLOBALS['baseurl'].'/db/nusoapService.php' );
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_catlist_json', array('sid'=>"$sid"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

function add_cat($sid, $catname, $catdesc) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('add_cat', array('catid'=>"$sid", 'catname'=>"$catname", 'catdesc'=>"$catdesc"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function del_cat($catid) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('del_cat', array('catid'=>"$catid"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function modify_cat($catid, $catname, $catdesc) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('modify_cat', array('catid'=>"$catid", 'catname'=>"$catname", 'catdesc'=>"$catdesc"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

// category end

// soption begain
function get_soption($sid) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_soption_json', array('sid'=>"$sid"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

function modify_slide($sid, $slide1i, $slide1h, $slide1p, $slide1a, $slide1b,
		$slide2i, $slide2h, $slide2p, $slide2a, $slide2b,
		$slide3i, $slide3h, $slide3p, $slide3a, $slide3b) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('modify_slide', array('sid'=>"$sid",
			'slide1i'=>"$slide1i", 'slide1h'=>"$slide1h", 'slide1p'=>"$slide1p", 'slide1a'=>"$slide1a", 'slide1b'=>"$slide1b",
			'slide2i'=>"$slide2i", 'slide2h'=>"$slide2h", 'slide2p'=>"$slide2p", 'slide2a'=>"$slide2a", 'slide2b'=>"$slide2b",
			'slide3i'=>"$slide3i", 'slide3h'=>"$slide3h", 'slide3p'=>"$slide3p", 'slide3a'=>"$slide3a", 'slide3b'=>"$slide3b"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function modify_intro($sid, $intro1h, $intro1a, $intro1p,
		$intro2h, $intro2a, $intro2p,
		$intro3h, $intro3a, $intro3p,
		$intro4h, $intro4a, $intro4p,
		$intro5h, $intro5a, $intro5p,
		$intro6h, $intro6a, $intro6p) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('modify_intro', array('sid'=>"$sid",
			'intro1h'=>"$intro1h", 'intro1a'=>"$intro1a", 'intro1p'=>"$intro1p",
			'intro2h'=>"$intro2h", 'intro2a'=>"$intro2a", 'intro2p'=>"$intro2p",
			'intro3h'=>"$intro3h", 'intro3a'=>"$intro3a", 'intro3p'=>"$intro3p",
			'intro4h'=>"$intro4h", 'intro4a'=>"$intro4a", 'intro4p'=>"$intro4p",
			'intro5h'=>"$intro5h", 'intro5a'=>"$intro5a", 'intro5p'=>"$intro5p",
			'intro6h'=>"$intro6h", 'intro6a'=>"$intro6a", 'intro6p'=>"$intro6p"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

// soption end

// school begain
function get_school($sid) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_school_json', array('sid'=>"$sid"));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

function add_school($sname, $sdesc, $suser, $spwd, $semail) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('add_school', array('sname'=>"$sname", 'sdesc'=>"$sdesc",
			'suser'=>"$suser", 'spwd'=>"$spwd", 'semail'=>"$semail"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function modify_school($sid, $sname, $sdesc, $semail, $suser, $spwd) {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('modify_school', array('sid'=>"$sid", 'sname'=>"$sname",
			'sdesc'=>"$sdesc", 'semail'=>"$semail", 'suser'=>"$suser", 'spwd'=>"$spwd"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function del_school($sid){
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('del_cat', array('sid'=>"$sid"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function login_suser($suser, $spwd){
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('login_suser', array('suser'=>"$suser", 'spwd'=>"$spwd"));
	if (! $err = $client->getError ()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function get_slist() {
	$client = new soapclient($GLOBALS['baseurl'].'/db/nusoapService.php');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';
	$result = $client->call('get_slist_json', array(''=>""));
	if (! $err = $client->getError ()) {
		return json_decode($result);
	} else {
		echo "调用出错：", $err;
	}
}

// school end
