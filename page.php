<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'directives/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if( $settings->displaySidebar() ){ // has sidebar ?>
		<?php get_template_part( 'directives/sidebar', 'page' ); ?>
	<?php } ?>
	</div><!-- #content -->

<?php get_footer(); ?>