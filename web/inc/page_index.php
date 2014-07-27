<?php 

function display_all_plist($page) {
	echo '<div class="panel panel-default">';
	echo '<div class="panel-heading">'.'智慧校园'.'</div>';
	echo '<div class="panel-body"><p>';
	echo '纵情文章海，知晓身边事，所有文章为您呈现。';
	echo '</p>';
	echo '<p>推荐下载安卓客户端：<a href="../app/campus.apk">'.$GLOBALS['baseurl'].'/app/campus.apk'.'</a></p>';
	echo '</div>';  // end of panel-body
	$plist = get_plist('a', $page);
	// 小屏幕隐藏 begain
	echo '<table class="table table-hover" style="table-layout: fixed;">';
	echo '<thead><tr><th class="col-md-9">内容</th><th class="col-md-2">发布者</th>
			<th class="col-md-1">时间</th></tr></thead>';
	echo '<tbody>';
	if(empty($plist)) {
		echo '<tr><td colspan="3">';
		echo '列表为空';
		echo '</td></tr>';
		echo '</tbody></table>';
	} else {
		foreach ( $plist as $post_obj ) {
			echo '<tr>';
			echo '<td class="oneline"><b><a href="./?view=post&pid=' . $post_obj->pid . '">' . $post_obj->ptitle . '</a></b>&nbsp;&nbsp;'.$post_obj->pdigest.'</td>';
			echo '<td class="oneline"><a href="./?view=index&sid=' . $post_obj->sid . '">' . $post_obj->sname . '</td>';
			echo '<td>';
			$t = strtotime($post_obj->pcreated);
			if(time() - $t < 86400) {
				echo date("H:i", $t);
			} else {
				echo date("n月j日", $t);
			}
			echo '</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
		echo '<div class="container hidden-xs"><ul class="pagination">';
		echo '<li><a href="./?view=index&page=1">&laquo;</a></li>';
		$items_per_page = 15;
		$page_num = (get_post_count('a') - get_post_count('a') % $items_per_page) / $items_per_page + 1;
		for($i = 1; $i <= $page_num; $i++) {
			echo '<li><a href="./?view=index&page='.$i.'">'.$i.'</a></li>';
		}
		echo '<li><a href="./?view=index&page='.$page_num.'">&raquo;</a></li>';
		echo '</ul></div><!-- end div.container -->';
	}
	// 小屏幕隐藏 end
	echo '</div>';  // end of pannel
}

function display_carousel($sid) {
	$sobj = get_soption($sid);
	?>
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item active">
			<img src="<?php echo $sobj->slide1i ?>"
				alt="First slide">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo $sobj->slide1h ?></h1>
					<p><?php echo $sobj->slide1p ?></p>
					<p>
						<a class="btn btn-large btn-primary" href="<?php echo $sobj->slide1a ?>"><?php echo $sobj->slide1b ?></a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="<?php echo $sobj->slide2i ?>"
				alt="Second slide">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo $sobj->slide2h ?></h1>
					<p><?php echo $sobj->slide2p ?></p>
					<p>
						<a class="btn btn-large btn-primary" href="<?php echo $sobj->slide2a ?>"><?php echo $sobj->slide2b ?></a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img src="<?php echo $sobj->slide3i ?>"
				alt="Third slide">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo $sobj->slide3h ?></h1>
					<p><?php echo $sobj->slide3p ?></p>
					<p>
						<a class="btn btn-large btn-primary" href="<?php echo $sobj->slide3a ?>"><?php echo $sobj->slide3b ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
		class="glyphicon glyphicon-chevron-left"></span></a> <a
		class="right carousel-control" href="#myCarousel" data-slide="next"><span
		class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- /.carousel -->

<?php  

}

function display_simple_introduction($sid) {
	$sobj = get_soption($sid);
	?>
<div class="row intro">
	<div class="col-6 col-sm-6 col-lg-4">
		<h2><?php echo $sobj->intro1h ?></h2>
		<p><?php echo $sobj->intro1p ?></p>
		<p>
			<a class="btn btn-primary" href="<?php echo $sobj->intro1a ?>">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2><?php echo $sobj->intro2h ?></h2>
		<p><?php echo $sobj->intro2p ?></p>
		<p>
			<a class="btn btn-primary" href="<?php echo $sobj->intro2a ?>">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2><?php echo $sobj->intro3h ?></h2>
		<p><?php echo $sobj->intro3p ?></p>
		<p>
			<a class="btn btn-primary" href="<?php echo $sobj->intro3a ?>">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
</div>
<!--/row-->
<div class="row intro">
	<div class="col-6 col-sm-6 col-lg-4">
		<h2><?php echo $sobj->intro4h ?></h2>
		<p><?php echo $sobj->intro4p ?></p>
		<p>
			<a class="btn btn-primary" href="<?php echo $sobj->intro4a ?>">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2><?php echo $sobj->intro5h ?></h2>
		<p><?php echo $sobj->intro5p ?></p>
		<p>
			<a class="btn btn-primary" href="<?php echo $sobj->intro5a ?>">View details
				&raquo;</a>
		</p>
	</div>
	<!--/span-->
	<div class="col-6 col-sm-6 col-lg-4">
		<h2><?php echo $sobj->intro6h ?></h2>
		<p><?php echo $sobj->intro6p ?></p>
		<p>
			<a class="btn btn-primary" href="<?php echo $sobj->intro6a ?>">View details &raquo;</a>
		</p>
	</div>
	<!--/span-->
</div>
<!--/row-->

<?php 

}
