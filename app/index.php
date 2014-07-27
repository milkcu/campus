<?php
//require_once 'nusoapClient.php';
require_once '../db/inc/db_all.php';
require_once '../config.php';

if(isset($_GET['view'])) {
	$view = $_GET['view'];
} else {
	$view = 'list';
}

switch($view) {
case 'list':
	// app/?view=list&sid=1
	if(isset($_GET['sid'])) {
		$sid = $_GET['sid'];
	} else {
		$sid = 0;
	}
	$catlist = get_catlist($sid);
	$obj = new stdClass();
	$obj->response = new stdClass();
	$obj->response->date = time();
	$tmpcat = array();
	if($sid == 0) {
		$tmpcat[0] = new stdClass();
		$tmpcat[0]->name = "最新推荐";
		$tmpcat[0]->url = 'http://api.eoe.cn//client/wiki?k=lists&t=new';
		$tmpcat[1] = new stdClass();
		$tmpcat[1]->name = "系统信息";
		$tmpcat[1]->url = '';
	} else {
		$cnt = 0;
		foreach ($catlist as $cat) {
			$tmpcat[$cnt] = new stdClass();
			$tmpcat[$cnt]->name = $cat->catname;
			$tmpcat[$cnt]->url = 'http://api.eoe.cn//client/wiki?k=lists&t=new';
			$cnt++;
		}
	}
	$obj->response->categorys = $tmpcat;
	$tmplist = array();
	if($sid == 0) {
		$tmplist[0] = new stdClass();
		$tmplist[0]->more_url = $GLOBALS['baseurl'].'/app/?view=more&catid=0&page=2';
		$tmplist[0]->name = '最新推荐';
		$tmpitems = array();
		$cnt1 = 0;
		$plist = get_plist('a', '1');
		foreach($plist as $post) {
			$tmpitems[$cnt1] = new stdClass();
			$tmpitems[$cnt1]->title = $post->ptitle;
			$tmpitems[$cnt1]->id = $post->pid;
			$tmpitems[$cnt1]->time = strtotime($post->pcreated);
			$tmpitems[$cnt1]->detail_url = $GLOBALS['baseurl'].'/app/?view=post&pid='.$post->pid;
			$cnt1++;
		}
		$tmplist[0]->items = $tmpitems;
		
		$tmplist[1] = new stdClass();
		$tmplist[1]->more_url = '';
		$tmplist[1]->name = '系统信息';
		$tmpitems = array();
		$tmpitems[0] = new stdClass();
		$tmpitems[0]->title = '架构设计';
		$tmpitems[0]->id = '3';
		$tmpitems[0]->time = time();
		$tmpitems[0]->detail_url = $GLOBALS['baseurl'].'/app/?view=post&pid=3';
		$tmpitems[1] = new stdClass();
		$tmpitems[1]->title = '接口说明';
		$tmpitems[1]->id = '2';
		$tmpitems[1]->time = time();
		$tmpitems[1]->detail_url = $GLOBALS['baseurl'].'/app/?view=post&pid=2';
		$tmpitems[2] = new stdClass();
		$tmpitems[2]->title = '系统介绍';
		$tmpitems[2]->id = '1';
		$tmpitems[2]->time = time();
		$tmpitems[2]->detail_url = $GLOBALS['baseurl'].'/app/?view=post&pid=1';
		$tmplist[1]->items = $tmpitems;
	} else {
		$cnt = 0;
		foreach ($catlist as $cat) {
			$tmplist[$cnt] = new stdClass();
			$tmplist[$cnt]->more_url = $GLOBALS['baseurl'].'/app/?view=more&catid='.$cat->catid.'&page=2';
			$tmplist[$cnt]->name = $cat->catname;
			$tmpitems = array();
			$cnt1 = 0;
			$plist = get_plist('c'.$cat->catid, '1');
			foreach($plist as $post) {
				$tmpitems[$cnt1] = new stdClass();
				$tmpitems[$cnt1]->title = $post->ptitle;
				$tmpitems[$cnt1]->id = $post->pid;
				$tmpitems[$cnt1]->time = strtotime($post->pcreated);
				$tmpitems[$cnt1]->detail_url = $GLOBALS['baseurl'].'/app/?view=post&pid='.$post->pid;
				$cnt1++;
			}
			$tmplist[$cnt]->items = $tmpitems;
			$cnt++;
		}
	}
	$obj->response->list = $tmplist;
	break;
case 'post':
	// app/?view=post&pid=1
	if(isset($_GET['pid'])) {
		$pid = $_GET['pid'];
	} else {
		$pid = 1;
	}
	$post = get_post($pid);
	$obj = new stdClass();
	$obj->response = new stdClass();
	$style = '<style>#post-content img{max-width: 300px; max-height: 250px; }</style>';
	$content = $style.'<h2>'.$post->ptitle.'</h2><div id="post-content">'.$post->pdetail.'</div>';
	//$obj->response->content = $post->pdetail;
	$obj->response->content = $content;
	$obj->response->share_url = $GLOBALS['baseurl'].'/web/?view=post&pid='.$post->pid;
	$obj->response->comment_num = 0;
	$obj->response->bar = new stdClass();
	$obj->response->bar->comment = new stdClass();
	$obj->response->bar->comment->get = 'http://api.eoe.cn/client/bar?k=comment&model=blog&type=lists&itemid=237';
	$obj->response->bar->comment->submit = 'http://api.eoe.cn/client/bar?k=comment&model=blog&itemid=237&type=submit';
	$obj->response->bar->userlike = new stdClass();
	$obj->response->bar->userlike->good = '';
	$obj->response->bar->userlike->bad = '';
	$obj->response->bar->favorite = '';
	break;
case 'more':
	// app/?view=more&catid=1&page=2
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 2;
	}
	if(isset($_GET['catid'])) {
		$catid = $_GET['catid'];
		if($catid != 0) {
			$plist = get_plist('c'.$catid, $page);
		} else {
			$plist = get_plist('a', $page);
		}
	} else {
		$catid = 0;
		$plist = get_plist('a', $page);
	}
	$nextpage = $page + 1;
	$obj = new stdClass();
	$obj->response = new stdClass();
	$obj->response->more_url = $GLOBALS['baseurl'].'/app/?view=more&catid='.$catid.'&page='.$nextpage;
	$obj->response->name = '更多';
	$tmpitems = array();
	$cnt = 0;
	foreach ($plist as $post) {
		$tmpitems[$cnt] = new stdClass();
		$tmpitems[$cnt]->title = $post->ptitle;
		$tmpitems[$cnt]->id = $post->pid;
		$tmpitems[$cnt]->time = strtotime($post->pcreated);
		$tmpitems[$cnt]->detail_url = $GLOBALS['baseurl'].'/app/?view=post&pid='.$post->pid;
		$cnt++;
	}
	$obj->response->items = $tmpitems;
	break;
}

//print_r($obj);
print_r(json_encode($obj));

