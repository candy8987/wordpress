<?php 
/*
	Template Name: Contact
*/	

get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="contact-info">
			<h4>Dia chi lien he</h4>
			<p>55 57 NVG</p>
			<p>01234564</p>
		</div>
		<div class="contact-form">
			<?php echo do_shortcode('[add_post]'); ?>
		</div>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
