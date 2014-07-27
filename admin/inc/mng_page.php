<?php
/**
 * @filename mng_page.php
 * @date 2014-4-19
 * @version 1.0
 * @author LiuXintong
 * @email liuxintong@outlook.com
 */

function display_mng_header($title) {
	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $title ?> - 管理系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/custom.css" rel="stylesheet" media="screen">
<link rel="shortcut icon" href="img/favicon.png">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<?php
	display_mng_navi ();
	echo '<div class="container">';
}

function display_mng_navi() {
	// 输出顶部导航栏
	?>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".navbar-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../web/" target="_blank">智慧校园</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="./">仪表盘</a></li>
				<li><a href="./?view=list">文章管理</a></li>
				<li><a href="./?view=comment">评论管理</a></li>
				<li><a href="./?view=cat">栏目管理</a></li>
				<li><a href="./?view=slide">图片管理</a></li>
				<li><a href="./?view=intro">文字管理</a></li>
				<?php 
					if(isset($_SESSION['sid'])) {
						$soption = get_soption($_SESSION['sid']);
						echo '<li><a href="./?view=list&action=modify&pid='.$soption->pid.'">站点介绍</a></li>';
					}
				?>
				<li><a href="./?view=help">帮助</a></li>
			</ul>
		</div> <!-- /.nav-collapse -->
	</div> <!-- /.container -->
</div> <!-- /.navbar -->
<?php
}

function display_mng_footer() {
	// 输出包括右侧菜单在内的底部
	?>
	</div> <!-- end div.container -->
	<div id="footer">
		<div class="container">
			<p class="text-muted credit"></p>
			<p class="text-muted credit">如果您在使用中遇到问题，请联系liuxintong@outlook.com，谢谢！</p>
			<p class="text-muted credit">来自智慧校园团队 <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5785661'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D5785661%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></p>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- <script src="js/jquery.min.js"></script>  -->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<!-- 固定页面底部 -->
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
</body>
</html>
<?php
}
