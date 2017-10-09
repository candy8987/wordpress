<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
	<div class="entry-thumbnail">
		<?php cosmetic_thumbnail('thumbnail'); ?>
	</div>
	<div class="entry-header">
		<?php cosmetic_entry_header(); ?>
		<?php cosmetic_entry_meta(); ?>
	</div>
	<div class="entry-content">
		<?php cosmetic_entry_content(); ?>
		<?php (is_single() ? cosmetic_entry_tag() :''); ?>
	</div>
</article>