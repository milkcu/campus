<?php

function display_plist($catid, $page) {
	$cat = get_cat($catid);
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading">'.$cat->catname.'</div>';
	echo '<div class="panel-body"><p>';
	echo $cat->catdesc;
	echo '</p>';
	echo '</div>';
	$plist = get_plist('c'.$catid, $page);

	echo '<table class="table table-hover" style="table-layout: fixed;"><thead>';
	echo '<tr><th class="col-md-10">内容</th><th class="col-md-1">时间</th><th class="col-md-1">热度</th></tr>';
	echo '</thead><tbody>';
	if(empty($plist)) {
		echo '<tr><td colspan="3">';
		echo '列表为空';
		echo '</td></tr>';
		echo '</tbody></table>';
		echo '</div>';  //end left col-sm-9
	} else {
		foreach ( $plist as $post_obj ) {
			echo '<tr>';
			echo '<td class="oneline"><b><a href="./?view=post&pid=' . $post_obj->pid . '">' . $post_obj->ptitle . '</a></b>&nbsp;&nbsp;'.$post_obj->pdigest.'</td>';
			//echo '<td><a href="list.php?page=' . $post_obj->uid . '">' . $post_obj->uname . '</td>';
			echo '<td>';
			$t = strtotime($post_obj->pcreated);
			if(time() - $t < 86400) {
				echo date("H:i", $t);
			} else {
				echo date("n月j日", $t);
			}
			echo '</td>';
			echo '<td>' . $post_obj->phit . '</td>';
			//echo '<td><a class="btn btn-warning btn-xs" href="list.php?action=modify&pid='.$post_obj->pid.'">编辑</a></td>';
			//echo '<td><a class="btn btn-danger btn-xs" href="list.php?action=delete&pid='.$post_obj->pid.'">删除</a></td>';
			echo '</tr>';
			echo '<div></div>';
		}
		echo '</tbody></table>';
		echo '<div class="container"><ul class="pagination">';
		echo '<li><a href="./?view=list&catid='.$catid.'&page=1">&laquo;</a></li>';
		$items_per_page = 15;
		$page_num = (get_post_count('c'.$catid) - get_post_count('c'.$catid) % $items_per_page) / $items_per_page + 1;
		for($i = 1; $i <= $page_num; $i++) {
			echo '<li><a href="./?view=list&catid='.$catid.'&page='.$i.'">'.$i.'</a></li>';
		}
		echo '<li><a href="./?view=list&catid='.$catid.'&page='.$page_num.'">&raquo;</a></li>';
		echo '</ul></div><!-- end div.container --></div>';
	}
}

