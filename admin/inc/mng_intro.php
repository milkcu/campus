<?php

/**
 * @filename mng_intro.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_modify_intro($sid) {
	$sobj = get_soption($sid);
	?>
<div class="container">
<form action="./?view=intro&action=process" method="post">
	<div class="col-md-12">
		<div class="row alert alert-warning">
			修改完毕，请点击更新！
			<input type="submit" class="btn btn-primary pull-right" value="更新配置">
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">标题</label>
			</div>
			<div class="col-md-10">
				<input name="intro1h" value="<?php echo $sobj->intro1h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">摘要</label>
			</div>
			<div class="col-md-10">
				<textarea name="intro1p" class="form-control"><?php echo $sobj->intro1p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">超链接</label>
			</div>
			<div class="col-md-10">
				<input name="intro1a" value="<?php echo $sobj->intro1a ?>" class="form-control">
			</div>
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">标题</label>
			</div>
			<div class="col-md-10">
				<input name="intro2h" value="<?php echo $sobj->intro2h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">摘要</label>
			</div>
			<div class="col-md-10">
				<textarea name="intro2p" class="form-control"><?php echo $sobj->intro2p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">超链接</label>
			</div>
			<div class="col-md-10">
				<input name="intro2a" value="<?php echo $sobj->intro2a ?>" class="form-control">
			</div>
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">标题</label>
			</div>
			<div class="col-md-10">
				<input name="intro3h" value="<?php echo $sobj->intro3h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">摘要</label>
			</div>
			<div class="col-md-10">
				<textarea name="intro3p" class="form-control"><?php echo $sobj->intro3p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">超链接</label>
			</div>
			<div class="col-md-10">
				<input name="intro3a" value="<?php echo $sobj->intro3a ?>" class="form-control">
			</div>
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">标题</label>
			</div>
			<div class="col-md-10">
				<input name="intro4h" value="<?php echo $sobj->intro4h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">摘要</label>
			</div>
			<div class="col-md-10">
				<textarea name="intro4p" class="form-control"><?php echo $sobj->intro4p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">超链接</label>
			</div>
			<div class="col-md-10">
				<input name="intro4a" value="<?php echo $sobj->intro4a ?>" class="form-control">
			</div>
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">标题</label>
			</div>
			<div class="col-md-10">
				<input name="intro5h" value="<?php echo $sobj->intro5h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">摘要</label>
			</div>
			<div class="col-md-10">
				<textarea name="intro5p" class="form-control"><?php echo $sobj->intro5p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">超链接</label>
			</div>
			<div class="col-md-10">
				<input name="intro5a" value="<?php echo $sobj->intro5a ?>" class="form-control">
			</div>
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">标题</label>
			</div>
			<div class="col-md-10">
				<input name="intro6h" value="<?php echo $sobj->intro6h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">摘要</label>
			</div>
			<div class="col-md-10">
				<textarea name="intro6p" class="form-control"><?php echo $sobj->intro6p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">超链接</label>
			</div>
			<div class="col-md-10">
				<input name="intro6a" value="<?php echo $sobj->intro6a ?>" class="form-control">
			</div>
		</div>
	</div>
</form>
</div>
	<?php 
}
