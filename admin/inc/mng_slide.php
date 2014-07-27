<?php

/**
 * @filename mng_slide.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_modify_slide($sid) {
	$sobj = get_soption($sid);
	?>
<div class="container">
<form action="./?view=slide&action=process" method="post">
<div class="col-md-12">
	<div class="row alert alert-warning">
		修改完毕，请点击更新！
		<input type="submit" class="btn btn-primary pull-right" value="更新配置">
	</div>
</div>
<!-- ajax upload head begin -->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script src="kindeditor/kindeditor-min.js"></script>
<script>
	KindEditor.ready(function(K) {
		var uploadbutton = K.uploadbutton({
			button : K('#uploadButton1')[0],
			fieldName : 'imgFile',
			url : 'kindeditor/php/upload_option_json.php?dir=file',
			afterUpload : function(data) {
				if (data.error === 0) {
					var url = K.formatUrl(data.url, 'absolute');
					K('#url1').val(url);
				} else {
					alert(data.message);
				}
			},
			afterError : function(str) {
				alert('自定义错误信息: ' + str);
			}
		});
		uploadbutton.fileBox.change(function(e) {
			uploadbutton.submit();
		});
	});
	KindEditor.ready(function(K) {
		var uploadbutton = K.uploadbutton({
			button : K('#uploadButton2')[0],
			fieldName : 'imgFile',
			url : 'kindeditor/php/upload_option_json.php?dir=file',
			afterUpload : function(data) {
				if (data.error === 0) {
					var url = K.formatUrl(data.url, 'absolute');
					K('#url2').val(url);
				} else {
					alert(data.message);
				}
			},
			afterError : function(str) {
				alert('自定义错误信息: ' + str);
			}
		});
		uploadbutton.fileBox.change(function(e) {
			uploadbutton.submit();
		});
	});
	KindEditor.ready(function(K) {
		var uploadbutton = K.uploadbutton({
			button : K('#uploadButton3')[0],
			fieldName : 'imgFile',
			url : 'kindeditor/php/upload_option_json.php?dir=file',
			afterUpload : function(data) {
				if (data.error === 0) {
					var url = K.formatUrl(data.url, 'absolute');
					K('#url3').val(url);
				} else {
					alert(data.message);
				}
			},
			afterError : function(str) {
				alert('自定义错误信息: ' + str);
			}
		});
		uploadbutton.fileBox.change(function(e) {
			uploadbutton.submit();
		});
	});
</script>
<!-- ajax upload head end -->
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">图片地址</label>
			</div>
			<div class="col-md-8">
				<input id="url1" name="slide1i" value="<?php echo $sobj->slide1i ?>" class="form-control">
			</div>
			<div class="col-md-2">
				<input type="button" id="uploadButton1" value="上传图片" />
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片标题</label>
			</div>
			<div class="col-md-10">
				<input name="slide1h" value="<?php echo $sobj->slide1h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片文字</label>
			</div>
			<div class="col-md-10">
				<textarea name="slide1p" class="form-control"><?php echo $sobj->slide1p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片超链接</label>
			</div>
			<div class="col-md-10">
				<input name="slide1a" value="<?php echo $sobj->slide1a ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">链接文字</label>
			</div>
			<div class="col-md-10">
				<input name="slide1b" value="<?php echo $sobj->slide1b ?>" class="form-control">
			</div>
		</div>
	</div>  <!-- end.div.well -->

	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">图片地址</label>
			</div>
			<div class="col-md-8">
				<input id="url2" name="slide2i" value="<?php echo $sobj->slide2i ?>" class="form-control">
			</div>
			<div class="col-md-2">
				<input type="button" id="uploadButton2" value="上传图片" />
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片标题</label>
			</div>
			<div class="col-md-10">
				<input name="slide2h" value="<?php echo $sobj->slide2h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片文字</label>
			</div>
			<div class="col-md-10">
				<textarea name="slide2p" class="form-control"><?php echo $sobj->slide2p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片超链接</label>
			</div>
			<div class="col-md-10">
				<input name="slide2a" value="<?php echo $sobj->slide2a ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">链接文字</label>
			</div>
			<div class="col-md-10">
				<input name="slide2b" value="<?php echo $sobj->slide2b ?>" class="form-control">
			</div>
		</div>
	</div>  <!-- end.div.well -->
	<div class="well well-lg">
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">图片地址</label>
			</div>
			<div class="col-md-8">
				<input id="url3" name="slide3i" value="<?php echo $sobj->slide3i ?>" class="form-control">
			</div>
			<div class="col-md-2">
				<input type="button" id="uploadButton3" value="上传图片" />
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片标题</label>
			</div>
			<div class="col-md-10">
				<input name="slide3h" value="<?php echo $sobj->slide3h ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片文字</label>
			</div>
			<div class="col-md-10">
				<textarea name="slide3p" class="form-control"><?php echo $sobj->slide3p ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">幻灯片超链接</label>
			</div>
			<div class="col-md-10">
				<input name="slide3a" value="<?php echo $sobj->slide3a ?>" class="form-control">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-2">
				<label class="control-label">链接文字</label>
			</div>
			<div class="col-md-10">
				<input name="slide3b" value="<?php echo $sobj->slide3b ?>" class="form-control">
			</div>
		</div>
	</div>  <!-- end.div.well -->
</form>
</div>
	<?php 
}
