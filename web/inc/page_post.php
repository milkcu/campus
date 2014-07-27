<?php

function display_comment_list($clist) {
	// 输出评论列表
	echo '<div class="my-margin">';
	echo '<table class="table table-striped">';
	echo '<tbody>';
	foreach ( $clist as $c ) {
		echo '<tr><td>';
		echo '<h4>' . $c->uname . '</h4>';
		echo '<p>' . $c->cdetail . '</p>';
		echo '<i>' . $c->ccreated . '</i>';
		echo '</td></tr>';
	}
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
}

function display_comment_form($pid) {
	// 输出评论表单
	?>
<div class="comment-margin">
	<form method="post" action="./?view=process&action=comment" class="control-form">
		<input type="text" name="uname" class="form-control form-group" placeholder="用户名" required>
		<input type="text" name="uemail" class="form-control form-group" placeholder="联系方式" required>
		<textarea name="cdetail" class="form-control form-group" rows="3"  placeholder="评论内容" required></textarea>
		<input type="text" name="pid" class="hidden" value="<?php echo $pid ?>">
		<input type="submit" class="btn btn-default pull-right" value="提交评论">
	</form>
</div>
	<?php
}
