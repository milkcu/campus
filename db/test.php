<?php
require_once 'inc/db_all.php';
//require_once '../config.php';
//require_once 'nusoapService.php';
//print_r(show_post(46));
//print_r(json_encode(show_post(46)));
//print_r(get_cid_array_json(46));
//print_r(show_comment(1));
//print_r(get_comment_uid(2));
//print_r(show_user(1));
//print_r(register('ww12', 'hello', 'ww12'));
//send_html_mail('184324224@qq.com', 'test', 'hi');
//print_r(get_cid_array(63));
//$pid_array = get_pid_array('know', 1);
//print_r($pid_array);
//$post_obj = show_post(37);
//print_r($post_obj->pcreated);
//echo '==========================================';
//echo strtotime($post_obj->pcreated);
//$r = strip_tags($post_obj->pdetail);
//print_r($r);
//add_school('山东师范大学', '山东师范大学是位于中国山东省的一所师范类院校。山东师范大学的前身为成立于1950年的山东师范学院，是建国后山东省最早成立的高校之一。');
//add_school('SDNU', 'Shandong Normal University.');
//print_r(get_sname_by_sid(4));
/*
$sid = 1;
$catname = '新鲜事';
$catdesc = '大千校园，无奇不有，每刻都有新鲜事发生。分享新鲜事，快乐你我他。想关心学校大事、想了解校园新鲜事……校园叮当作为一个信息平台横空出世。';
add_cat($sid, $catname, $catdesc);
*/
//echo init_soption(1);
//get_slide1(1);
//print_r(get_from_soption('website', '1'));
//print_r(show_soption(1));
//echo add_post(1, '测试', '测试内容', 1);
//echo get_catname_by_catid(1);
//print_r(get_catid_array(1));
//print_r(show_post(1));
//print_r(display_comment_form ( $pid ));
//print_r(get_cid_array(1));

//print_r(show_post_list('c1', '1'));
//print_r(show_user_list(1, 1));
//print_r(su_login('sdu', 'sdu'));
//echo su_login('sdu', 'sdu');
//add_school('a', 'b', 'c', 'd', 'e');
//print_r(show_school(6));
//print_r(get_post_count('s90'));
//print_r(get_from_user('uhead', 1));
//print_r(get_school(1));
//print_r(get_slist());
//print_r(get_cat(1));
/*
$t = strtotime(get_post(1)->pcreated);
if($t - time() < '86400') {
	print_r(date("H:i", $t));
} else {
	print_r(date("n月j日", $t));
}
*/
//print_r(get_from_post('ptitle', 1));
//print_r(get_plist(1, 1));
//print_r(get_post_count('c1'));
//print_r(get_catlist(6));
//print_r(get_clist(1));
//print_r(get_cidarray_by_pid(1));
//print_r(get_from_comment('cdetail', 5));
//print_r(get_slist());
//print_r(get_plist('a', 1));
//print_r(add_comment(14, 'a', 'b', 'c'));
//print_r(get_post_count('s7'));
print_r(get_clist('s1', 1));
print_r(get_cidarray_by_id('s1', 1));
