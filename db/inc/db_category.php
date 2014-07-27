<?php
require_once 'db_all.php';

function get_cat($catid) {
	$cat = new stdClass();
	$cat->catid = get_from_category('catid', $catid);
	$cat->catname = get_from_category('catname', $catid);
	$cat->catdesc = get_from_category('catdesc', $catid);
	$cat->sid = get_from_category('sid', $catid);
	return $cat;
}

function get_catlist($sid) {
	$catlist = array();
	$catidarray = get_catidarray($sid);
	$cnt = 1;
	foreach($catidarray as $catid) {
		$cat = new stdClass();
		$cat = get_cat($catid);
		$catlist[$cnt++] = $cat;
	}
	return $catlist;
}

function add_cat($sid, $catname, $catdesc) {
	$conn = db_connect();
	$conn->query("insert into category(sid, catname, catdesc) values('".$sid."', '".$catname."', '".$catdesc."')");
	return '栏目添加成功！';
}

function del_cat($catid) {
	$conn = db_connect();
	$conn->query("delete from category where catid = '".$catid."'");
	return '栏目删除成功！';
}

function modify_cat($catid, $catname, $catdesc) {
	$conn = db_connect();
	$conn->query("update category set catname = '".$catname."', catdesc = '".$catdesc."' where catid = '".$catid."'");
	return '栏目修改成功！';
}

//////////////////////////////////////////////////////////////

function get_catidarray($sid) {
	$conn = db_connect();
	$catid_array = array();
	$result = $conn->query("select catid from category where sid='".$sid."' order by catid");
	for($count = 1; $row = $result->fetch_row (); ++ $count) {
		$catid_array [$count] = $row [0];
	}
	return $catid_array;
}
