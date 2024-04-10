<?php
/**
 * tfc_stoveshield functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tfc_stoveshield
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tfc_stoveshield_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tfc_stoveshield, use a find and replace
		* to change 'tfc_stoveshield' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'tfc_stoveshield', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'my-primary-menu' => esc_html__( 'Primary', 'tfc_stoveshield' ),
			'extra-menu' => __( 'Secondary Menu' )
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'tfc_stoveshield_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'tfc_stoveshield_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tfc_stoveshield_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tfc_stoveshield' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tfc_stoveshield' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tfc_stoveshield_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tfc_stoveshield_scripts() {
 	wp_enqueue_style( 'style.css', get_stylesheet_uri(), array());
	wp_enqueue_script( 'tfc_stoveshield-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'tfc_stoveshield-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );
	if ( is_page('home') ) {
        wp_enqueue_style( 'home-css', get_stylesheet_directory_uri() . '/assets/css/home.css', array(), microtime() );
    }
	if ( is_page('our-story') ) {
        wp_enqueue_style( 'ourstory-css', get_stylesheet_directory_uri() . '/assets/css/ourstory.css', array(), microtime() );
    }
	if ( is_page('faqs') ) {
        wp_enqueue_style( 'faq-css', get_stylesheet_directory_uri() . '/assets/css/faq.css', array(), microtime() );
    }
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tfc_stoveshield_scripts' );

function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	 register_sidebar( array(
        'name'          => __( 'Top header', 'textdomain' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'header sidebar', 'textdomain' ),
        'id'            => 'header_sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer First ', 'textdomain' ),
        'id'            => 'footer_sidebar_1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s flex_column">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Second', 'textdomain' ),
        'id'            => 'footer_sidebar_2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Third', 'textdomain' ),
        'id'            => 'footer_sidebar_3',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

// Allow SVG uploads
function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

// Allow SVG files to be uploaded to the media library
function allow_svg_upload_mime_type( $data, $file, $filename, $mimes ) {
    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}
add_filter( 'wp_check_filetype_and_ext', 'allow_svg_upload_mime_type', 10, 4 );

// Blog function code
function news_home_post(){
                            $args = array(
                            'post_type'=> 'post',
                            'posts_per_page' => 3
                            );
                            $result = new WP_Query( $args );
                            if ( $result-> have_posts() ) :
                                while ( $result->have_posts() ) : $result->the_post();
                                 $html = '<div class="post_archive_loop flex_column">
                                            <div class="column featured_image"><a href="'.get_the_permalink().'">' .get_the_post_thumbnail(). '</a>
											</div>
                                            <div class="column post_short_meta_desp flex_column">
                                                <h3><a href="'.get_the_permalink().'">' .get_the_title(). '</a></h3>
                                              <div class="post_date">
                                                      <span class="tfc-latest-post-date ">' .get_the_date() . '</span>
                                                  </div>
                                              <div class="tfc-latest-pharagraph">
                                                  <p class="tfc-latest-content">'.wp_trim_words( get_the_content(),25, '.' ).'</p>
                                              </div>
                                              <div class="global_btn">
											  <div class="btn_wrapper">
                                                  <span>Read More<span>
												  <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">	</path></svg>
											   </div>
                                           </div>
									   </div>
                                    </div>';
                                    echo $html;
                                  endwhile;
                                  endif; wp_reset_postdata();
                                    
                          }

// Add brand taxonomy to products
function custom_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Brands', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Brand', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Brands', 'textdomain' ),
        'popular_items'              => __( 'Popular Brands', 'textdomain' ),
        'all_items'                  => __( 'All Brands', 'textdomain' ),
        'edit_item'                  => __( 'Edit Brand', 'textdomain' ),
        'update_item'                => __( 'Update Brand', 'textdomain' ),
        'add_new_item'               => __( 'Add New Brand', 'textdomain' ),
        'new_item_name'              => __( 'New Brand Name', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separate brands with commas', 'textdomain' ),
        'add_or_remove_items'        => __( 'Add or remove brands', 'textdomain' ),
        'choose_from_most_used'      => __( 'Choose from the most used brands', 'textdomain' ),
        'not_found'                  => __( 'No brands found', 'textdomain' ),
        'menu_name'                  => __( 'Brands', 'textdomain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
    );

    register_taxonomy( 'brand', 'product', $args );
}
add_action( 'init', 'custom_taxonomy', 0 );

function product_brand_shortcode() {
    // Assuming you're within the loop for displaying a single product
    global $post;
    $brands = get_the_terms( $post->ID, 'brand' );

    if ( $brands && ! is_wp_error( $brands ) ) {
        $brand_names = array();

        foreach ( $brands as $brand ) {
            $brand_names[] ='<strong>'. $brand->name .'</strong>';
        }

        $brand_list = join( ', ', $brand_names );
        return 'Brand Name: ' . $brand_list;
    }

    return ''; // Return empty string if no brand is found
}
add_shortcode( 'product_brand', 'product_brand_shortcode' );

// Add model number taxonomy to products
function custom_model_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Model Numbers', 'taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Model Number', 'taxonomy singular name', 'textdomain' ),
        'search_items'               => __( 'Search Model Numbers', 'textdomain' ),
        'popular_items'              => __( 'Popular Model Numbers', 'textdomain' ),
        'all_items'                  => __( 'All Model Numbers', 'textdomain' ),
        'edit_item'                  => __( 'Edit Model Number', 'textdomain' ),
        'update_item'                => __( 'Update Model Number', 'textdomain' ),
        'add_new_item'               => __( 'Add New Model Number', 'textdomain' ),
        'new_item_name'              => __( 'New Model Number Name', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separate model numbers with commas', 'textdomain' ),
        'add_or_remove_items'        => __( 'Add or remove model numbers', 'textdomain' ),
        'choose_from_most_used'      => __( 'Choose from the most used model numbers', 'textdomain' ),
        'not_found'                  => __( 'No model numbers found', 'textdomain' ),
        'menu_name'                  => __( 'Model Numbers', 'textdomain' ),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
    );

    register_taxonomy( 'model_number', 'product', $args );
}
add_action( 'init', 'custom_model_taxonomy', 0 );

function product_model_number_shortcode() {
    // Assuming you're within the loop for displaying a single product
    global $post;
    $model_numbers = get_the_terms( $post->ID, 'model_number' );

    if ( $model_numbers && ! is_wp_error( $model_numbers ) ) {
        $model_number_names = array();

        foreach ( $model_numbers as $model_number ) {
            $model_number_names[] = '<strong>' .$model_number->name . '</strong>';
        }

        $model_number_list = join( ', ', $model_number_names );
        return 'Model Number. - ' . $model_number_list;
    }

    return ''; // Return empty string if no model number is found
}
add_shortcode( 'product_model_number', 'product_model_number_shortcode' );

/**
 * WooCommerce Products Shortcode
 */

 add_shortcode( 'tfc_display_woocommerce_products', 'tfc_display_woocommerce_products_shortcode' );

 function tfc_display_woocommerce_products_shortcode($atts) {
     ob_start();
 
     // Check if WooCommerce is active
     if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $atts = shortcode_atts( array(
            'post_type'      => 'product',
            'category'       => '',
            'posts_per_page' => 4,
        ), $atts );

        tfc_display_woocommerce_products( $atts['post_type'], $atts['category'], $atts['posts_per_page'] );

     }
 
     $output = ob_get_clean();
     return $output;
 }
 
 function tfc_display_woocommerce_products($post_type, $category, $posts_per_page) {
     $args = array(
         'post_type'      => $post_type,
         'posts_per_page' => $posts_per_page,
         'orderby'        => 'date',
         'order'          => 'DESC',
     );

     if ( ! empty( $category ) ) {
        $args['product_cat'] = $category;
    }

     $products = new WP_Query( $args );
 
     // Display the products
     if ( $products->have_posts() ) {
         while ( $products->have_posts() ) {
             $products->the_post();
             $product = wc_get_product( get_the_ID() );
             ?>
				 <div class="product_loop product_wrapper flex_column">
                   <div class="column product_meta flex_column">
                    <div class="inner_column brand_name">
						<p class="brand-name" style="color: black;">Brand Name: <strong><?php echo get_the_term_list( get_the_ID(), 'brand', '', ', ', '' ); ?></strong></p>
					   </div>
					   <div class="inner_column model_no">
                  <p class="model-number" style="color: black;">Model Number. - <strong><?php echo get_the_term_list( get_the_ID(), 'model_number', '', ', ', '' ); ?></strong></p>
                </div>
					 </div>
					 <div class="column product_image">
                <a href="<?php echo get_permalink(); ?>"><?php echo woocommerce_get_product_thumbnail(); ?></a>
            </div>
					  <div class="column product_details flex_column">
                <h3 class="tfc-product-title">
                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h3>
				  <span class="price"><?php echo $product->get_price_html(); ?></span>
					 </div>
                 <div class="add-to-cart global_btn">
                     <?php woocommerce_template_loop_add_to_cart(); ?>
                 </div>
             </div>
             <?php
         }
         wp_reset_postdata();
     }
 }

//Add custom product data to cart, cart page, and checkout page
 add_filter( 'woocommerce_get_item_data', 'tfc_add_product_custom_data', 10, 2 );
 function tfc_add_product_custom_data( $item_data, $cart_item ) {
     $product = $cart_item['data'];
 
     $model_number = get_the_term_list( $product->get_id(), 'model_number', '', ', ', '' );
     if ( ! empty( $model_number ) ) {
         $item_data[] = array(
             'key'   => 'Model Number',
             'value' => $model_number,
         );
     }
 
     $brand_name = get_the_term_list( $product->get_id(), 'brand', '', ', ', '' );
     if ( ! empty( $brand_name ) ) {
         $item_data[] = array(
             'key'   => 'Brand Name',
             'value' => $brand_name,
         );
     }
 
     return $item_data;
 }

// Add custom product data to order
 add_action( 'woocommerce_checkout_create_order_line_item', 'tfc_add_order_item_custom_data', 10, 4 );
 function tfc_add_order_item_custom_data( $item, $cart_item_key, $values, $order ) {
     $product = $values['data'];
 
     $model_number = get_the_term_list( $product->get_id(), 'model_number', '', ', ', '' );
     if ( ! empty( $model_number ) ) {
         $item->add_meta_data( 'Model Number', $model_number );
     }
 
     $brand_name = get_the_term_list( $product->get_id(), 'brand_name', '', ', ', '' );
     if ( ! empty( $brand_name ) ) {
         $item->add_meta_data( 'Brand Name', $brand_name );
     }
 }

// Display custom order data on the thank you page
 add_action( 'woocommerce_order_item_meta_end', 'tfc_display_order_item_custom_data', 10, 4 );
 function tfc_display_order_item_custom_data( $item_id, $item, $order, $plain_text = false ) {
     $model_number = $item->get_meta( 'Model Number' );
     $brand_name = $item->get_meta( 'Brand Name' );
 
     if ( ! empty( $model_number ) ) {
         echo '<p>Model Number: ' . $model_number . '</p>';
     }
 
     if ( ! empty( $brand_name ) ) {
         echo '<p>Brand Name: ' . $brand_name . '</p>';
     }
 }


