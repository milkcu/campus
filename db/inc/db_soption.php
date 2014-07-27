<?php
require_once 'db_all.php';

function get_soption($sid) {
	$soption_obj = new stdClass();
	$soption_obj->pid = get_from_soption('pid', $sid);
	$soption_obj->slide1i = get_from_soption('slide1i', $sid);
	$soption_obj->slide1h = get_from_soption('slide1h', $sid);
	$soption_obj->slide1p = get_from_soption('slide1p', $sid);
	$soption_obj->slide1a = get_from_soption('slide1a', $sid);
	$soption_obj->slide1b = get_from_soption('slide1b', $sid);
	$soption_obj->slide2i = get_from_soption('slide2i', $sid);
	$soption_obj->slide2h = get_from_soption('slide2h', $sid);
	$soption_obj->slide2p = get_from_soption('slide2p', $sid);
	$soption_obj->slide2a = get_from_soption('slide2a', $sid);
	$soption_obj->slide2b = get_from_soption('slide2b', $sid);
	$soption_obj->slide3i = get_from_soption('slide3i', $sid);
	$soption_obj->slide3h = get_from_soption('slide3h', $sid);
	$soption_obj->slide3p = get_from_soption('slide3p', $sid);
	$soption_obj->slide3a = get_from_soption('slide3a', $sid);
	$soption_obj->slide3b = get_from_soption('slide3b', $sid);
	$soption_obj->intro1h = get_from_soption('intro1h', $sid);
	$soption_obj->intro1p = get_from_soption('intro1p', $sid);
	$soption_obj->intro1a = get_from_soption('intro1a', $sid);
	$soption_obj->intro2h = get_from_soption('intro2h', $sid);
	$soption_obj->intro2p = get_from_soption('intro2p', $sid);
	$soption_obj->intro2a = get_from_soption('intro2a', $sid);
	$soption_obj->intro3h = get_from_soption('intro3h', $sid);
	$soption_obj->intro3p = get_from_soption('intro3p', $sid);
	$soption_obj->intro3a = get_from_soption('intro3a', $sid);
	$soption_obj->intro4h = get_from_soption('intro4h', $sid);
	$soption_obj->intro4p = get_from_soption('intro4p', $sid);
	$soption_obj->intro4a = get_from_soption('intro4a', $sid);
	$soption_obj->intro5h = get_from_soption('intro5h', $sid);
	$soption_obj->intro5p = get_from_soption('intro5p', $sid);
	$soption_obj->intro5a = get_from_soption('intro5a', $sid);
	$soption_obj->intro6h = get_from_soption('intro6h', $sid);
	$soption_obj->intro6p = get_from_soption('intro6p', $sid);
	$soption_obj->intro6a = get_from_soption('intro6a', $sid);
	return $soption_obj;
}

function modify_slide($sid, $slide1i, $slide1h, $slide1p, $slide1a, $slide1b,
		$slide2i, $slide2h, $slide2p, $slide2a, $slide2b,
		$slide3i, $slide3h, $slide3p, $slide3a, $slide3b) {
	$conn = db_connect();
	$conn->query("update soption set slide1i = '".$slide1i."' where sid='".$sid."'");
	$conn->query("update soption set slide1h = '".$slide1h."' where sid='".$sid."'");
	$conn->query("update soption set slide1p = '".$slide1p."' where sid='".$sid."'");
	$conn->query("update soption set slide1a = '".$slide1a."' where sid='".$sid."'");
	$conn->query("update soption set slide1b = '".$slide1b."' where sid='".$sid."'");
	$conn->query("update soption set slide2i = '".$slide2i."' where sid='".$sid."'");
	$conn->query("update soption set slide2h = '".$slide2h."' where sid='".$sid."'");
	$conn->query("update soption set slide2p = '".$slide2p."' where sid='".$sid."'");
	$conn->query("update soption set slide2a = '".$slide2a."' where sid='".$sid."'");
	$conn->query("update soption set slide2b = '".$slide2b."' where sid='".$sid."'");
	$conn->query("update soption set slide3i = '".$slide3i."' where sid='".$sid."'");
	$conn->query("update soption set slide3h = '".$slide3h."' where sid='".$sid."'");
	$conn->query("update soption set slide3p = '".$slide3p."' where sid='".$sid."'");
	$conn->query("update soption set slide3a = '".$slide3a."' where sid='".$sid."'");
	$conn->query("update soption set slide3b = '".$slide3b."' where sid='".$sid."'");
}

function modify_intro($sid, $intro1h, $intro1a, $intro1p,
		$intro2h, $intro2a, $intro2p,
		$intro3h, $intro3a, $intro3p,
		$intro4h, $intro4a, $intro4p,
		$intro5h, $intro5a, $intro5p,
		$intro6h, $intro6a, $intro6p) {
	$conn = db_connect();
	$conn->query("update soption set intro1h = '".$intro1h."' where sid = '".$sid."'");
	$conn->query("update soption set intro1a = '".$intro1a."' where sid = '".$sid."'");
	$conn->query("update soption set intro1p = '".$intro1p."' where sid = '".$sid."'");
	$conn->query("update soption set intro2h = '".$intro2h."' where sid = '".$sid."'");
	$conn->query("update soption set intro2a = '".$intro2a."' where sid = '".$sid."'");
	$conn->query("update soption set intro2p = '".$intro2p."' where sid = '".$sid."'");
	$conn->query("update soption set intro3h = '".$intro3h."' where sid = '".$sid."'");
	$conn->query("update soption set intro3a = '".$intro3a."' where sid = '".$sid."'");
	$conn->query("update soption set intro3p = '".$intro3p."' where sid = '".$sid."'");
	$conn->query("update soption set intro4h = '".$intro4h."' where sid = '".$sid."'");
	$conn->query("update soption set intro4a = '".$intro4a."' where sid = '".$sid."'");
	$conn->query("update soption set intro4p = '".$intro4p."' where sid = '".$sid."'");
	$conn->query("update soption set intro5h = '".$intro5h."' where sid = '".$sid."'");
	$conn->query("update soption set intro5a = '".$intro5a."' where sid = '".$sid."'");
	$conn->query("update soption set intro5p = '".$intro5p."' where sid = '".$sid."'");
	$conn->query("update soption set intro6h = '".$intro6h."' where sid = '".$sid."'");
	$conn->query("update soption set intro6a = '".$intro6a."' where sid = '".$sid."'");
	$conn->query("update soption set intro6p = '".$intro6p."' where sid = '".$sid."'");
}

////////////////////////////////////////////////////////

function init_soption($sid) {
	$s = get_school($sid);
	$pid = add_post(0, $s->sname.'站点介绍', '请在这里填写站点介绍！', $sid);
	$conn = db_connect();
	$conn->query("insert into soption(
			sid, pid,
			slide1i, slide1h, slide1p, slide1a, slide1b,
			slide2i, slide2h, slide2p, slide2a, slide2b,
			slide3i, slide3h, slide3p, slide3a, slide3b,
			intro1h, intro1p, intro1a,
			intro2h, intro2p, intro2a,
			intro3h, intro3p, intro3a,
			intro4h, intro4p, intro4a,
			intro5h, intro5p, intro5a,
			intro6h, intro6p, intro6a) values (
			'".$sid."', '".$pid."',
			'http://xydd-xydd.stor.sinaapp.com/index/carousel1.jpg', '欢迎来到智慧校园', 
			'校园叮当是一个校园互动平台，传递信息，方便你我他。希望功能还在不断完善的校园叮当，能够为用户提供安全、方便、即时的信息服务。',
			'http://www.sdnu.edu.cn/', '现在注册',
			'http://xydd-xydd.stor.sinaapp.com/index/carousel1.jpg', '欢迎来到智慧校园', 
			'校园叮当是一个校园互动平台，传递信息，方便你我他。希望功能还在不断完善的校园叮当，能够为用户提供安全、方便、即时的信息服务。',
			'http://www.sdnu.edu.cn/', '现在注册',
			'http://xydd-xydd.stor.sinaapp.com/index/carousel1.jpg', '欢迎来到智慧校园', 
			'校园叮当是一个校园互动平台，传递信息，方便你我他。希望功能还在不断完善的校园叮当，能够为用户提供安全、方便、即时的信息服务。',
			'http://www.sdnu.edu.cn/', '现在注册',
			'新鲜事', 
			'大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……智慧校园作为一个信息平台横空出世。',
			'http://www.sdnu.edu.cn/',
			'新鲜事', 
			'大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……智慧校园作为一个信息平台横空出世。',
			'http://www.sdnu.edu.cn/',
			'新鲜事', 
			'大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……智慧校园作为一个信息平台横空出世。',
			'http://www.sdnu.edu.cn/',
			'新鲜事', 
			'大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……智慧校园作为一个信息平台横空出世。',
			'http://www.sdnu.edu.cn/',
			'新鲜事', 
			'大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……智慧校园作为一个信息平台横空出世。',
			'http://www.sdnu.edu.cn/',
			'新鲜事', 
			'大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……智慧校园作为一个信息平台横空出世。',
			'http://www.sdnu.edu.cn/'
			)");
	return '配置初始化成功！';
}
