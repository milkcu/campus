<?php
require_once 'inc/page_all.php';
require_once 'nusoapClient.php';
require_once '../config.php';
//print_r(show_post(46));
//$cid_array = (array)get_cid_array(46);
//print_r( $cid_array);
//print_r( (array)get_cid_array(46));
//print_r(json_encode(show_post(46)));
//print_r(show_user(1));
//print_r(register('milkcu2', '03018981299', 'milkcu2@163.com'));
//print_r($_SERVER);
//print_r(get_pid_array('com', 1));
//echo $GLOBALS['baseurl'];
//print_r(get_sdesc_by_sid(5));
//$sid = 1;
//$catname = '校园知道';
//$catdesc = '校园生活中，肯定会遇到千奇百怪的问题，不同学校情况不一样。选课系统怎么用、笔记本无法开机如何是好……校园叮当作为问问知道平台闪亮登场。';
//add_cat($sid, $catname, $catdesc);
//print_r(show_soption(1));
/*
$tmp = array();
$tmp = get_catid_array(1, 1);
print_r($tmp);
foreach ($tmp as $pid) {
	print_r($pid);
}
*/
//show_post(1);
//print_r(display_comment_form ( 1 ));
//display_comment_list();
//get_cid_array(1);
//echo get_sid_by_catid(1);
//print_r(array_reverse(show_comment(1)));
//print_r((array)get_cid_array(1));
//$cid_array = (array)get_cid_array(1);
//print_r($cid_array);
//echo count($cid_array);
//display_comment_list($cid_array);
//print_r(get_slist());
//print_r(get_cat(1));
//print_r(get_plist(1, 1));
//print_r(get_post_count('c1'));
//print_r(get_catlist(6));
//print_r(get_post(1));
//print_r(get_plist('c1', 1));
//print_r(get_cat(4));
//print_r(get_slist());
//print_r(add_comment(14, 'a', 'b', 'c'));
?>
<html>
<head>
<title>弹窗测试</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
</head>
<body>
<!--jquery右下角pop弹窗start -->
<script type="text/javascript" src="./js/yanue.pop.js"></script>
<script type="text/javascript" >
	  //记得加载jquery
	  //作者：yanue
	  //使用参数：1.标题，2.链接地址，3.内容简介
	  window.onload=function(){
			var pop=new Pop("这里是标题，哈哈",
			"http://www.yanue.info/js/pop/pop.html",
			"请输入你的内容简介，这里是内容简介.请输入你的内容简介，这里是内容简介.请输入你的内容简介，这里是内容简介");
		}
</script>
<div id="pop" style="display:none;">
	<style type="text/css">
	*{margin:0;padding:0;}
	#pop{background:#fff;width:260px;border:1px solid #e0e0e0;font-size:12px;position: fixed;right:10px;bottom:10px;}
	#popHead{line-height:32px;background:#f6f0f3;border-bottom:1px solid #e0e0e0;position:relative;font-size:12px;padding:0 0 0 10px;}
	#popHead h2{font-size:14px;color:#666;line-height:32px;height:32px;}
	#popHead #popClose{position:absolute;right:10px;top:1px;}
	#popHead a#popClose:hover{color:#f00;cursor:pointer;}
	#popContent{padding:5px 10px;}
	#popTitle a{line-height:24px;font-size:14px;font-family:'微软雅黑';color:#333;font-weight:bold;text-decoration:none;}
	#popTitle a:hover{color:#f60;}
	#popIntro{text-indent:24px;line-height:160%;margin:5px 0;color:#666;}
	#popMore{text-align:right;border-top:1px dotted #ccc;line-height:24px;margin:8px 0 0 0;}
	#popMore a{color:#f60;}
	#popMore a:hover{color:#f00;}
	</style>
	<div id="popHead">
	<a id="popClose" title="关闭">关闭</a>
	<h2>温馨提示</h2>
	</div>
	<div id="popContent">
	<dl>
		<dt id="popTitle"><a href="http://yanue.info/" target="_blank">这里是参数</a></dt>
		<dd id="popIntro">这里是内容简介</dd>
	</dl>
	<p id="popMore"><a href="http://yanue.info/" target="_blank">查看 »</a></p>
	</div>
</div>
<!--右下角pop弹窗 end-->
</body>
</html>

