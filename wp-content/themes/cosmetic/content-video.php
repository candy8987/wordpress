<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
	<div class="entry-header">
		<?php cosmetic_entry_header(); ?>
		<?php cosmetic_entry_meta(); ?>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php (is_single() ? cosmetic_entry_tag() :''); ?>
	</div>
</article>