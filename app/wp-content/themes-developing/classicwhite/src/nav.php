<?php
/**
 * Print menu
 */
$locations = get_nav_menu_locations();
$theMenu = isset($locations['menu-primary']) ? wp_get_nav_menu_items($locations['menu-primary']) : false;
$theMenuSlice = false;
$limitMenu = 4;
$currentPostId = false;

if ($theMenu !== false) {
	$currentMenuSelected = current(wp_filter_object_list($theMenu, array('object_id' => get_queried_object_id())));
	$currentPostId = isset($currentMenuSelected->ID) ? $currentMenuSelected->ID : false;
	$theMenuSlice = array_slice($theMenu, 0, $limitMenu);
}

function cw_menuIsActive($postObject, $postID){
	$rs = '';
	if ($postObject->ID === $postID) {
		$rs = 'active';
	}

	return $rs;
}
?>
<header>
	<div class="nav-top my-2">
		<div class="container">
			<nav class="nav-top__social hidden-sm-down">
				<ul>
					<li>
						<a href="#">
							<i class="icon-facebook is-md"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-youtube is-md"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-instagram is-md"></i>
						</a>
					</li>
				</ul>
			</nav>

			<div>
				<div class="d-flex_ d-sm-flex justify-content-between align-items-center no-gutters">
					<div class="col-md-5 col-xs-12">
						<?php if (is_array($theMenuSlice) && count($theMenuSlice) > 0) : ?>
							<?php $partMenu = array_slice($theMenuSlice, 0, $limitMenu/2); ?>
								<nav class="nav-menu">
									<ul class="navbar-nav w-100 d-flex justify-content-center flex-row">
										<?php foreach($partMenu as $theKey => $thePost) : ?>
											<?php $target_type = !empty($thePost->target) ? $thePost->target : '_self'; ?>
											<li class="nav-item <?php echo cw_menuIsActive($thePost, $currentPostId); ?>">
												<a target="<?php echo $target_type; ?>" href="<?php echo $thePost->url ;?>"><?php echo $thePost->title ;?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</nav>
						<?php endif; ?>
					</div>
					<div class="col-md-2 d-none d-sm-block">
						<a href="#">
							<img class="w-100" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png' ?>" alt=""/>
						</a>
					</div>
					<div class="col-md-5 col-xs-12">
						<?php if (is_array($theMenuSlice) && count($theMenuSlice) > 0) : ?>
							<?php $partMenu = array_slice($theMenuSlice, ($limitMenu/2), ($limitMenu/2)+($limitMenu/2)); ?>
								<nav class="nav-menu">
									<ul class="navbar-nav w-100 d-flex justify-content-center flex-row">
										<?php foreach($partMenu as $theKey => $thePost) : ?>
											<?php $target_type = !empty($thePost->target) ? $thePost->target : '_self'; ?>
											<li class="nav-item <?php echo cw_menuIsActive($thePost, $currentPostId); ?>">
												<a target="<?php echo $target_type; ?>" href="<?php echo $thePost->url ;?>"><?php echo $thePost->title ;?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</nav>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
