<?php get_header(); ?>
<div class="mainContent default">
	<div class="container">
		<div class="contentContainer shadow">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
