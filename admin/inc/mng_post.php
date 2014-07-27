<?php

/**
 * @filename mng_post.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_post_add_form($sid) {
	$catlist = get_catlist($sid);
	if(count($catlist) == 0) {
		echo '请创建栏目后再发布文章！';
	} else {
	?>
<div class="container">
<form method="post" action="./?view=post&action=update" class="form-horizontal" role="form">
	<div class="row form-group col-md-12">
		<div class="col-md-1"><label class="control-label">标题</label></div>
		<div class="col-md-7"><input name="ptitle" type="text" class="form-control" placeholder="请输入题目" required></div>
		<div class="col-md-1"><label class="control-label">类别</label></div>
		<input name="catid" value="<?php 'catid' ?>" class="hidden">
		<div class="col-md-2">
			<select name="catid" class="form-control">
				<?php 
					foreach ($catlist as $cat) {
						echo '<option value="'.$cat->catid.'">'.$cat->catname.'</option>';
					}
				?>
			</select>
		</div>
		<div class="col-md-1"><input type="submit" value="发布" class="btn btn-primary btn-default"></div>
	</div>
	<!-- end div.form-group -->
	<div class="form-group col-md-12">
		<div class="hidden-xs"><textarea name="content1" class="form-control" rows="20"></textarea></div>
		<div class="visible-xs"><textarea name="content2" class="form-control" rows="10"></textarea></div>
	</div>
</form>
</div>
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
<?php
	}
}
