<?php
require_once 'db_all.php';
require_once '../config.php';
function db_connect() {
	$user = $GLOBALS['user'];
	$password = $GLOBALS['password'];
	$host = $GLOBALS['host'];
	$port = $GLOBALS['port'];
	$database = $GLOBALS['database'];
	$result = new mysqli ( $host, $user, $password, $database, $port );
	$result->query("set names utf8");
	$result->query("set character set utf8");
	return $result;
}

function get_from_post($q, $pid) {
	$conn = db_connect();
	$result = $conn->query("select ".$q." from post where pid = '".$pid."'");
	$row = $result->fetch_row();
	return $row[0];
}

function get_from_comment($q, $cid) {
	$conn = db_connect();
	$result = $conn->query("select ".$q." from comment where cid = '".$cid."'");
	$row = $result->fetch_row();
	return $row[0];
}

function get_from_user($q, $uid) {
	$conn = db_connect ();
	$result = $conn->query ( "select ".$q." from user where uid='" . $uid . "'" );
	$row = $result->fetch_row ();
	return $row [0];
}

function get_from_category($q, $catid) {
	$conn = db_connect ();
	$result = $conn->query ( "select ".$q." from category where catid='" . $catid . "'" );
	$row = $result->fetch_row ();
	return $row [0];
}

function get_from_soption($q, $sid) {
	$conn = db_connect();
	$result = $conn->query("select ".$q." from soption where sid='".$sid."'");
	$r = $result->fetch_row();
	return $r[0];
}

function get_from_shool($q, $sid) {
	$conn = db_connect();
	$result = $conn->query("select ".$q." from school where sid='".$sid."'");
	$row = $result->fetch_row();
	return $row[0];
}
