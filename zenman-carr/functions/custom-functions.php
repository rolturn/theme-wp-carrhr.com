<?php
/*
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 *
 * Theme-specific functions and definitions
 *
 * Use this file to set up any theme-specific functions you'd like to use
 * in the current theme.
 */

/*------------------------------------*\
	::Set Page ID to Use
\*------------------------------------*/
// hand-pick post id and use that for hero/content
add_action('wp', 'set_page_id_to_use');
function set_page_id_to_use(){
	if(is_404()){
		$GLOBALS['page_id_to_use'] = 432; // the '404 Page' page
	} elseif(is_archive() || is_home() || is_category() || is_tag()) {
		$GLOBALS['page_id_to_use'] = 18; // the 'Resources' page
	} else {
		$GLOBALS['page_id_to_use'] = get_the_id();
	}
}

/*------------------------------------*\
	::Get YouTube ID
\*------------------------------------*/
function get_youtube_id($html){
	if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $html, $id)) {
		return $id[1];
	} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $html, $id)) {
		return $id[1];
	} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $html, $id)) {
		return $id[1];
	} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $html, $id)) {
		return $id[1];
	} else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $html, $id)) {
		return $id[1];
	} else {
		return '';
	}
}

/*------------------------------------*\
	::Button Shortcode
\*------------------------------------*/
//Usage: [button link='http://example.com' name='My Button' target='New Tab']
function btn_shortcode($attr) {
	extract(shortcode_atts(array(
		'link' => '#',
		'name' => 'Learn More',
		'target' => '',
	), $attr));
	$new_window = $target == '' ? '' : ' target="_blank"';
	return '<a href="'.$link.'" class="button"'.$new_window.' >'. $name .'</a>';
}
add_shortcode('button', 'btn_shortcode');

/*------------------------------------*\
	::Global Options Page
\*------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Global Content',
		'menu_title'    => 'Global Content',
		'menu_slug'     => 'global-content',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}

/*------------------------------------*\
	::Custom Scripts
	version: 1.0.1
	----------------------------------
	Useful for adding 3rd party scripts
	like analytics.

	Usage:
	1.  Add the following code including this
		comment to your functions.php file (or
		custom-functions.php if you are
		using the zemplate theme.)
		A new Custom Scripts menu item
		will appear in the WordPress sidebar
		where you can add your custom scripts.

	2.  Add this to header.php right before
		the closing </head> tag:

		<?php the_field('before_closing_head', 'option'); ?>

	3.  Add this to header.php right after
		the opening <body> tag:

		<?php the_field('after_opening_body', 'option'); ?>


	4.  Add this to footer.php right before
		the closing </body> tag:

		<?php the_field('before_closing_body', 'option'); ?>

	5. For static or old sites that don't have the ACF options,
		page, you will have to add these scripts manually. The
		Google Tag Manger script should always be placed right
		after the opening <body> tag, per Google's suggestions.

\*------------------------------------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Custom Scripts',
		'menu_title'    => 'Custom Scripts',
		'menu_slug'     => 'custom-scripts',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}
if( function_exists('acf_add_local_field_group') ){
acf_add_local_field_group(array (
	'key' => 'group_56eaaf410d8a4',
	'title' => 'Custom Scripts',
	'fields' => array (
		array (
			'key' => 'field_56eaaf69ba041',
			'label' => 'Description',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<span style="color:red">For advanced users only.</span> These fields allow you to add custom code to common spots on your website. If handled improperly, changing these settings could break your site: edit with caution.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array (
			'key' => 'field_56eab060cc22d',
			'label' => 'Before Closing < / head >',
			'name' => 'before_closing_head',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<!-- your code would go here --> </head>',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56eab09ccc22e',
			'label' => 'After Opening < body >',
			'name' => 'after_opening_body',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<body> <!-- your code would go here -->',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_56eab0b6cc22f',
			'label' => 'Before Closing < / body >',
			'name' => 'before_closing_body',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '<!-- your code would go here --> </body>',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'custom-scripts',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
}

/*------------------------------------*\
	::Hide Admin Bar
\*------------------------------------*/
show_admin_bar( false );

/*------------------------------------*\
	::Image sizes
\*------------------------------------*/
if ( function_exists( 'fly_add_image_size' ) ) {
	fly_add_image_size( 'animated-lines', 568, 410, true );
	fly_add_image_size( 'thumb', 80, 80, true );
	fly_add_image_size( 'thumb-large', 160, 160, true );
}




/*------------------------------------*\
	::cURL request for svgs
\*------------------------------------*/
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}



/*------------------------------------*\
	::SVG Upload through Media
\*------------------------------------*/
add_filter('upload_mimes','add_custom_mime_types');
function add_custom_mime_types($mimes){
	return array_merge($mimes,array (
		'svg' => 'image/svg+xml',
		'pdf' => 'application/pdf',
		'doc' => 'application/msword',
		'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	));
}



/*------------------------------------*\
	::Hide Editor
\*------------------------------------*/
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
	remove_post_type_support('page', 'editor');
}


/*------------------------------------*\
	::Convert hexdec color string to rgb(a) string
\*------------------------------------*/

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
		  return $default;

	//Sanitize $color if "#" is provided
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
				$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return $default;
		}

		//Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);

		//Check if opacity is set(rgba or rgb)
		if($opacity){
			if(abs($opacity) > 1)
				$opacity = 1.0;
			$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
		} else {
			$output = 'rgb('.implode(",",$rgb).')';
		}

		//Return rgb(a) color string
		return $output;
}




add_action( 'wp_ajax_nopriv_load-filter2', 'prefix_load_term_posts' );
add_action( 'wp_ajax_load-filter2', 'prefix_load_term_posts' );
function prefix_load_term_posts () {
	$term_id = $_POST[ 'term' ];
	$paged = esc_attr( $_POST['page'] );

	$tax_query = '';

	if ( $term_id != 'view-all' ) {
		$tax_query =  array(
			array(
				'taxonomy' => 'type',
				'field'    => 'id',
				'terms'    => $term_id,
				'operator' => 'IN'
			)
		);
	}

	$postsPerPage = 6;
	$postOffset = $paged * $postsPerPage;

	$args = array (
		'term' => $term_id,
		'posts_per_page' => $postsPerPage,
		'order' => 'ASC',
		'post_type' => 'testimonials',
		'tax_query' => $tax_query,
		'paged' => $paged,
		'offset'  => $postOffset,
	);

	global $post;
	$loop = get_posts( $args );
	// $icon = get_attached_file(593); // quote svg (must be injected rather than loaded for ajax)
	ob_start ();

	foreach( $loop as $post ) : setup_postdata($post);
		$term_list = wp_get_post_terms($post->ID, 'type');

		$term_classes = '';
		foreach($term_list as $term){
			$term_classes .= ' testi-'.$term->slug;
		}

		$after_title = '';
		if ($link = get_field('practice_link')){
			$after_title .= ' <a href="'.$link['url'].'">'.$link['title'].'</a>';
		}
		if (get_field('practice_extra_text')){
			$after_title .= ' '.get_field('practice_extra_text');
		}

		?>
		<div class="testimonials__single ease-me-in <?php if(get_the_post_thumbnail() || get_field('add_testimonial_video')) : ?>has-image<?php endif; ?> <?php echo get_field('text_position');?> <?php echo $term_classes; ?> " id="post-<?php the_ID(); ?>" ><?php echo get_post_meta($post->ID, 'image', $single = true); ?>

			<?php if(get_field('text_position') == 'right') : ?>

				<?php if(get_field('add_testimonial_video')) : ?>
					<?php $video_url = get_youtube_id(get_field('video')); ?>
					<div class="testimonials__image testimonials__video" style="background: url(https://img.youtube.com/vi/<?php echo $video_url ?>/hqdefault.jpg) no-repeat center center; background-size: 110%;">
						<div class="testimonial__image js-scale"></div>
						<div class="orient-play">
							<div class="play-button js-popout-play-button">
								<img class="actual-play-button" src="<?php echo get_template_directory_uri(); ?>/images/play-button-video.png" alt="Play Button">
							</div>

							<div class="js-youtube-popout popout-content">
								<div class="youtube-container">
									<?php echo get_field('video'); ?>
									<div id="close" class="close js-close">X</div>
								</div>
							</div>
						</div>
					</div>
				<?php elseif( has_post_thumbnail() ) : ?>
					<div class="testimonials__image" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center; background-size: cover;"></div>
				<?php endif; ?>

				<div class="testimonials__text">
					<div class="testimonials__text-table">
						<?php the_content(); ?>
						<h4><?php /* include $icon; */ the_title(); ?></h4>
						<?php if ($after_title){echo '<h4>'.$after_title.'</h4>';} ?>
					</div>
				</div>
			<?php elseif(get_field('text_position') == 'left') : ?>
				<div class="testimonials__text">
					<div class="testimonials__text-table">
						<?php the_content(); ?>
						<h4><?php
							/* include $icon; */
							the_title();

							if ($link = get_field('practice_link')){
								echo ' <a href="'.$link['url'].'">'.$link['title'].'</a>';
							}
						?></h4>
					</div>
				</div>

				<?php if(get_field('add_testimonial_video')) : ?>
					<?php $video_url = get_youtube_id(get_field('video')); ?>
					<div class="testimonials__image testimonials__video" style="background: url(https://img.youtube.com/vi/<?php echo $video_url ?>/hqdefault.jpg) no-repeat center center; background-size: 110%;">
						<div class="testimonial__image js-scale"></div>
						<div class="orient-play">
							<div class="play-button js-popout-play-button">
								<img class="actual-play-button" src="<?php echo get_template_directory_uri(); ?>/images/play-button-video.png" alt="Play Button">
							</div>

							<div class="js-youtube-popout popout-content">
								<div class="youtube-container">
									<?php echo get_field('video'); ?>
									<div id="close" class="close js-close">X</div>
								</div>
							</div>
						</div>
					</div>

				<?php elseif( has_post_thumbnail() ) : ?>
					<div class="testimonials__image" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center; background-size: cover;"></div>
				<?php endif; ?>

			<?php endif; ?>

		</div>
	<?php endforeach;?>

	<?php
	wp_reset_postdata();

	$response = ob_get_contents();
	ob_end_flush();
	ob_end_clean();
	echo $response;
	die(1);
}

function twocolumn_content_layout($lr, $lines){
	$content_type = get_sub_field( $lr . '_add_text_image_or_video' );

	$classes = '';
	if ($content_type === 'video') {
		$classes = ' with-'.$lr.'-video';
	}
	if ($content_type === 'image') {
		$classes = ' with-'.$lr.'-image';
	}

	if ($heading = get_sub_field( $lr.'_text_heading' )){
		$classes .= ' two-column-content__with-heading';
	}

	if ($lr === 'left'){
		$wrapper_classes = 'two-column-content__wrapper';
		if ($lines) {
			$wrapper_classes .= ' js-line-animation';
			if ($content_type === 'text' || $content_type === 'slider'){ // go the other way
				$wrapper_classes .= ' two-column-content__wrapper-lines-left';
			} else {
				$wrapper_classes .= ' two-column-content__wrapper-lines-right';
			}
		}
		echo '<div class="'. $wrapper_classes .'">';
	}

	if($lines) {
		echo '<div class="'. $lr .'-column-content '. $lr .'-column-content__with-lines'. $classes .'">';
	} else {
		$bg_img = '';
		if ($background_image = get_sub_field( $lr . '_add_background_image')){
			$bg_img = ' style="background-image: url('. $background_image['url'] .');"';
		}

		echo '<div class="'. $lr .'-column-content js-ease">';
		if($bg_img){
			echo '<div class="'. $lr .'-column-content-bg-img"'.$bg_img.'></div>';
		}
	}

	switch ($content_type) {
		case 'text':
			twocolumn_content_text($lr, $heading);
			break;
		case 'image':
			twocolumn_content_image($lr, $heading);
			break;
		case 'slider':
			twocolumn_content_slider($lr, $heading);
			break;
		case 'video':
			twocolumn_content_video($lr, $heading);
			break;
	}

	echo '</div>'; // $lr-column-content

	if ($lr === 'right'){
		echo '</div>'; // two-column-content__wrapper
	}
}

function twocolumn_content_video($lr, $heading = ''){
	$video_url = get_youtube_id(get_sub_field($lr.'_video'));
	if ($video_url){
		if ($heading){
			echo '<h3>'. $heading .'</h3>';
		}

		echo '<div class="'. $lr .'-column-content__video js-ease">';
			echo '<div class="'. $lr .'-column-content__video-background js-scale" style="background: url(https://img.youtube.com/vi/'. $video_url .'/hqdefault.jpg) no-repeat center center; background-size: cover;"></div>';
			echo '<div class="orient-play">';
				echo '<div class="play-button js-popout-play-button"><img class="actual-play-button" src="'. get_template_directory_uri() .'/images/play-button-video.png" alt="Play Button"></div>';
				echo '<div class="js-youtube-popout popout-content">';
					echo '<div class="youtube-container">';
						echo '<div id="'. uniqid('video-') .'" class="ytvideo fix-embed-container" data-videoid="'. $video_url .'" data-autoplay="false" data-loop="false" data-mute="false"></div>';
						echo '<div id="close" class="close js-close">X</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}

function twocolumn_content_slider($lr, $heading = ''){
	if(have_rows($lr. '_text_slider')){
		if ($heading){
			echo '<h3>'. $heading .'</h3>';
		}
		echo '<div class="'. $lr .'-column-content__text js-ease js-two-col-slider">';
			while(have_rows($lr.'_text_slider')){
				the_row();
				echo '<div class="'. $lr .'-column-content__slide">';
					the_sub_field('slider_text');
				echo '</div>';
			}
		echo '</div>';

		if (get_sub_field( $lr.'_add_a_button' )){
			$link = get_sub_field( $lr.'_button_link' );
			$text = get_sub_field( $lr.'_button_text' );
			echo '<div class="'. $lr .'-column-content__buttons js-ease"><a href="'. $link .'" class="button">'. $text .'</a></div>';
		}
	}
}

function twocolumn_content_image($lr, $heading = ''){
	$image_array = get_sub_field($lr. '_image');
	$img_bg = 'background: url('. $image_array['url'] .') no-repeat center center;';

	$taller = '';
	if (get_sub_field($lr. '_taller_images')){
		$taller = ' two-column-content__taller-image';
	}

	if ($heading){
		echo '<h3>'. $heading .'</h3>';
	}
	echo '<div class="'. $lr .'-column-content__image js-ease'. $taller .'">';
	echo '<div class="'. $lr .'-column-content__image-background js-scale" style="'. $img_bg .' background-size: cover;"></div></div>';
}

function twocolumn_content_text($lr, $heading = ''){
	echo '<div class="'. $lr .'-column-content__text js-ease">';
		if ($heading){
			echo '<h3>'. $heading .'</h3>';
		}

		echo '<div>'. get_sub_field( $lr.'_text' ) .'</div>';

		if (get_sub_field( $lr.'_add_a_button' )){
			$link = get_sub_field( $lr.'_button_link' );
			$text = get_sub_field( $lr.'_button_text' );
			echo '<div class="'. $lr .'-column-content__buttons js-ease"><a href="'. $link .'" class="button">'. $text .'</a></div>';
		}
	echo '</div>';
}
