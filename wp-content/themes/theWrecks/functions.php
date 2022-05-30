<?php
/******************
ENQUEUE STYLES AND SCRIPTS
******************/
function my_assets() {
	wp_enqueue_style( 'FontAwesome', get_template_directory_uri().'/css/font-awesome.min.css','',null,true);
	wp_enqueue_style( 'Typefaces', get_template_directory_uri().'/css/fonts/typefaces.css');
	wp_enqueue_style( 'sass', get_template_directory_uri().'/sass/style.php/style.scss');
	// wp_enqueue_style( 'sass', get_template_directory_uri().'/sass/stylesheets/scss_cache/388cc9f7a588af7f4a07cfb245ccb3f5.css');
	// wp_enqueue_style( 'sass-imports', get_template_directory_uri().'/sass/stylesheets/scss_cache/388cc9f7a588af7f4a07cfb245ccb3f5.css.imports');

	wp_enqueue_script('jquerylib', get_template_directory_uri().'/js/jquery-2.1.3.min.js','',null,false);
	wp_enqueue_script('easing', get_template_directory_uri().'/js/jquery.easing.1.3.js',array('jquerylib'),null,true);
	wp_enqueue_script('GSAP', get_template_directory_uri().'/js/jquery.gsap.min.js',array('jquerylib'),null,true);
	wp_enqueue_script('GSAP-tweenLite', get_template_directory_uri().'/js/TweenLite.min.js',array('jquerylib', 'GSAP'),null,true);
	wp_enqueue_script('GSAP-css', get_template_directory_uri().'/js/CSSPlugin.min.js',array('jquerylib', 'GSAP'),null,true);
	wp_enqueue_script('GSAP-text', get_template_directory_uri().'/js/TextPlugin.min.js',array('jquerylib', 'GSAP'),null,true);
	wp_enqueue_script('midnightJS', get_template_directory_uri().'/js/midnight.jquery.min.js',array('jquerylib'),null,true);
	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js',array('jquerylib', 'GSAP'),null,true);
}
add_action( 'wp_enqueue_scripts', 'my_assets' );

/******************
REGISTER MENUS
******************/
function register_my_menus() {
  register_nav_menus(
    array(
      	'header-menu' => __( 'Header Menu' ),
		'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

/******************
UPDATE TITLE FOR HOMEPAGE
******************/
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
	return __( 'The Wrecks', 'theme_domain' );
  }
  return $title;
}

/******************
ADD OPTIONS PAGE FOR ACF
******************/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}


/******************
ADD CUSTOM TAXONOMY
******************/
// function create_retailer_tax() {
// 	// create a new taxonomy
// 	register_taxonomy(
// 		'retailer-products',
// 		'post',
// 		array(
// 			'label' => __( 'Retailer Products' ),
// 			'rewrite' => array( 'slug' => 'retailer-products' )
// 		)
// 	);
// }
// add_action( 'init', 'create_retailer_tax' );

/******************
ACF DISPLAY NEWS ARTICLE EXCERPT
******************/
function custom_field_excerpt($title) {
	global $post;
	$text = get_field($title);
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>&gt;', $text);
		$excerpt_length = 45; // 50 words
		$excerpt_link = '<?php the_permalink() ?>';
		// $excerpt_more = apply_filters('excerpt_more', '...' . ' ' . '<a href="">Read more ></a>');
		$excerpt_more = '...';
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}



/******************
ACF DISPLAY FEATURED PROJECT EXCERPT
******************/
function custom_field_excerpt_project($title) {
	global $post;
	$text = get_field($title);
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>&gt;', $text);
		$excerpt_length = 80; // 50 words		
		// $excerpt_more = apply_filters('excerpt_more', '...' . ' ' . '<a href="">Read more ></a>');
		$excerpt_more = '...';
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}



/******************
GET THE SLUG OF A POST
******************/
function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}


/******************
STRING TO SLUG
******************/
function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}



?>
