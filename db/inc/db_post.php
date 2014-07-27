<?php
require_once 'db_all.php';

function get_post($pid) {
	$post = new stdClass();
	$post->pid = $pid;
	$post->ptitle = get_from_post('ptitle', $pid);
	$post->pcreated = get_from_post('pcreated', $pid);
	$post->pdetail = get_from_post('pdetail', $pid);
	$post->phit = get_from_post('phit', $pid);
	$post->catid = get_from_post('catid', $pid);
	$cat = get_cat($post->catid);
	$post->catname = $cat->catname;
	$post->uid = get_from_post('uid', $pid);
	$post->sid = $post->uid;
	$post->sname = get_from_shool('sname', $post->sid);
	$post->comment = get_clist_by_pid($pid);
	$new_phit = get_from_post('phit', $pid) + 1;
	$conn = db_connect();
	$conn->query ( "update post set phit = '" . $new_phit . "' where pid = '" . $pid . "'" );
	return $post;
}

function get_plist($id, $page) {
	$plist = array();
	$pidarray = get_pidarray_by_id($id, $page);
	$cnt = 1;
	foreach($pidarray as $pid) {
		$post = new stdClass();
		$post = get_post_private($pid);
		$plist[$cnt++] = $post;
	}
	return $plist;
}

function get_post_count($id) {
	$conn = db_connect();
	if(substr($id, 0, 1) == 'c') {
		$catid = substr($id, 1);
		$result = $conn->query("select count(*) from post where catid='".$catid."'");
	} else if(substr($id, 0, 1) == 's') {
		$sid = substr($id, 1);
		$result = $conn->query("select count(*) from post where catid in (select catid from category where sid='".$sid."')");
	} else if(substr($id, 0, 1) == 'a') {
		$result = $conn->query("select count(*) from post where pid > 0");
	}
	$row = $result->fetch_row();
	return $row[0];
}

function add_post($catid, $ptitle, $pdetail, $sid) {
	$conn = db_connect ();
	$conn->query ( "insert into post(catid, ptitle, pdetail, uid) values
			('" . $catid . "', '" . $ptitle . "', '" . $pdetail . "', '" . $sid . "')" );
	$result = $conn->query("select pid from post where uid = '".$sid."'");
	$row = $result->fetch_row();
	return $row[0];
}

function update_post($pid, $catid, $ptitle, $pdetail) {
	$conn = db_connect ();
	$conn->query("update post set catid = '".$catid."', ptitle = '".$ptitle."',
			pdetail = '".$pdetail."' where pid = '".$pid."'");
	return '更新成功！';
}

function del_post($pid) {
	$conn = db_connect();
	$conn->query("delete from post where pid='".$pid."'");
	return '删除成功！';
}

//////////////////////////////////////////////////////////////////////////////

function get_pidarray_by_id($id, $page) {
	$conn = db_connect();
	$item_begin = 15*($page-1);
	$pidarray = array();
	if(substr($id, 0, 1) == 's') {
		$sid = substr($id, 1);
		$result = $conn->query ( "select pid from post where catid in (select catid from category where sid = '".$sid."') order by pcreated desc limit ".$item_begin.", 15" );
	} else if(substr($id, 0, 1) == 'c') {
		$catid = substr($id, 1);
		$result = $conn->query ( "select pid from post where catid = '" . $catid . "' order by pcreated desc limit ".$item_begin.", 15" );
	} else if(substr($id, 0, 1) == 'a') {
		$result = $conn->query("select pid from post where pid > 0 order by pcreated desc limit ".$item_begin.", 15");
	}
	for($count = 1; $row = $result->fetch_row (); ++ $count) {
		$pidarray [$count] = $row [0];
	}
	return $pidarray;
}

function get_post_private($pid) {
	// 少了加载评论，多了摘要提取，没有文章全文
	$post = new stdClass();
	$post->pid = $pid;
	$post->ptitle = get_from_post('ptitle', $pid);
	$post->pcreated = get_from_post('pcreated', $pid);
	$pdetail = get_from_post('pdetail', $pid);
	$post->phit = get_from_post('phit', $pid);
	$digest = strip_tags($pdetail);
	$digest = str_replace('&nbsp;', '', $digest);
	$digest = str_replace(' ', '', $digest);
	$digest = trim($digest);
	//$digest = mb_substr($digest, 0, 300);
	$digest = mb_substr($digest, 0, 60, 'utf-8');
	$post->pdigest = $digest;
	$post->catid = get_from_post('catid', $pid);
	$cat = get_cat($post->catid);
	$post->catname = $cat->catname;
	$post->uid = get_from_post('uid', $pid);
	$post->sid = $post->uid;
	$post->sname = get_from_shool('sname', $post->sid);
	return $post;
}
