<?php

function display_school_comment_list($sid, $page) {
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading">'.'评论管理'.'</div>';
	echo '<div class="panel-body"><p>';
	echo '这里包括您的站点发布的文章的所有评论，在这里可以进行删除等操作。';
	//echo '<a href="./?view=post&action=add" class="btn btn-primary pull-right">发布文章</a>';
	echo '</p>';
	echo '</div>';

	$clist = get_clist('s'.$sid, $page);

	echo '<table class="table table-hover" style="table-layout: fixed;"><thead>';
	echo '<tr><th class="col-md-2">文章</th><th class="col-md-4">评论内容</th><th class="col-md-2">用户名</th><th class="col-md-2">联系方式</th><th class="col-md-1">时间</th><th class="col-md-1">删除</th></tr>';
	echo '</thead><tbody>';
	if(empty($clist)) {
		echo '<tr><td colspan="6">';
		echo '列表为空';
		echo '</td></tr>';
		echo '</tbody></table>';
		echo '</div>';  //end left col-sm-9
	} else {
		foreach ( $clist as $c ) {
			echo '<tr>';
			echo '<td class="oneline"><a href="../web/?view=post&pid=' . $c->pid . '">' . $c->ptitle . '</a></td>';
			echo '<td class="oneline">' . $c->cdetail . '</td>';
			echo '<td class="oneline">' . $c->uname . '</td>';
			echo '<td class="oneline">' . $c->uemail . '</td>';
			echo '<td>';
			$t = strtotime($c->ccreated);
			if(time() - $t < 86400) {
				echo date("H:i", $t);
			} else {
				echo date("n月j日", $t);
			}
			echo '</td>';
			echo '<td><a class="btn btn-danger btn-xs" href="./?view=comment&action=delete&cid='.$c->cid.'">删除</a></td>';
			echo '</tr>';
			echo '<div></div>';
		}
		echo '</tbody></table>';
		echo '<div class="container"><ul class="pagination">';
		echo '<li><a href="./?view=comment&page=1">&laquo;</a></li>';
		$items_per_page = 15;
		$page_num = (get_comment_count('s'.$sid) - get_comment_count('s'.$sid) % $items_per_page) / $items_per_page + 1;
		for($i = 1; $i <= $page_num; $i++) {
			echo '<li><a href="./?view=comment&page='.$i.'">'.$i.'</a></li>';
		}
		echo '<li><a href="./?view=comment&page='.$page_num.'">&raquo;</a></li>';
		echo '</ul></div><!-- end div.container --></div>';
	}
}
