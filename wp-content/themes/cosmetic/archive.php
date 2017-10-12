<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="archive-title">
		<?php
			if( is_tag() ):
				printf(__('Posts tagged: %1$s', 'cosmetic'),single_tag_title('', false));
			elseif( is_category() ):
				printf(__('Post categorized: %1$s', 'cosmetic'), single_cat_title('',false));
			elseif( is_day()):
				printf(__('Daily Archives: %1$s','cosmetic'), get_the_time('l, F j, Y'));
			elseif (is_month()) :
				printf(__('Monthly Archives: %1$s','cosmetic'),get_the_time('F Y'));
			elseif (is_month()) :
				printf(__('Monthly Archives: %1$s','cosmetic'),get_the_time('Y'));
			endif;
		?>
		</div>
		<?php if(is_tag()||is_category()): ?>
			<div class="archive-description">
				<?php echo term_description(); ?>
			</div>
		<?php endif; ?>
		<?php if(have_posts()): while (have_posts()):the_post();  ?>
			<?php get_template_part('content', get_post_format()) ?>

		<?php endwhile ?>
		<?php cosmetic_pagination(); ?>
		<?php else: ?>
			<?php get_template_part('content','none'); ?>
		<?php endif; ?>
		</div>
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>