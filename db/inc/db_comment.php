<?php
require_once 'db_all.php';

function add_comment($pid, $uname, $cdetail, $uemail) {
	$conn = db_connect ();
	$conn->query ( "insert into comment(pid, uname, cdetail, uemail) 
			values('" . $pid . "', '" . $uname . "', '" . $cdetail . "', '".$uemail."')" );
	return '评论成功！';
}

function del_comment($cid) {
	$conn = db_connect();
	$conn->query("delete from comment where cid='".$cid."'");
	return '删除成功！';
}

function get_clist($id, $page) {
	$clist = array();
	$cidarray = get_cidarray_by_id($id, $page);
	$cnt = 1;
	foreach($cidarray as $cid) {
		$c = new stdClass();
		$c = get_comment($cid);
		$clist[$cnt++] = $c;
	}
	return $clist;
}

function get_comment_count($id) {
	$conn = db_connect();
	if(substr($id, 0, 1) == 's') {
		$sid = substr($id, 1);
		$result = $conn->query("select count(*) from comment where pid in (select pid from post where uid='".$sid."')");
	}
	$row = $result->fetch_row();
	return $row[0];
}

//////////////////////////////////////////////////////

function get_clist_by_pid($pid) {
	$clist = array();
	$cidarray = get_cidarray_by_pid($pid);
	$cnt = 1;
	foreach($cidarray as $cid) {
		$c = new stdClass();
		$c = get_comment($cid);
		$clist[$cnt++] = $c;
	}
	return $clist;
}

function get_comment($cid) {
	$c = new stdClass();
	$c->cid = $cid;
	$c->cdetail = get_from_comment('cdetail', $cid);
	$c->ccreated = get_from_comment('ccreated', $cid);
	$c->pid = get_from_comment('pid', $cid);
	$c->ptitle = get_from_post('ptitle', $c->pid);
	$c->uname = get_from_comment('uname', $cid);
	$c->uemail = get_from_comment('uemail', $cid);
	return $c;
}

function get_cidarray_by_pid($pid) {
	$conn = db_connect ();
	$result = $conn->query ( "select cid from comment where pid = '" . $pid . "'" );
	$cidarray = array ();
	for($count = 1; $row = $result->fetch_row (); ++ $count) {
		$cidarray [$count] = $row [0];
	}
	return $cidarray;
}

function get_cidarray_by_id($id, $page) {
	$conn = db_connect();
	$item_begin = 15*($page-1);
	$cidarray = array();
	if(substr($id, 0, 1) == 's') {
		$sid = substr($id, 1);
		$result = $conn->query ( "select cid from comment where pid in (select pid from post where uid='".$sid."') order by ccreated desc limit ".$item_begin.", 15" );
	}
	for($count = 1; $row = $result->fetch_row (); ++ $count) {
		$cidarray [$count] = $row [0];
	}
	return $cidarray;
}
