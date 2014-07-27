<?php

/**
 * @filename mng_list.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_school_post_list($sid, $page) {
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading">'.'文章管理'.'</div>';
	echo '<div class="panel-body"><p>';
	echo '这里包括您的站点发布的所有文章，在这里可以进行修改、删除等操作。';
	echo '<a href="./?view=post&action=add" class="btn btn-primary pull-right">发布文章</a>';
	echo '</p>';
	echo '</div>';
	
	$plist = get_plist('s'.$sid, $page);
	
	echo '<table class="table table-hover" style="table-layout: fixed;"><thead>';
	echo '<tr><th class="col-md-8">内容</th><th class="col-md-1">栏目</th><th class="col-md-1">时间</th><th class="col-md-1">编辑</th><th class="col-md-1">删除</th></tr>';
	echo '</thead><tbody>';
	if(empty($plist)) {
		echo '<tr><td colspan="5">';
		echo '列表为空';
		echo '</td></tr>';
		echo '</tbody></table>';
		echo '</div>';  //end left col-sm-9
	} else {
		foreach ( $plist as $post_obj ) {
				
			echo '<tr>';
			echo '<td class="oneline"><b><a href="../web/?view=post&pid=' . $post_obj->pid . '">' . 
					$post_obj->ptitle . '</a></b>&nbsp;&nbsp;'.$post_obj->pdigest.'</td>';
			//echo '<td><a href="./?view=list&page=' . $post_obj->uid . '">' . $post_obj->uname . '</td>';
			//echo '<td>' . $post_obj->pcreated . '</td>';
			echo '<td class="oneline">' . $post_obj->catname . '</td>';
			echo '<td>';
			$t = strtotime($post_obj->pcreated);
			if(time() - $t < 86400) {
				echo date("H:i", $t);
			} else {
				echo date("n月j日", $t);
			}
			echo '</td>';
			echo '<td><a class="btn btn-warning btn-xs" href="./?view=list&action=modify&pid='.$post_obj->pid.'">编辑</a></td>';
			echo '<td><a class="btn btn-danger btn-xs" href="./?view=list&action=delete&pid='.$post_obj->pid.'">删除</a></td>';
			echo '</tr>';
			echo '<div></div>';
		}
		echo '</tbody></table>';
		echo '<div class="container"><ul class="pagination">';
		echo '<li><a href="./?view=list&sid='.$sid.'&page=1">&laquo;</a></li>';
		$items_per_page = 15;
		$page_num = (get_post_count('s'.$sid) - get_post_count('s'.$sid) % $items_per_page) / $items_per_page + 1;
		for($i = 1; $i <= $page_num; $i++) {
			echo '<li><a href="./?view=list&sid='.$sid.'&page='.$i.'">'.$i.'</a></li>';
		}
		echo '<li><a href="./?view=list&sid='.$sid.'&page='.$page_num.'">&raquo;</a></li>';
		echo '</ul></div><!-- end div.container --></div>';
	}
}

function display_post_modify_form($pid) {
	$post_obj = get_post($pid);
	?>
<!-- kindeditor begin -->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
<script>
	KindEditor.ready(function(K) {
		var editor1 = K.create('textarea[name="content1"]', {
			cssPath : 'kindeditor/plugins/code/prettify.css',
			uploadJson : 'kindeditor/php/upload_json.php',
			fileManagerJson : 'kindeditor/php/file_manager_json.php',
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				K.ctrl(document, 13, function() {
					self.sync();
					K('form[name=example]')[0].submit();
				});
				K.ctrl(self.edit.doc, 13, function() {
					self.sync();
					K('form[name=example]')[0].submit();
				});
			}
		});
		prettyPrint();
	});
</script>
<!-- kindeditor end -->
<div class="container">
<form method="post" action="./?view=list&action=update&pid=<?php echo $post_obj->pid ?>" class="form-horizontal" role="form">
	<div class="row form-group col-md-12">
		<div class="col-md-1"><label class="control-label">标题</label></div>
		<div class="col-md-7"><input name="ptitle" type="text" class="form-control" value="<?php echo $post_obj->ptitle ?>" required></div>
		<div class="col-md-1"><label class="control-label">类别</label></div>
		<div class="col-md-2">
		<?php 
			if($post_obj->catid == 0) {
				echo '<input name="catid" value="'.$post_obj->catid.'" class="hidden">';
				echo '<input name="catname" value="站点介绍" class="form-control" disabled>';
			} else {
				echo '<select name="catid" class="form-control" value="'.$post_obj->catid.'">';
				$catlist = get_catlist($post_obj->sid);
				foreach ($catlist as $cat) {
					echo '<option value="'.$cat->catid.'">'.$cat->catname.'</option>';
				}
				echo '</select>';
			}
		?>
		</div>
		<div class="col-md-1"><input type="submit" value="更新" class="btn btn-primary btn-default"></div>
	</div>
	<!-- end div.form-group -->
	<div class="form-group col-md-12">
		<div class="hidden-xs"><textarea name="content1" class="form-control" rows="21"><?php echo $post_obj->pdetail ?></textarea></div>
		<div class="visible-xs"><textarea name="content2" class="form-control" rows="10"><?php echo $post_obj->pdetail ?></textarea></div>
	</div>
</form>
</div>
	<?php 
}
