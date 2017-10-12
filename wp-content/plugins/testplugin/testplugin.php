<?php
/*
Plugin Name: Test Plugin
Plugin URI: https://hocwp.net
Description: Test Plugin là một trong những plugin dành cho WordPress .
Author: admin
Version: 1.0
Author URI: http://sauhi.com
*/
?>
<?php 

//Khởi tạo function lay du lieu tu website ngan hang
function lay_ty_gia() {
	$data = simplexml_load_file('https://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx');
    return $data;
}

//Khoi tao function them mot post
function create_add_post_shortcode(){
	if( isset( $_POST["submit"] ) ) {
		$my_post = array(
		  'post_title'    => $_POST["post-title"],
		  'post_content'  => $_POST["post-content"],
		  'post_status'   => ($_POST["post-status"]==true)?'publish':'draft'
		);
		wp_insert_post($my_post);
		echo "<script type='text/javascript'>alert('Insert success');</script>";
	}
	?>
	<fieldset style="width: 300px; margin: 0 auto; padding: 20px;">
		<legend>Insert a post</legend>
		<form method="post">
			<div style="margin-bottom: 10px;"><input type="text" name="post-title" placeholder="Nhap tieu de" style="width: 300px;" id="post-title"/></div>
			<div style="margin-bottom: 10px;"><textarea name="post-content" style="width: 300px; height: 50px;" placeholder="Nhap noi dung" id="post-content">
			</textarea></div>
			<div style="margin-bottom: 10px;"><input type="checkbox" id="chk-status" name="post-status" checked="checked" /><label for="chk-status">Publish</label></div>
			<div style="text-align: center;"><input type="submit" name="submit" value="Submit" /></div>		
		</form>
	</fieldset>
	<?php
}

function create_list_shortcode() {
	create_add_post_shortcode();
	global $post;
	$myposts = get_posts( ['numberposts'=>4]);
	?>
	<div id="some-post">
		<?php
		foreach( $myposts as $post ) : setup_postdata($post); ?>
			<fieldset id="post<?php the_ID(); ?>" style="width: 45%; box-sizing: border-box; float: left; margin: 10px; position: relative; height: 150px; ">
				<legend><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></legend>
				<button class="deletebutton" data-id="<?php the_ID(); ?>" style="position:absolute; right: -10px; top :-10px; width:30px; height:30px;border-radius: 50%; background: #F00; color: #FFF; line-height: 30px; text-align: center;">X</button>
				<button class="editbutton" data-edit="<?php the_ID(); ?>" style="position:absolute; right: -40px; top :-10px; width:30px; height:30px;border-radius: 50%; background: #F00; color: green; line-height: 30px; text-align: center;">X</button>
				<p>Posted By <?php the_author(); ?></p>
				<p><?php the_content(); ?></p>
			</fieldset>
		<?php endforeach;
		wp_reset_postdata();
		?>
	</div>
	<?php 
	wp_enqueue_script('tenadd');
	wp_localize_script('tenadd','ajaxurl',array('thang'=>admin_url('admin-ajax.php')));
}

function regjs(){
	wp_register_script('tenadd',plugins_url('/js/testplugin.js',__FILE__),array('jquery'));
}

add_action('wp_enqueue_scripts','regjs');
add_action('wp_ajax_delete_post', 'delete_post');
add_action('wp_ajax_nopriv_delete_post','delete_post');

function delete_post() {
   	$post_id = $_POST['postid'];
	wp_delete_post( $post_id ,true);
}

//Tạo shortcode tên là [test_shortcode] và sẽ thực thi code từ function create_shortcode
add_shortcode( 'add_post', 'create_add_post_shortcode' );
?>
