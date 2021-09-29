<?php 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Ajouter bootstrap 
function add_theme_scripts() {
    // wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js');
    // wp_enqueue_script( 'bootstrapjs2', get_template_directory_uri() . 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . 'https://code.jquery.com/jquery-3.5.1.slim.min.js');
    // wp_enqueue_script( 'js', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);
    
    wp_enqueue_style( 'style', get_stylesheet_uri("../public/css/style.css") );
    wp_enqueue_style('bootstrapcss' , 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'); 

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

	// Affichée une fois par date différente
	the_date();

	// Affichée pour chaque article avec le format défini dans WordPress
	the_time( get_option( 'date_format' ) );
	
	// Affichée pour chaque article, avec un format de date et heure personnalisé (ici : 02 Avril 2019 à 17:23)
	the_time( 'j F Y à H:i' );

	// Afficher pour chaque page le Menu
	function wpb_custom_new_menu() {
        register_nav_menus('my-custom-menu',__( 'My Custom Menu' ));
      }
      

	  //ajouter une nouvelle zone de menu à mon thème
		register_nav_menus(array(
            'footer-menu'	=>'pied de page',
            'main' 		=> 'menu principale'
        ));
		
	

		// Afficher la SideBar
		function wpb_widgets_init() {
 
			register_sidebar( array(
				'name' 		=>	__( 'Main Sidebar', 'wpb' ),
				'id' 		=>	             'sidebar-1',
				'description'	=> 	__( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
				'before_widget' => 		'<aside id="%1$s" class="widget %2$s">',
				'after_widget' 	=> 		'</aside>',
				'before_title' 	=> 		'<h3 class="widget-title">',
				'after_title' 	=> 		'</h3>',
			) );
		 
			register_sidebar( array(
				'name'                    =>__( 'Front page sidebar', 'wpb'),
				'id'                      => 'sidebar-2',
				'description'             => __( 'Appears on the static front page template', 'wpb' ),
				'before_widget'           => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'            => '</aside>',
				'before_title'            => '<h3 class="widget-title">',
				'after_title'             => '</h3>',
			) );
			}		 
		add_action( 'widgets_init', 'wpb_widgets_init' );


        function  prefix_modify_nav_menu_args ( $args ) {
            return  array_merge ( $args , array (
                'walker' => new  WP_Bootstrap_Navwalker (),
           ));
       }
       add_filter ( 'wp_nav_menu_args' , 'prefix_modify_nav_menu_args' );

// * Enregistrer le navigateur de navigation personnalisé 

function  register_navwalker () {
	 require_once  get_template_directory (). '/class-wp-bootstrap-navwalker.php' ;
}
add_action ( 'after_setup_theme' , 'register_navwalker' );