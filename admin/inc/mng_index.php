<?php

/**
 * @filename mng_index.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_index_shortcut($soption) {
	?>
<div class="row">
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>文章管理</h2>
		<p>在这里，您可以编辑文章、发布文章、查询文章、删除文章，让您在轻松快捷的享受中完成对文章的管理，进入文章管理，让贵站的文章井井有条，字字珠玑。</p>
		<p>
			<a class="btn btn-primary" href="./?view=list">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>评论管理</h2>
		<p>在这里，您可以轻松方便地查看评论者的用户名、联系方式、评论内容、评论时间、并及时回复评论或删除评论，使贵站的评论列表清晰易解，层次鲜明。</p>
		<p>
			<a class="btn btn-primary" href="./?view=comment">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>栏目管理</h2>
		<p>在这里，您可以轻松方便地添加多种多样的栏目，编辑栏目、删除栏目，让您通过管理栏目尽情抒发您的创意，让您的站点更加有血有肉，更加富有生机。</p>
		<p>
			<a class="btn btn-primary" href="./?view=cat">View details &raquo;</a>
		</p>
	</div>
	<!--/span-->
</div>
<!--/row-->
<div class="row">
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>图片管理</h2>
		<p>在这里，您可以根据当下时事热点，随时上传图片更换新闻引导，让您的首页紧紧追随热点事件的步伐，生动的图片让读者用户感受身临其境，眼球随你而动。</p>
		<p>
			<a class="btn btn-primary" href="./?view=slide">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>文字管理</h2>
		<p>在这里，您可以详细的介绍您的特色栏目或随时更新小站热点、最新动态，使您的站点在不断更新中汇集站点的经典特色，让用户领略贵站的精髓所在。</p>
		<p>
			<a class="btn btn-primary" href="./?view=intro">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2>站点介绍</h2>
		<p>在这里，您可以将您站点的布局、设置、创意、特色尽情的展现在用户面前，使用户不但能快速方便地了解、熟悉贵站点，并能更加娴熟地浏览访问贵站。</p>
		<p>
			<a class="btn btn-primary" href="./?view=list&action=modify&pid=<?php echo $soption->pid ?>">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
</div>
<!--/row-->
	<?php 
}

function display_school_state($sid) {
	$sobj = get_school($sid);
	$ssobj = get_soption($sid);
	?>
<div class="alert alert-success container">
	<div class="col-md-9">
		<p>尊敬的管理员用户，您已登录，站点名称为 <strong><?php echo $sobj->sname ?></strong></p>
		<p>站点专属地址为 <strong><a class="alert-link" href="<?php echo $GLOBALS['baseurl'] ?>/web/?view=index&sid=<?php echo $_SESSION['sid'] ?>"><?php echo $GLOBALS['baseurl'] ?>/web/?view=index&sid=<?php echo $_SESSION['sid'] ?></a></strong>
		<p>当前站点系统中共有<a class="alert-link" href="./?view=list"><?php echo $sobj->pcount ?>篇文章</a></p>
		<p>管理员上次登录时间为 <strong><?php echo $sobj->slogged ?></strong></p>
	</div>
	<div class="col-md-3">
		<a class="btn btn-primary pull-right" href="./?view=su">资料修改</a><br><br>
		<a class="btn btn-primary pull-right" href="./?view=post&action=add">发布文章</a><br><br>
		<a class="btn btn-primary pull-right" href="./?view=su&action=process&from=logout">退出管理</a>
	</div>
</div>
	<?php 
}
