<?php 
/**
@ Khai bao hang gia tri
	@ THEME_URL = lay duong dan thu muc theme
	@ CORE = lay duong dan thu muc /core
**/
define ('THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . "/core");

/**
@ Nhung fle /core/init.php
**/
require_once( CORE. "/init.php" );

/**
@ Thiet lap chieu rong noi dung
**/
if(!isset($content_width)){
	$content_width= 620;
}

/**
@ Khai bao chuc nang cua theme
**/
if (!function_exists('cosmetic_theme_setup')){
	function cosmetic_theme_setup(){
		/* Thiet lap textdomain */
		$language_folder = THEME_URL . '/languages'; 
		load_theme_textdomain('cosmetic', $language_folder);
		/* Tu dong them link RSS len <head>*/
		add_theme_support('automatic-feed-links');

		/* Them post thumbnail */
		add_theme_support('post-thumbnails');
		/* Them post Format */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'gallery',
			'quote',
			'link'
			));
		/* Them title-tag */
		add_theme_support('title-tag');
		/* Them custom background */
		$default_background = array('default-color'=>'#e8e8e8');
		add_theme_support('custom-background', $default_background);
		/* Them menu */
		register_nav_menu( 'primary_menu', __('Primary Menu', 'cosmetic') ); 
		/* Tao sidebar*/
		$sidebar = array(
			'name'=> __('Main Sidebar', 'cosmetic'),
			'id'=>'main-sidebar',
			'description'=> __('Default sidebar'),
			'class'=>'main-sidebar', 
			'before_title' =>'<h3 class="widgettitle">',
			'after_title'=> '</h3>'
			);
		register_sidebar( $sidebar ); 
	}
	add_action( 'init', 'cosmetic_theme_setup');
}

/*---------------
TEMPLATE FUNCTIONS */
if(!function_exists('cosmetic_header')){
	function cosmetic_header(){ ?>
		<div class="site-name">
			<?php 
			if(is_home() ){
				printf( '<h1><a href="%1$s" title="%2$s">%3$s</h1>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
				 );
			} else {
				printf( '<p><a href="%1$s" title="%2$s">%3$s</p>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename')
				 );
			}
			?>
			</div>
		<div class="site-discription"><?php bloginfo('description'); ?></div><?php
	}
}

/**
Thiet lap menu
**/
if(!function_exists('cosmetic_menu')){
	function cosmetic_menu($menu){
		$menu = array(
				'theme_location'=> $menu,
				'container' =>'nav',
				'container_class' => $menu
			);
		wp_nav_menu($menu);
	}
}

/**
Ham tao phan trang don gian
**/
if(!function_exists('cosmetic_pagination')){
	function cosmetic_pagination(){
		if( $GLOBALS['wp_query']->max_num_pages<2){
			return '';
		} ?>
		<nav class="pagination" role="navigation">
		<?php if(get_next_post_link()): ?>
			<div class="prev"><?php next_posts_link(__('Older Posts','cosmetic')); ?></div>
		<?php endif; ?>
		<?php if(get_previous_posts_link()): ?>
			<div class="next"><?php previous_posts_link(__('Newest Posts','cosmetic')); ?></div>
		<?php endif; ?>
		</nav>
	<?php }
}

/**
Ham hien thi thumbnail
**/
if(!function_exists('cosmetic_thumbnail')){
	function cosmetic_thumbnail($size){
		if(!is_single()&& has_post_thumbnail() &&!post_password_required()||has_post_format('image')): ?>
		<figure class="post-thumbnail">
			<?php the_post_thumbnail($size); ?>
		</figure>
	<?php endif; ?>
	<?php  
	}
}

/**
cosmetic_entry_header = hien thi tieu de post
**/
if(!function_exists('cosmetic_entry_header')){
	function cosmetic_entry_header(){ ?>
		<?php if( is_single()): ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php else: ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
	<?php  
	}
}

/**
cosmetic_entry_meta = lay du lieu post
**/
if(!function_exists('cosmetic_entry_meta')){
	function cosmetic_entry_meta(){ ?>
		<?php if( !is_page()): ?>
			<div class="entry-meta">
				<?php
					printf(__('<span class="author">Posted by %1$s','cosmetic'),get_the_author());
					printf(__('<span class="date-published">at %1$s','cosmetic'),get_the_date());
					printf(__('<span class="category"> in %1$s','cosmetic'),get_the_category_list(','));
					if( comments_open() ):
						echo '<span class="meta-reply">';
					comments_popup_link(__('leave a comment','cosmetic'),__('One comment','cosmetic'),__('% comment','cosmetic'),
						__('Read all comments','cosmetic'));
						echo '</span>';
					endif; 
				?>
			</div>
		<?php endif; ?>
	<?php  
	}
}

/**
cosmetic_entry_content = bao hien thi noi dung cua post/page
**/
if( !function_exists('cosmetic_entry_content')){
	function cosmetic_entry_content(){
		if(!is_single()){
			the_excerpt();
		}else{
			the_content();
			/* Phan trang trong single */
			$link_pages=array(
				'before'=>__('<p>Page: ','cosmetic'),
				'after'=>'</p>', 
				'nextpagelink'=>__('Next Page','cosmetic'),
				'previouspagelink'=>__('Previous Page','cosmetic')
				);
			wp_link_pages($link_pages);
		}
	}
}

function cosmetic_readmore(){
	return '<a class="read-more" href="'.get_permalink(get_the_ID()).'">'.__('...[Readmore]','cosmetic').'</a>';
}
add_filter('excerpt_more','cosmetic_readmore');

/**
cosmetic_entry_tag = hien thi tag
**/
if( !function_exists('cosmetic_entry_tag')){
	function cosmetic_entry_tag(){
		if(has_tag()):
			echo '<div class="entry-tag">';
			printf(__('Tagged in %1$s','cosmetic'),get_the_tag_list('',','));
			echo '</div>';
		endif;
	}
}