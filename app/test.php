<?php
require_once '../db/inc/db_post.php';
//$f = file_get_contents("http://api.eoe.cn/client/wiki?k=lists");
//$f = file_get_contents("http://api.eoe.cn/client/wiki?k=show&id=454");
//$f = file_get_contents("http://api.eoe.cn/client/bar?k=comment&model=blog&type=lists&itemid=454");
//$f = file_get_contents("http://api.eoe.cn/client/wiki?k=show&id=237");
//$f = file_get_contents("http://api.eoe.cn/client/wiki?k=lists&pageNum=2&t=new");
//$f = json_decode($f);
//print_r($f);
//print_r(get_plist('a', 1));
//print_r(get_pidarray_by_id('a', 1));
//print_r(get_pidarray_by_id('c99', 1));
$page = 2;
$w = "/app/?view=more&catid='.$catid.'&page='.$page+1";
print_r($w);
