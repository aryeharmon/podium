<?php
/**
* The template for displaying all single posts.
*
* @package podium
*/
use Podium\Config\Settings as settings;

$settings = new settings();

get_header();
?>
<div id="content" class="site-content row">
	<div id="primary" class="content-area small-12 <?php echo $settings->getContentClass('medium-8', 'medium-12'); ?> columns">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) {
				the_post();
				get_template_part( 'directives/content', 'single' );
				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>

				<?php } // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php if( $settings->displaySidebar() ){ // has sidebar ?>
			<?php get_template_part( 'directives/sidebar', 'page' ); ?>
			<?php } ?>
		</div><!-- #content -->
		<?php get_footer(); ?>
