<?php

require_once 'db_all.php';

function get_school($sid) {
	$school_obj = new stdClass();
	$school_obj->sid = $sid;
	$school_obj->sname = get_from_shool('sname', $sid);
	$school_obj->sdesc = get_from_shool('sdesc', $sid);
	$school_obj->suser = get_from_shool('suser', $sid);
	$school_obj->spwd = get_from_shool('spwd', $sid);
	$school_obj->semail = get_from_shool('semail', $sid);
	$school_obj->screated = get_from_shool('screated', $sid);
	$school_obj->slogged = get_from_shool('slogged', $sid);
	$school_obj->pcount = get_post_count('s'.$sid);
	return $school_obj;
}

function add_school($sname, $sdesc, $suser, $spwd, $semail) {
	$conn = db_connect();
	$result = $conn->query("select * from school where sname='".$sname."'");
	if($result->num_rows != 0) {
		return 0;
	}
	if(!$conn->query("insert into school(sname, sdesc, suser, spwd, semail) values
			('".$sname."', '".$sdesc."', '".$suser."', '".$spwd."', '".$semail."')")) {
			print_r($conn->error);
	}
	$result = $conn->query("select sid from school where suser='".$suser."'");
	$row = $result->fetch_row();
	$sid = $row[0];
	init_soption($sid);
	return $sid;
}

function modify_school($sid, $sname, $sdesc, $semail, $suser, $spwd) {
	$conn = db_connect();
	$conn->query("update school set sname = '".$sname."', sdesc = '".$sdesc."', semail = '".$semail."',
			suser = '".$suser."', spwd = '".$spwd."' where sid = '".$sid."'");
	return 0;
}

function del_school($sid) {
	$conn = db_connect();
	$conn->query("delete from school where sid = '".$sid."'");
	return 0;
}

function login_suser($suser, $spwd) {
	// 登录成功返回管理员id
	$conn = db_connect ();
	$result = $conn->query ( "select * from school where suser='" . $suser . "' and spwd = '" . $spwd . "'" );
	if ($result->num_rows == 1) {
		return get_sid_by_suser ( $suser );
	} else {
		return 0;
	}
}

function get_slist() {
	$conn = db_connect ();
	$result = $conn->query("select sid from school");
	$sidarray = array();
	for($cnt = 0; $row = $result->fetch_row(); $cnt++) {
		$sidarray[$cnt] = $row[0];
	}
	$slist = array();
	$cnt = 1;
	foreach($sidarray as $sid) {
		$s = new stdClass();
		$s = get_school_private($sid);
		$slist[$cnt++] = $s;
	}
	return $slist;
}

//////////////////////////////////////////////////////////////////

function get_sid_by_suser($suser) {
	$conn = db_connect();
	$result = $conn->query("select sid from school where suser='".$suser."'");
	$row = $result->fetch_row();
	return $row[0];
}

function get_school_private($sid) {
	$school_obj = new stdClass();
	$school_obj->sid = $sid;
	$school_obj->sname = get_from_shool('sname', $sid);
	$school_obj->sdesc = get_from_shool('sdesc', $sid);
	return $school_obj;
}
