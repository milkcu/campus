<?php

/**
 * @filename mng_su.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_su_register_form() {
	?>
<form class="form-signin form-register" method="post" action="./?view=su&action=process&from=register">
	<h2 class="form-signin-heading">站点注册</h2>
	<input name="sname" type="text" class="form-control" placeholder="站点名称" required autofocus>
	<input name="suser" type="text" class="form-control" placeholder="管理员用户名" required> 
	<input name="spwd" type="password" class="form-control" placeholder="管理员密码" required> 
	<input name="spwd2" type="password" class="form-control" placeholder="密码确认" required> 
	<input name="semail" type="text" class="form-control" placeholder="Email" required>
	<textarea name="sdesc" class="form-control" placeholder="站点描述" required></textarea>
	<label class="checkbox"><input type="checkbox" value="agree" required>同意什么什么</label>
	<button class="btn btn-lg btn-primary btn-block" type="submit">站点注册</button>
</form>
<?php
}

function display_su_login_form() {
	?>
<form class="form-signin" method="post" action="?view=su&action=process&from=login">
	<h2 class="form-signin-heading">管理员登录</h2>
	<input name="suser" type="text" class="form-control" placeholder="管理员用户名"
		autofocus required> <input name="spwd" type="password"
		class="form-control" placeholder="管理员密码" required>
	<button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
	<a href="./?view=su&action=register" class="btn btn-lg btn-primary btn-block">注册</a>
</form>
	<?php 
}

function display_su_modify_form($sid) {
	$sobj = get_school($sid);
	?>
<div class="container">
<form action="./?view=su&action=process&from=modify" method="post">
	<div class="col-md-12">
		<div class="row alert alert-warning">
			修改完毕，请点击更新！
			<input type="submit" class="btn btn-primary pull-right" value="更新配置">
		</div>
	</div>
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">站点名称</label>
			</div>
			<div class="col-md-10">
				<input name="sname" value="<?php echo $sobj->sname ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">站点描述</label>
			</div>
			<div class="col-md-10">
				<textarea name="sdesc" class="form-control"><?php echo $sobj->sdesc ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">管理员用户名</label>
			</div>
			<div class="col-md-10">
				<input name="suser" value="<?php echo $sobj->suser ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">管理员用密码</label>
			</div>
			<div class="col-md-10">
				<input name="spwd" value="<?php echo $sobj->spwd ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">管理员邮箱</label>
			</div>
			<div class="col-md-10">
				<input name="semail" value="<?php echo $sobj->semail ?>" class="form-control">
			</div>
		</div>
	</div>
</form>
</div>
	<?php 
}
