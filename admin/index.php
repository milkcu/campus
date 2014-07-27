<?php

require_once 'inc/mng_all.php';
//require_once 'nusoapClient.php';
require_once '../db/inc/db_all.php';
session_start ();
if(isset($_GET['view'])) {
	$view = $_GET['view'];
} else {
	$view = 'index';
}

if(!isset($_SESSION['sid'])) {
	if($view == 'su') {
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'modify';
		}
		if($action == 'register') {
			display_mng_header('注册页面');
			display_su_register_form();
		} else if($action == 'login') {
			display_mng_header('登录页面');
			display_su_login_form();
		} else if($action == 'process') {
			display_mng_header('管理员');
			$from = $_GET['from'];
			if($from == 'register') {
				$sname = $_POST['sname'];
				$sdesc = $_POST['sdesc'];
				$suser = $_POST['suser'];
				$spwd = $_POST['spwd'];
				$spwd2 = $_POST['spwd2'];
				$semail = $_POST['semail'];
				if($spwd != $spwd2) {
					echo '两次输入的密码不一致！';
					return;
				}
				if($sname == '' || $sdesc == '' || $suser == '' || $spwd == '' || $semail == '') {
					echo '请填写所有项！';
					return;
				}
				$sid = add_school($sname, $sdesc, $suser, $spwd, $semail);
				if($sid == 0) {
					echo '用户名已注册！';
				} else {
					$_SESSION['sid'] = $sid;
					echo '注册成功！';
				}
			} else if($from == 'login') {
				$suser = $_POST['suser'];
				$spwd = $_POST['spwd'];
				if($suser == '' || $spwd == '') {
					echo '请填写所有项！';
					return;
				}
				$sid = login_suser($suser, $spwd);
				if($sid == 0) {
					echo '请输入正确的用户名或密码！';
				} else {
					$_SESSION['sid'] = $sid;
					echo '登录成功';
				}
			}
		} else {
			display_mng_header('登录页面');
			display_su_login_form();
		}
	} else if($view == 'help') {
		display_mng_header('帮助');
		display_help_page();
	} else {
		display_mng_header('登录页面');
		display_su_login_form();
	}
} else {
	$sid = $_SESSION['sid'];
	switch ($view) {
	case 'index':
		$soption = get_soption($sid);
		display_mng_header('欢迎');
		display_school_state($sid);
		display_index_shortcut($soption);
		break;
	case 'su' :
		display_mng_header('管理员');
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'modify';
		}
		if($action == 'modify') {
			if(isset($_SESSION['sid'])) {
				$sid = $_SESSION['sid'];
				display_su_modify_form($sid);
			} else {
				display_su_login_form();
			}
		} else if($action == 'process') {
			$from = $_GET['from'];
			if($from == 'modify') {
				$sid = $_SESSION['sid'];
				$sname = $_POST['sname'];
				$sdesc = $_POST['sdesc'];
				$suser = $_POST['suser'];
				$spwd = $_POST['spwd'];
				$semail = $_POST['semail'];
					
				modify_school($sid, $sname, $sdesc, $semail, $suser, $spwd);
				echo '资料修改成功！';
			} else if($from == 'logout') {
				session_destroy ();
				echo '退出成功！';
			}
		}
		break;
	case 'list':
		display_mng_header('文章管理');
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'show';
		}
		if($action == 'show') {
			if(isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page = 1;
			}
			display_school_post_list($sid, $page);
		} else if($action == 'delete') {
			$pid = $_GET['pid'];
			del_post($pid);
			echo '删除成功！';
		} else if($action == 'modify') {
			$pid = $_GET['pid'];
			display_post_modify_form($pid);
		} else if($action == 'update') {
			$catid = $_POST ['catid'];
			$ptitle = $_POST ['ptitle'];
			$pid = $_GET['pid'];
			if(isset($_POST['content1']) && $_POST['content1'] != '') {
				$content = $_POST['content1'];
			} else {
				$content = $_POST['content2'];
			}
			if (!get_magic_quotes_gpc ()) {
				$pdetail = addslashes ( $content );
			} else {
				$pdetail = $content;
			}
			update_post ($pid,  $catid, $ptitle, $pdetail );
			echo '更新成功！';
		}
		break;
	case 'cat' :
		display_mng_header('栏目管理');
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'modify';
		}
		if($action == 'modify') {
			display_modify_cat_form($sid);
			display_add_cat_form($sid);
		} else if($action == 'add') {
			display_add_cat_form($sid);
		} else if($action == 'process') {
			$from = $_GET['from'];
			if($from == 'add') {
				$catname = $_POST['catname'];
				$catdesc = $_POST['catdesc'];
				add_cat($sid, $catname, $catdesc);
				echo '栏目添加成功！';
			} else if($from == 'del') {
				$catid = $_POST['catid'];
				del_cat($catid);
				echo '栏目删除成功！';
			} else if($from == 'modify') {
				$catid = $_POST['catid'];
				$catname = $_POST['catname'];
				$catdesc = $_POST['catdesc'];
				modify_cat($catid, $catname, $catdesc);
				echo '栏目修改成功！';
			}
		}
		break;
	case 'slide' :
		display_mng_header('图片管理');
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'modify';
		}
		if($action == 'modify') {
			display_modify_slide($sid);
		} else if($action == 'process') {
			$slide1i = $_POST['slide1i'];
			$slide1h = $_POST['slide1h'];
			$slide1p = $_POST['slide1p'];
			$slide1a = $_POST['slide1a'];
			$slide1b = $_POST['slide1b'];
		
			$slide2i = $_POST['slide2i'];
			$slide2h = $_POST['slide2h'];
			$slide2p = $_POST['slide2p'];
			$slide2a = $_POST['slide2a'];
			$slide2b = $_POST['slide2b'];
		
			$slide3i = $_POST['slide3i'];
			$slide3h = $_POST['slide3h'];
			$slide3p = $_POST['slide3p'];
			$slide3a = $_POST['slide3a'];
			$slide3b = $_POST['slide3b'];
		
			modify_slide($sid, $slide1i, $slide1h, $slide1p, $slide1a, $slide1b,
			$slide2i, $slide2h, $slide2p, $slide2a, $slide2b,
			$slide3i, $slide3h, $slide3p, $slide3a, $slide3b);
			echo '幻灯片修改成功！';
		
		}
		break;
	case 'intro' :
		display_mng_header('文字管理');
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'modify';
		}
		if($action == 'modify') {
			display_modify_intro($sid);
		} else if($action == 'process') {
			$intro1h = $_POST['intro1h'];
			$intro1p = $_POST['intro1p'];
			$intro1a = $_POST['intro1a'];
		
			$intro2h = $_POST['intro2h'];
			$intro2p = $_POST['intro2p'];
			$intro2a = $_POST['intro2a'];
		
			$intro3h = $_POST['intro3h'];
			$intro3p = $_POST['intro3p'];
			$intro3a = $_POST['intro3a'];
		
			$intro4h = $_POST['intro4h'];
			$intro4p = $_POST['intro4p'];
			$intro4a = $_POST['intro4a'];
		
			$intro5h = $_POST['intro5h'];
			$intro5p = $_POST['intro5p'];
			$intro5a = $_POST['intro5a'];
		
			$intro6h = $_POST['intro6h'];
			$intro6p = $_POST['intro6p'];
			$intro6a = $_POST['intro6a'];
		
			modify_intro($sid, $intro1h, $intro1a, $intro1p,
			$intro2h, $intro2a, $intro2p,
			$intro3h, $intro3a, $intro3p,
			$intro4h, $intro4a, $intro4p,
			$intro5h, $intro5a, $intro5p,
			$intro6h, $intro6a, $intro6p);
		
			echo '引导文字修改成功！';
		}
		break;
	case 'post' :
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'add';
		}
		if($action == 'show') {
			// 输出整篇文章
			if(isset($_GET['pid'])) {
				$action = $_GET['pid'];
			}
			$pid = $_GET['pid'];
			$post = get_post($pid);
			display_mng_header($post->ptitle);
			echo "<div class='container'><h2>$post->ptitle</h2></div>";
			echo '<ol class="breadcrumb">';
			echo '<li><a href="./">'.'智慧校园'.'</a></li>';
			echo '<li><a href="./?view=index&sid='.$post->sid.'">'.$post->sname.'</a></li>';
			echo '<li><a href="./?view=list&catid='.$post->catid.'">'.$post->catname.'</a></li>';
			echo '<li><a class="active" href="./?view=post&pid='.$post->pid.'">'.$post->ptitle.'</a></li>';
			echo '</ol>';
			echo '<div class="well well-lg container post-detail" id="post-detail-img">';
			echo $post->pdetail;
			echo '</div>';
		} else if($action == 'add') {
			display_mng_header('发布文章');
			display_post_add_form($sid);
		} else if($action == 'update') {
			$catid = $_POST ['catid'];
			$ptitle = $_POST ['ptitle'];
			if(isset($_POST['content1']) && $_POST['content1'] != '') {
				$content = $_POST['content1'];
			} else {
				$content = $_POST['content2'];
			}
			if (!get_magic_quotes_gpc ()) {
				$pdetail = addslashes ( $content );
			} else {
				$pdetail = $content;
			}
			add_post($catid, $ptitle, $pdetail, $sid);
			display_mng_header('发布成功');
			echo '发布成功！';
		}
		break;
	case 'comment' :
		display_mng_header('评论管理');
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
		} else {
			$action = 'show';
		}
		if($action == 'show') {
			if(isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page = 1;
			}
			display_school_comment_list($sid, $page);
		} else if($action == 'delete') {
			$cid = $_GET['cid'];
			del_comment($cid);
			echo '删除成功！';
		}
		break;
	case 'help' :
		display_mng_header('帮助');
		display_help_page();
		break;
	default :
		display_mng_header('错误');
		echo '您输入的参数有误！';
		break;
	}
}

display_mng_footer();
