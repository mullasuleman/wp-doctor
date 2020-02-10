<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Holy_Cupcakes
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="grid-container">
			<div class="grid-x">
				<!-- sidebar box -->
				<div class="large-4 show-for-large sidebar-box">
					<?php
					get_sidebar();
					?>
				</div>


				<?php
				if (have_posts()) :

					if (is_home() && !is_front_page()) :
				?>
						<div class="large-8 medium-12 grid-x blog-posts-box">
							<header class="large-12">
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<!-- blog grid box -->
						<?php
					endif;

					/* Start the Loop */
					while (have_posts()) :
						the_post();
						?>
							<div class="card large-6">
								<img src="assets/img/generic/rectangle-1.jpg">
								<div class="card-section">
									<h3><?php the_title(); ?> </h3>
									<p>
										<?php
										// get_template_part('template-parts/content', get_post_type());
										the_excerpt();
										?>
									</p>
									<a href="<?php get_post_permalink(); ?>">Read More</a>
								</div>
							</div>

					<?php


						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						

					endwhile;

					the_posts_navigation();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
					?>
						</div><!-- cell large-8 -->
			</div><!-- .grid-x -->
		</div><!-- .grid-container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();