<?php

/**
 * @filename mng_cat.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_add_cat_form($sid) {
	?>
<div class="well well-lg">
<form action="./?view=cat&action=process&from=add" method="post">
	<div class="row form-group">
		<div class="col-md-2">
			<label class="control-label">栏目名称</label>
		</div>
		<div class="col-md-10">
				<input name="catname" class="form-control">
			</div>
	</div>
	<div class="row form-group">
		<div class="col-md-2">
			<label class="control-label">栏目简介</label>
		</div>
		<div class="col-md-10">
				<textarea name="catdesc" class="form-control"></textarea>
			</div>
	</div>
	<div class="row form-group">
		<div class="col-md-12">
			<input type="submit" class="btn btn-primary pull-right" value="添加栏目"></form>
		</div>
	</div>
</div>
	<?php
}

function display_modify_cat_form($sid) {
	$catlist = get_catlist($sid);
	foreach($catlist as $cat) {
		display_one_cat_form($cat);
	}
}

function display_one_cat_form($cat) {
	?>
<div class="well well-lg">
<form action="./?view=cat&action=process&from=modify" method="post">
	<div class="row form-group">
		<div class="col-md-2">
			<label class="control-label">栏目名称</label>
		</div>
		<div class="col-md-10">
				<input name="catname" value="<?php echo $cat->catname ?>" class="form-control">
			</div>
	</div>
	<div class="row form-group">
		<div class="col-md-2">
			<label class="control-label">栏目简介</label>
		</div>
		<div class="col-md-10">
				<textarea name="catdesc" class="form-control"><?php echo $cat->catdesc ?></textarea>
			</div>
	</div>
	<div class="row form-group">
		<div class="col-md-12">
			<input name="catid" value="<?php echo $cat->catid ?>" class="hidden">
			<input type="submit" class="btn btn-primary pull-right" value="更新栏目"></form>
			<form action="./?view=cat&action=process&from=del" method="post">
				<input name="catid" value="<?php echo $cat->catid ?>" class="hidden">
				<input type="submit" class="btn btn-danger pull-left" value="删除栏目">
			</form>
		</div>
	</div>
</div>
	<?php 
}
