<?php

/**
 * tfc_stoveshield functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tfc_stoveshield
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tfc_stoveshield_setup()
{
    /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tfc_stoveshield, use a find and replace
		* to change 'tfc_stoveshield' to the name of your theme in all the template files.
		*/
    load_theme_textdomain('tfc_stoveshield', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    // register_nav_menus(
    //     array(
    //         'my-primary-menu' => esc_html__('Primary', 'tfc_stoveshield'),
    //         'extra-menu' => __('Secondary Menu')
    //     )
    // );

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
    add_theme_support('customize-selective-refresh-widgets');

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


    /**
     * Add Support for woocommerce
     */
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'tfc_stoveshield_setup');


/**
 * Enqueue Scripts and styles
 * @link https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function  tfc_stoveshield_scripts()
{
    wp_enqueue_style('style.css', get_stylesheet_uri(), array());
    wp_enqueue_script('global-js', get_stylesheet_directory_uri() . '/assets/js/global.js', ['jquery'], '1.0', true);

    // Home Page Css
    if (is_page('home')) {
        wp_enqueue_style('home-css', get_stylesheet_directory_uri() . '/assets/css/index.css', array(), microtime());
    }

    // FAQ Page Css
    if (is_page('faq')) {
        wp_enqueue_style('faq-css', get_stylesheet_directory_uri() . '/assets/css/faq.css', array(), microtime());
    }

    // Contact Page Css
    if (is_page('contact-us')) {
        wp_enqueue_style('contact-css', get_stylesheet_directory_uri() . '/assets/css/contact.css', array(), microtime());
    }

    // Our Story Page Css
    if (is_page('our-story')) {
        wp_enqueue_style('ourstory-css', get_stylesheet_directory_uri() . '/assets/css/ourstory.css', array(), microtime());
    }

    //Enequeue Login Page || Register Page 
    if (is_page('login')) {
        wp_enqueue_style('login-css', get_stylesheet_directory_uri() . '/assets/css/login.css');
    }

    //Enequeue Register Page Css
    if (is_page('register')) {
        wp_enqueue_style('register-css', get_stylesheet_directory_uri() . '/assets/css/register.css');
    }

    // Enequeue WC Single Product Page Css
    global $product;
    if (is_product()) {
        wp_enqueue_style('single_product-css', get_stylesheet_directory_uri() . '/assets/css/single_product.css');
    }
}
add_action('wp_enqueue_scripts', 'tfc_stoveshield_scripts');

if (is_page('product')) {
}


/** Allow SVG uploads */
function allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

/**  Allow SVG files to be uploaded to the media library */
function allow_svg_upload_mime_type($data, $file, $filename, $mimes)
{
    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}
add_filter('wp_check_filetype_and_ext', 'allow_svg_upload_mime_type', 10, 4);


/** This theme uses wp_nav_menu() in one location. */
register_nav_menus(
    array(
        'menu-1' => esc_html__('Primary', 'tfc_stoveshield'),
        'menu-2' => esc_html__('Secondary', 'tfc_stoveshield'),
    )
);


/**
 * Add Custom Sidebars
 */
function tfc_stoveshield_widgetss_init()
{
    register_sidebar(array(
        'name'          => __('Footer First ', 'textdomain'),
        'id'            => 'footer_sidebar_1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s flex_column">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Second', 'textdomain'),
        'id'            => 'footer_sidebar_2',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget flex_column %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Header Sidebar ', 'textdomain'),
        'id'            => 'header_sidebar_1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s flex_column">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'tfc_stoveshield_widgetss_init');


/**
 * Custom shortcode function to retrieve blog posts
 *
 * @param array $atts Shortcode.
 */
function tfc_blog_posts_function($atts)
{

    $atts = shortcode_atts(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'categories' => '',
        'order' => 'DESC',
        'orderby' => 'date',
    ), $atts);


    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['posts_per_page'],
        'order' => $atts['order'],
        'orderby' => $atts['orderby'],
    );


    // add the category filter if provided
    if (!empty($atts['categories'])) {
        $category_ids = array_map('trim', explode(',', $atts['categories']));
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $category_ids,
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $output = '<div class="column flex_row">';

        while ($query->have_posts()) {
            $query->the_post();

            $output .= '<div class="post_archive_loop flex_column">';
            $output .= '<div class="column featured_image">
                        <a href="' . get_permalink() . '"><img src="' . get_the_post_thumbnail_url() . '" alt=""></a>
                        </div>';
            $output .= '<div class="column post_short_meta_desp flex_column">';
            $output .= '<h3> ' . get_the_title() . ' </h3>';
            $output .= '<div class="post_date">';
            $output .= '<img src=" ' . get_site_url() . '/wp-content/uploads/2024/04/calendar-alt.svg" alt="calendar-alt" style="max-width: fit-content; width:25; height:25;"/>';
            $output .= '<span>' . get_the_date() . '</span>';

            $output .= '</div>';
            $output .= '<p>' . get_the_excerpt() . '</p>';
            $output .= '<a class="global_btn" href="' . get_the_permalink() . '">';
            $output .= '<div class="btn_wrapper">';
            $output .= '<span>Read More</span>';
            $output .= '<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>';
            $output .= '</div></a></div></div>';
        }

        $output .= '</div>';

        wp_reset_postdata();

        return $output;
    } else {
        return 'No posts found';
    }
}

add_shortcode('tfc_blog_posts', 'tfc_blog_posts_function');


/**
 * WooCommerce Products Shortcode
 */
add_shortcode('tfc_display_woocommerce_products', 'tfc_display_woocommerce_products_shortcode');

function tfc_display_woocommerce_products_shortcode($atts)
{
    ob_start();

    // Check if WooCommerce is active
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        $atts = shortcode_atts(array(
            'post_type'      => 'product',
            'category'       => '',
            'posts_per_page' => 4,
        ), $atts);

        tfc_display_woocommerce_products($atts['post_type'], $atts['category'], $atts['posts_per_page']);
    }

    $output = ob_get_clean();
    return $output;
}
function tfc_display_woocommerce_products($post_type, $category, $posts_per_page)
{
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if (!empty($category)) {
        $args['product_cat'] = $category;
    }

    $products = new WP_Query($args);

    // Display the products
    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();
            $product = wc_get_product(get_the_ID());
?>
            <div class="product_loop product_wrapper flex_column">
                <div class="column product_meta flex_column">
                    <div class="inner_column brand_name global_product_meta_card">
                        <span>Brand Name</span>
                        <strong>GE</strong>
                    </div>
                    <div class="inner_column model_no global_product_meta_card">
                        <span>Model Number. -</span>
                        <strong>PGP943SET5SS</strong></p>
                    </div>
                </div>
                <div class="column product_image">
                    <a href="<?php echo get_permalink(); ?>">
                        <?php echo woocommerce_get_product_thumbnail(); ?>
                    </a>
                </div>
                <div class="column product_details flex_column">
                    <h3 class="tfc-product-title">
                        <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </h3>
                    <span class="price"><?php echo $product->get_price_html(); ?></span>
                </div>
                <div class="add_to_cart global_btn">
                    <?php woocommerce_template_loop_add_to_cart(); ?>
                    <img src="<?php echo site_url() . '/wp-content/uploads/2024/04/cart-shopping.svg' ?>" alt="cart-shopping" style="height:24px; width:24px;">
                </div>
            </div>
    <?php
        }
        wp_reset_postdata();
    }
}


/**
 *  Create Function For Get Image File Name
 */
function tfc_getimage_filename($file_url)
{
    if ($file_url) :
        $filename = pathinfo(basename($file_url), PATHINFO_FILENAME);
        return $filename;
    else :
        return 'image';
    endif;
}


/** 
 * Register custom shortcode for displaying registration form
 */
function tfc_stoveshield_registration_form_shortcode()
{
    if (is_user_logged_in()) {
        return '<p>You are already registered</p>
        <p>Go to <a href="' . esc_html(get_page_link(get_page_by_path('my-account'))) . '">My Account Page </p>';
    }
    ob_start();
    do_action('woocommerce_before_customer_login_form'); ?>

    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

        <?php do_action('woocommerce_register_form_start'); ?>

        <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (isset($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /> <!-- WPCS: XSS ok. -->
            </p>

        <?php endif; ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (isset($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /> <!-- WPCS: XSS ok. -->
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
        </p>

        <?php do_action('woocommerce_register_form'); ?>

        <p class="woocommerce-FormRow form-row">
            <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
            <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Sign Up', 'woocommerce'); ?></button>
        </p>

        <?php do_action('woocommerce_register_form_end'); ?>

    </form>

    <?php
    return ob_get_clean();
}
add_shortcode('tfc_registration_form', 'tfc_stoveshield_registration_form_shortcode');



/**
 * WooCommerce Customer Login Shortcode
 */
add_shortcode('tfc_wc_login_form', 'tfc_stoveshield_login_form');
function tfc_stoveshield_login_form()
{
    if (is_user_logged_in()) return '<p>You are already logged in</p>';
    ob_start();
    do_action('woocommerce_before_customer_login_form');
    woocommerce_login_form(array('redirect' => wc_get_page_permalink('my-account')));
    return ob_get_clean();
}

/**
 *  Optionally Redirect Login & Registration Pages to My Account Page If Customer Is Logged In
 */
function tfc_stoveshield_redirect_login_registration_if_logged_in()
{
    if (is_page() && is_user_logged_in() && (has_shortcode(get_the_content(), 'wc_login_form_bbloomer') || has_shortcode(get_the_content(), 'wc_reg_form_bbloomer'))) {
        wp_safe_redirect(wc_get_page_permalink('login'));
        exit;
    }
}
add_action('template_redirect', 'tfc_stoveshield_redirect_login_registration_if_logged_in');



/** 
 * Add Login and Terms and Condition Links After Registration Form
 */
function tfc_custom_login_links_registration_form()
{
    echo '<div class="tfc_registration_form_links create-account">
    <p>
        Already have an account ?<a href="' . esc_html(get_page_link(get_page_by_path('login'))) . '"> Log In now!</a>
    </p>
    <br>
    <p>By Signing up i agree to Stove Shield <a href="#">Terms of Service</a> and <a href="' . esc_html(get_page_link(get_page_by_path('privacy-policy'))) . '"> Privacy Policy.</a></p>
    </div>';
};

add_action('woocommerce_register_form_end', 'tfc_custom_login_links_registration_form', 10);



/**
 * Add Register Link after Login Form
 */
function tfc_custom_register_link_registration_form()
{
    echo '<div class="tfc_login_form_links create-account">
    <p>
        Don`t have an account?<a href=' . esc_html(get_page_link(get_page_by_path('register'))) . '>  Sign up now!</a>
    </p>
</div>';
}
add_action('woocommerce_login_form_end', 'tfc_custom_register_link_registration_form', 10);



/** 
 * Redirect User If User Is not Login for my-accout Page 
 */
function tfc_redirect_user_login_page()
{
    if (is_page('my-account') && !is_user_logged_in()) :
        wp_safe_redirect(esc_html(get_page_link(get_page_by_path('login'))));
    endif;
}
add_action('wp', 'tfc_redirect_user_login_page');



/** 
 * Customization of Single Product Page
 */
add_action('woocommerce_single_product_summary', 'tfc_single_product_buynow_button', 11);
function tfc_single_product_buynow_button()
{
    // get the current post/product ID
    $current_product_id = get_the_ID();

    // get the product based on the ID
    $product = wc_get_product($current_product_id);

    // run only on simple products
    if ($product->is_type('simple')) {
        echo '<a href="' . wc_get_checkout_url() . '?add-to-cart=' . $current_product_id . '" class="global_btn" style="max-width:fit-content;" >Buy Now</a>';
    }
}



// Display Product Model Number in Single Product
add_action('woocommerce_single_product_summary', 'get_model_number_single_product_summary', 15);
function get_model_number_single_product_summary()
{
    $model_number_name = get_field('model_number_name', get_the_ID());
    if (!empty($model_number_name)) : ?>
        <div class="product_meta flex_row">
            <span>Model number:</span>
            <div class="number">
                <?php echo $model_number_name; ?>
            </div>
        </div>
        <?php endif;
}


/**
 * Display Product Description Single Product Summary
 */
add_action('woocommerce_single_product_summary', 'display_product_description_single_product_summary', 16);
function display_product_description_single_product_summary()
{
    $categories = get_the_terms(get_the_ID(), 'product_cat');
    // echo "<pre>";

    // You want to check if there's an object with slug 'decal-protectors'
    $found = false;
    foreach ($categories as $term) :
        if ($term->slug === 'decal-protectors') {
            $found = true;
            break; // Stop the loop if you found the term
        }
    endforeach;

    $product_specification = get_field('product_specification', 'options');
    if ($found) :
        if ($product_specification['decal_panel_protector']) :
        ?>
            <div class="product_short_description">
                <ul class="flex_column">
                    <?php foreach ($product_specification['decal_panel_protector'] as $data) : ?>
                        <li>
                            <img src="<?php echo esc_url(home_url())?>/wp-content/uploads/2024/04/yellow_tick.svg" alt="yellow_tick" style="width: 25px; height:25px;" > 
                            <?php echo $data['specification'];?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
<?php
        endif;
    else :
        if ($product_specification['stove_top_protector']) :
            ?>
                <div class="product_short_description">
                    <ul class="flex_column">
                        <?php foreach ($product_specification['stove_top_protector'] as $data) : ?>
                            <li>
                                <img src="<?php echo esc_url(home_url())?>/wp-content/uploads/2024/04/yellow_tick.svg" alt="yellow_tick" style="width: 25px; height:25px;" > 
                                <?php echo $data['specification'];?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
        <?php
            endif;
    endif;
}

// Remove Product Meta Category From Single Product Page
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

// Show Woocommerce Single Rating Before Title 
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 3);


// Remove Single Product Data Tabs
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);


// Remove Single Product woocommerce_upsell_display
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);


// Remove Related Product 
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


/** Shop Page Title */
remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header');
