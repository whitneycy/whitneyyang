<?php
/*=========== CHILD THEMES AND LOAD STYLES ============ */
	// Gets child theme styles
  add_action( 'wp_enqueue_scripts', 'edge_enqueue_styles', PHP_INT_MAX );
  function edge_enqueue_styles() {    
    // enqueue parent styles
		wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
    wp_enqueue_style( 'child-style',  get_stylesheet_directory_uri() . '/style.css', array('parent-theme'));	
  }
  add_action( 'wp_enqueue_scripts', 'edge_enqueue_styles' );

/*=============FOOT STUFF==================*/

function child_remove_parent_function() {
    remove_action( 'edge_sitegenerator_footer', 'edge_site_footer' );
}
add_action( 'wp_loaded', 'child_remove_parent_function' );

function edge_child_footer() {
if ( is_active_sidebar( 'edge_footer_options' ) ) :
		dynamic_sidebar( 'edge_footer_options' );
	else:
		echo '<div class="copyright">' .'&copy; ' . date('Y') .' '; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | Powered by WordPress
					</div>
	<?php endif;
}
add_action( 'edge_sitegenerator_footer', 'edge_child_footer');

/*=========== LOAD GOOGLE FONTS ============ */
	// Gets Google Fonts
	function wpb_add_google_fonts() {
		wp_enqueue_style( 'wpb-google-fonts',
		'http://fonts.googleapis.com/css?family=Roboto:300,Playfair+Display', false);
  }
	add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/*=========== JETPACK CONTACT FORM CUSTOMIZATION ============ */
	// Loads JS file to modify Contact Form
  function theme_js() {
    wp_enqueue_script( 'theme_js', get_stylesheet_directory_uri() . '/contactForm.js', array( 'jquery' ), '1.0', true );
  }
  add_action('wp_enqueue_scripts', 'theme_js');

	// Makes sures Jetpack doesn't concatenate all its CSS
  add_filter( 'jetpack_implode_frontend_css', '__return_false' );

	// Removes Jetpack Contact Form CSS
  function remove_jetpack_styles(){
  wp_deregister_style('grunion.css'); // Grunion contact form
  }
  add_action('wp_print_styles', 'remove_jetpack_styles');
?>