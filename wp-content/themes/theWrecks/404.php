<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */
get_header(); ?>
<div class="mainContent default four04 lost">
	<div class="container shadow">
		<div class="contentContainer">
		
            <?php the_field('404_content','options'); ?>
            <img src="<?php the_field('404_image','options'); ?>" alt="<?php the_field('404_image_alt_text','options'); ?>" />

		</div>
	</div>
</div>
<?php get_footer(); ?>
