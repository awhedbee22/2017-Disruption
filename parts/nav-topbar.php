<div class="top-bar" id="main-menu">
	<div class="top-bar-left">

		<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
			<ul class="menu">
				<li class='logo'>
			        <a href='<?php echo home_url(); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
						<img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="logo">
					</a>
			    </li>
			</ul>
		<?php else : ?>
			<ul class="menu">
				<li><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
			</ul>
		<?php endif; ?>

	</div>
	<div class="top-bar-right">
		<?php joints_top_nav(); ?>
	</div>
</div>
