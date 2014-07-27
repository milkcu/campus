<?php
require_once 'inc/page_all.php';
//require_once 'nusoapClient.php';
require_once '../db/inc/db_all.php';
session_start ();
if(isset($_GET['view'])) {
	$view = $_GET['view'];
} else {
	$view = 'index';
}

switch ($view) {
case 'index' :
	if(isset($_GET['sid'])) {
		$sid = $_GET['sid'];
	} else {
		$sid = 0;
	}
	display_html_header($sid, '首页');
	if($sid != 0) {
		display_carousel($sid);
		display_simple_introduction ($sid);
	} else {
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = 1;
		}
		display_all_plist($page);
	}
	break;
case 'list' :
	$catid = $_GET['catid'];
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	$cat = get_cat($catid);
	$s = get_school($cat->sid);
	display_html_header($cat->sid, $cat->catname);
	display_plist($catid, $page);
	break;
case 'post' :
	$pid = $_GET['pid'];
	$post = get_post($pid);
	display_html_header($post->sid, $post->ptitle.' - '.$post->catname);
	echo "<div class='container' id='ptitle'>$post->ptitle</div>";
	echo '<ol class="breadcrumb">';
	echo '<li><a href="./">'.'智慧校园'.'</a></li>';
	echo '<li><a href="./?view=index&sid='.$post->sid.'">'.$post->sname.'</a></li>';
	echo '<li><a href="./?view=list&catid='.$post->catid.'">'.$post->catname.'</a></li>';
	echo '<li><a class="active" href="./?view=post&pid='.$post->pid.'">'.$post->ptitle.'</a></li>';
	echo '</ol>';
	echo '<div class="well well-lg container post-detail" id="post-detail">';
	echo $post->pdetail;
	echo '</div>';
	display_comment_form($pid);
	display_comment_list($post->comment);
	break;
case 'process' :
	$pid = $_POST ['pid'];
	$uname = $_POST ['uname'];
	$cdetail = $_POST ['cdetail'];
	$uemail = $_POST ['uemail'];
	add_comment ( $pid, $uname, $cdetail, $uemail );
	$post = get_post($pid);
	$cat = get_cat($post->catid);
	$sid = $cat->sid;
	display_html_header ($sid, '评论成功' );
	echo '评论成功！';
	break;
case 'mind' :
	display_html_header (0, '思维导图' );
	echo '<iframe id="iFrame1" name="iFrame1" width="100%" onload="this.height=iFrame1.document.body.scrollHeight" frameborder=0 scrolling="no" src="./inc/mind.html"></iframe>';
	break;
case 'service' :
	display_html_header (0, '服务接口' );
	echo '<iframe id="iFrame1" name="iFrame1" width="100%" onload="this.height=iFrame1.document.body.scrollHeight" frameborder=0 scrolling="no" src="../db/nusoapService.php"></iframe>';
	break;
}

display_html_footer();
