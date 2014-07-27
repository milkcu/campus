<?php

function display_html_header($sid, $title) {
	// 输出包括页面上方导航栏在内的头部
	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title ?> - 智慧校园</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/custom.css" rel="stylesheet" media="screen">
<link rel="shortcut icon" href="img/favicon.png">
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script src="./js/jquery-migrate-1.2.1.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<?php
	display_navi ($sid);
	echo '<div class="container">';
	if($sid == 0) {
		echo '<div class="container"><img src="./img/head15.jpg" width="100%"></div>';
		?>
<!--jquery右下角pop弹窗start -->
<script type="text/javascript" src="./js/yanue.pop.js"></script>
<script type="text/javascript" >
	  //记得加载jquery
	  //作者：yanue
	  //使用参数：1.标题，2.链接地址，3.内容简介
	  window.onload=function(){
			var pop=new Pop("基于Web Service的网站群系统<br>  -- 校园叮当",
			"./?view=post&pid=1",
			"智慧校园，是一个基于Web Service的网站群系统。可以将高校所有部门和学院的站点放在这一个系统中，便于统一管理，方便用户浏览。如果需要添加站点，只需注册账号即可，不需要额外的软硬件消费。");
		}
</script>
<!--右下角pop弹窗 end-->
		<?php 
	}
	echo '<div class="col-xs-12 col-sm-9">';
}

function display_html_footer() {
	// 输出包括右侧菜单在内的底部
	echo '</div>';
	display_menu ();
	?>
	</div>
	<!-- end div.container -->
	<div id="footer1">
		<div class="container">
			<p class="text-muted credit"></p>
			<p class="text-muted credit">如果您在使用中遇到问题，请联系liuxintong@outlook.com，谢谢！</p>
			<p class="text-muted credit">来自智慧校园团队  <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5785661'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D5785661%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></p>
		</div>
	</div>
<!-- 弹窗内容 begin -->
<div id="pop" style="display:none;">
	<style type="text/css">
	*{margin:0;padding:0;}
	#pop{background:#fff;width:250px;border:1px solid #e0e0e0;font-size:12px;position: fixed;right:10px;bottom:10px;}
	#popHead{line-height:32px;background:#f6f0f3;border-bottom:1px solid #e0e0e0;position:relative;font-size:12px;padding:0 0 0 10px;}
	#popHead h2{font-size:14px;color:#666;line-height:32px;height:32px;}
	#popHead #popClose{position:absolute;right:10px;top:1px;}
	#popHead a#popClose:hover{color:#f00;cursor:pointer;}
	#popContent{padding:5px 10px;}
	#popTitle a{line-height:24px;font-size:14px;font-family:'宋体';font-weight:bold;text-decoration:none;}
	#popIntro{text-indent:24px;line-height:160%;margin:5px 0;color:#666;}
	#popMore{text-align:right;border-top:1px dotted #ccc;line-height:24px;margin:8px 0 0 0;}
	</style>
	<div id="popHead" class="hidden-xs">
	<a id="popClose" title="关闭">关闭</a>
	<span style="font-weight: bold; font-size: 14px;">温馨提示</span>
	</div>
	<div id="popContent" class="hidden-xs">
	<dl>
		<dt id="popTitle"><a href="http://yanue.info/" target="_blank">这里是参数</a></dt>
		<dd id="popIntro">这里是内容简介</dd>
	</dl>
	<p id="popMore"><a href="http://yanue.info/" target="_blank">查看 »</a></p>
	</div>
</div>
<!-- 弹窗内容 end -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- <script src="js/jquery.min.js"></script>  -->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
	<!-- 
	<script type="text/javascript">
		// Window load event used just in case window height is dependant upon images
		$(window).bind("load", function() {
			var footerHeight = 0,
					footerTop = 0,
					$footer = $("#footer");
			positionFooter();
			//定义positionFooter function
			function positionFooter() {
				//取到div#footer高度
				footerHeight = $footer.height();
				//div#footer离屏幕顶部的距离
				footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
				/* DEBUGGING STUFF
					console.log("Document height: ", $(document.body).height());
					console.log("Window height: ", $(window).height());
					console.log("Window scroll: ", $(window).scrollTop());
					console.log("Footer height: ", footerHeight);
					console.log("Footer top: ", footerTop);
					console.log("-----------")
				*/
				//如果页面内容高度小于屏幕高度，div#footer将绝对定位到屏幕底部，否则div#footer保留它的正常静态定位
				if ( ($(document.body).height()+footerHeight) < $(window).height()) {
					$footer.css({
						position: "absolute"
					}).stop().animate({
						top: footerTop
					});
				} else {
					$footer.css({
						position: "static"
					});
				}
			}
			$(window).scroll(positionFooter).resize(positionFooter);
		});
	</script>
	 -->
</body>
</html>
<?php
}

function display_navi($sid) {
	// 输出顶部导航栏
	$s = get_school($sid);
	?>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="./">智慧校园</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
			<?php 
				if($sid == 0) {
					echo '<li><a href="../admin/" target="_blank">系统管理</a></li>';
					echo '<li><a href="./?view=mind">思维导图</a></li>';
					echo '<li><a href="./?view=post&pid=3">架构设计</a></li>';
					echo '<li><a href="./?view=service">服务接口</a></li>';
					echo '<li><a href="./?view=post&pid=2">接口说明</a></li>';
					echo '<li><a href="./?view=post&pid=1">系统介绍</a></li>';  // 院校介绍
				} else {
					echo '<li><a href="./?view=index&sid='.$sid.'">'.$s->sname.'</a></li>';
					$catlist = get_catlist($sid);
					foreach($catlist as $cat) {
						echo '<li><a href="?view=list&catid='.$cat->catid.'">'.$cat->catname.'</a></li>';
					}
					$sop = get_soption($sid);
					echo '<li><a href="./?view=post&pid='.$sop->pid.'">站点介绍</a></li>';
				}
			?>
			</ul>
		</div>
		<!-- /.nav-collapse -->
	</div>
	<!-- /.container -->
</div>
<!-- /.navbar -->
<?php
}

function display_menu() {
	// 输出右侧菜单
	?>
<div class="col-xs-9 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
    <div class="well sidebar-nav">
		<ul class="nav">
			<li>网站群站点列表</li>
			<?php 
				$slist = get_slist();
				foreach($slist as $s) {
					echo '<li><a href="./?view=index&sid='.$s->sid.'">'.$s->sname.'</a></li>';
				}
			?>
			<li><a href="../admin/">站点管理系统</a></li>
		</ul>
	</div>
	<!--/.well -->
</div>
<!--/span-->
<?php
}
