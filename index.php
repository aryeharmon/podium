<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package podium
*/
use Podium\Config\Settings as settings;

$settings = new settings();

get_header();
?>
<div id="content" class="site-content row">
	<div id="primary" class="content-area small-12 <?php echo $settings->getContentClass('medium-8', ''); ?> columns">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) { ?>

				<?php /* Start the Loop */ ?>
				<?php
				while ( have_posts() ) {
					 the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'directives/content', get_post_format() );
				} ?>


				<?php
				if ( function_exists( 'emm_paginate' ) ) {
					emm_paginate();
				}
				?>

				<?php } else { ?>

					<?php get_template_part( 'directives/content', 'none' ); ?>

					<?php } ?>

				</main><!-- #main -->
			</div>
			<?php if ( $settings->displaySidebar() ) { // has sidebar ?>
				<?php get_template_part( 'directives/sidebar', 'page' ); ?>
				<?php } ?>
			</div><!-- #content -->

			<?php get_footer(); ?>
