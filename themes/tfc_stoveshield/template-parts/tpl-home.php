<?php
/* Template Name: Home page 
*/

get_header();
?>
<main>
    <!---------- Section-1 Home Page -------------------->
    <?php
    // Banner Section 
    $banner_section = get_field('banner_section', 'option');
    $banner_image = ($banner_section['image']) ? $banner_section['image'] : '';
    $banner_title = ($banner_section['title']) ? $banner_section['title'] : '';
    $banner_sub_title = ($banner_section['sub_title']) ? $banner_section['sub_title'] : '';
    $banner_button_link = ($banner_section['button_link']) ? $banner_section['button_link'] : '';
    $img_src = 'http://localhost/stoveshields/wp-content/uploads/2024/04/circle-play-1.svg';
    ?>
    <section class="hero_section" style="background-image: url('<?php echo esc_url($banner_image) ?>');">
        <div class="wrapper flex_column">
            <span><?php echo $banner_sub_title; ?></span>
            <h1><?php echo $banner_title ?></h1>
            <div class="input_container"><input type="search" name="" id="" placeholder="Search your stove model number..."></div>
            <div class="video_popup flex_row">
                <img src="<?php echo $img_src; ?>" class="tfc_banner_vdo_img" alt="<?php echo pathinfo(basename($img_src), PATHINFO_FILENAME); ?>" />
                <span>Need Help Locating Your Model Number?</span>
            </div>
        </div>
    </section>

    <!---------- Section-2 Home Page -------------------->
    <?php
    // feature section
    $feature_section = get_field('feature_section');
    if ($feature_section) {
        $title = $feature_section['title'] ? $feature_section['title'] : '';
        $subtitle = $feature_section['subtitle'] ? $feature_section['subtitle'] : '';
        $features = $feature_section['features'];
    }
    if ($title || $subtitle) : ?>
        <section class="homepage_section2">
            <div class="container_1500">
                <div class="wrapper flex_column">
                    <div class="column">
                        <h2><?php echo $title; ?></h2>
                        <p><?php echo $subtitle; ?></p>
                    </div>
                    <?php if ($features) : ?>
                        <div class="column flex_row">
                            <?php foreach ($features as $feature) :
                                if ($feature['image'] && $feature['title'] && $feature['description']) :; ?>
                                    <div class="info_box flex_column">
                                        <?php $logo_name = pathinfo(basename($feature['image']), PATHINFO_FILENAME); ?>
                                        <img src="<?php echo $feature['image']; ?>" alt="<?php echo $logo_name; ?>" width="69" height="69">
                                        <h3><?php echo $feature['title'];  ?></h3>
                                        <p><?php echo $feature['description']; ?></p>
                                    </div>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!---------- Section-3 Home Page -------------------->
    <?php
    // brand section
    $popular_brands = get_field('popular_brands', 'option');
    if ($popular_brands) :
        $title = ($popular_brands['title']) ? $popular_brands['title'] : ' ';
        $brand_button = $popular_brands['button'];
    ?>
        <section class="homepage_section3">
            <div class="container_1760">
                <div class="wrapper flex_column">
                    <h2><?php echo $title; ?></h2>
                    <div class="column flex_column">
                        <?php if (!empty($popular_brands['brands'])) : ?>
                            <div class="inner_column inner_column1 flex_row tfc_brand_images">
                                <?php foreach ($popular_brands['brands'] as $brand) : ?>
                                    <a href="<?php echo $brand['link']; ?>"> <img src="<?php echo $brand['image']; ?>" /> </a>
                                <?php endforeach; ?>
                            </div>
                        <?php
                        endif; ?>
                    </div>
                    <?php if (!empty($brand_button) && $brand_button['title'] && $brand_button['url']) : ?>
                        <div class="column flex_row">
                            <span>Don’t see your brand?</span>
                            <a class="global_btn" href="<?php echo $brand_button['url']; ?>">
                                <div class="btn_wrapper">
                                    <span><?php echo $brand_button['title']; ?></span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!---------- Section-4 Home Page -------------------->
    <?php
    // video section
    $video_section = get_field('video_section');
    if ($video_section['title'] && $video_section['image']) :
    ?>
        <section class="homepage_section4">
            <div class="container_1500">
                <div class="wrapper flex_column">
                    <h2><?php echo $video_section['title']; ?></h2>
                    <img src="<?php echo $video_section['image']; ?>" alt="">
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!---------- Section-5 Home Page -------------------->
    <?php

    $product_section = get_field('product_section');
    if ($product_section) {
        $product_section_title = $product_section['title'];
        $product_section_description = $product_section['description'];
        $product_section['products'];
    };
    if ($product_section_title && $product_section_description && !empty($product_section)) :
    ?>
        <section class="homepage_section5">
            <div class="container_1500">
                <div class="wrapper flex_column">
                    <div class="column flex_row">
                        <div class="inner_column">
                            <h2><?php echo $product_section_title; ?></h2>
                            <p><?php echo $product_section_description; ?></p>
                        </div>
                    </div>
                    <div class="column flex_row">
                        <?php foreach ($product_section['products'] as $product) :
                            if ($product['product_image'] && $product['product_name']) :
                        ?>
                                <div class="inner_column inner_column_1 flex_column">
                                    <div class="product_img">
                                        <img src="<?php echo $product['product_image']; ?>" alt="">
                                    </div>
                                    <div class="product_description">
                                        <h2><?php echo $product['product_name']; ?></h2>
                                        <ul class="flex_column tfc_home_products_description">
                                            <?php foreach ($product['product_description'] as $description) :
                                                if ($description['icon'] && $description['description']) : ?>
                                                    <li>
                                                        <img src="<?php echo $description['icon']; ?>" alt="<?php echo pathinfo(basename($description['icon']), PATHINFO_FILENAME) ?>" width="42" height="42">
                                                        <span><?php echo $description['description']; ?></span>
                                                    </li>
                                            <?php endif;
                                            endforeach; ?>
                                            <?php if (!empty($product['button'])) : ?>
                                                <li>
                                                    <?php if ($product['button']['url'] && $product['button']['title']) : ?>
                                                        <a class="global_btn" href="<?php echo $product['button']['url']; ?>">
                                                            <div class="btn_wrapper">
                                                                <span><?php echo $product['button']['title']; ?></span>
                                                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                        </a>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                        <?php endif;
                        endforeach; ?>
                    </div>

                </div>
            </div>
        </section>
    <?php endif;
    ?>




    <!---------- Section-6 Home Page -------------------->
    <?php
    // video section 2
    $video_section = get_field('video_section_2');
    if ($video_section['image']) :
    ?>
        <section class="homepage_section6">
            <div class="container_1500">
                <img src="<?php echo $video_section['image']; ?>">
            </div>
        </section>
    <?php endif; ?>

    <!---------- Section-7 Home Page Review Section -------------------->
    <section class="homepage_section7 review_section">
        <div class="container_1760">
            <div class="wrapper">
                <div class="column flex_row">
                    <div class="inner_column">
                        <h2>Customers Love Their Stove ShieldStove Top Protectors</h2>
                    </div>
                </div>
                <div class="column">
                    <p>The forthcoming section will be implemented professionally through the ReviewX Plugin, prioritizing user experience and brand integrity.</p>
                </div>
            </div>
        </div>
    </section>

    <!---------- Section-8 Home Page Popular Products-------------------->
<?php
// display products
$product=get_field('product_section','option');
$shortcode=$product['shortcode'];
if(!empty($product['title']) && !empty($product['shortcode'])):
?>
    <section class="homepage_section8 best_sellers">
        <div class="container_1760">
            <div class="wrapper flex_column">
                <div class="column flex_row">
                    <h2>Shop For Popular Stove Top Protectors For Your Stove, Range or Cooktop</h2>
                </div>         
                <div class="column grid_row">
                    <?php echo do_shortcode(" $shortcode "); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>

    <!---------- Section-9 Home Page -------------------->
    <?php
    // Gift section
    $gift_section = get_field('gift_section', 'option');
    if ($gift_section) :
        $title = ($gift_section['title']) ? $gift_section['title'] : '';
        $description = ($gift_section['description']) ? $gift_section['description'] : '';
        $button_text = ($gift_section['button_text']) ? $gift_section['button_text'] : '';
        $button_link = ($gift_section['button_link']) ? $gift_section['button_link'] : '';
        if (!empty($title) && !empty($button_text)) :
    ?>
            <section class="global_gift_card_template">
                <div class="wrapper flex_column">
                    <div class="column flex_column">
                        <h2><?php echo $title; ?></h2>
                        <h3><?php echo $description; ?></h3>
                        <?php if ($button_link && $button_text) : ?>
                            <a class="global_btn" href="<?php $button_link; ?>">
                                <div class="btn_wrapper">
                                    <span><?php echo $button_text; ?></span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
    <?php
        endif;
    endif; ?>

    <!---------- Section-10 Home Page -------------------->
    <!-- <section class="global_find_store_template">
        <div class="container_1760">
            <div class="wrapper flex_column">
                <h2>Find your Stove Shield Stove Top Protector</h2>
                <div class="input_container"><input type="search" name="" id="" placeholder="Search your stove model number..."></div>
                <div class="video_popup flex_row">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15.0015 11.3344C15.3354 11.5569 15.5023 11.6682 15.5605 11.8085C15.6113 11.9311 15.6113 12.0689 15.5605 12.1915C15.5023 12.3318 15.3354 12.4431 15.0015 12.6656L11.2438 15.1708C10.8397 15.4402 10.6377 15.5749 10.4702 15.5649C10.3243 15.5561 10.1894 15.484 10.1012 15.3674C10 15.2336 10 14.9908 10 14.5052V9.49481C10 9.00923 10 8.76644 10.1012 8.63261C10.1894 8.51601 10.3243 8.44386 10.4702 8.43515C10.6377 8.42515 10.8397 8.55982 11.2438 8.82917L15.0015 11.3344Z" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Need Help Locating Your Model Number?</span>
                </div>
                <p>Stove Shield is proudly USA-based and family owned. Each Stove Shield is custom designed for a guaranteed fit to protect your stove, range or cooktop.</p>

            </div>
        </div>

    </section> -->

    <!---------- Section-11 Home Page FAQ's Section -------------------->
    <?php
    //faq section
    $faqs = get_field('faqs', 'option');
    if ($faqs && $faqs['faq']) :
        $title = ($faqs['title']) ? $faqs['title'] : '';
        $description = ($faqs['description']) ? $faqs['description'] : '';
    ?>
        <section class="global_faq">
            <div class="container_1500">
                <div class="wrapper flex_column">
                    <div class="column flex_column">
                        <h2><?php echo $title; ?></h2>
                        <p><?php echo $description; ?></p>
                    </div>
                    <div class="column">
                        <div class="accordion flex_column">
                            <?php foreach ($faqs['faq'] as $data) :
                                $question =   $data['question'];
                                $answer =   $data['answer'];
                                if ($question || $answer) : ?>
                                    <div class="tab">
                                        <div class="tab_title">
                                            <h3><?php echo $question; ?></h3>
                                            <svg class="opensvg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="content">
                                            <p><?php echo  $answer; ?></p>
                                        </div>
                                    </div>
                            <?php
                                endif;
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!---------- Section-12 Home Page -------------------->
    <?php
    // Blog Section
    $blog_section = get_field('blog', 'option');
    if ($blog_section) :
        $title = ($blog_section['title']) ? $blog_section['title'] : '';
        $description = ($blog_section['description']) ? $blog_section['description'] : '';
        $blog_shortcode = ($blog_section['blog_shortcode']) ? $blog_section['blog_shortcode'] : '';
        if ($title && $blog_shortcode) :
    ?>
            <section class="global_blogs_archive_loop_template">
                <div class="container_1760">
                    <div class="wrapper flex_column">
                        <div class="column flex_column">
                            <h2><?php echo $title; ?></h2>
                            <p><?php echo $description; ?></p>
                        </div>
                        <?php echo do_shortcode(" $blog_shortcode "); ?>
                    </div>
                </div>
            </section>
    <?php endif;
    endif; ?>

    <!---------- Section-13 Home Page -------------------->
    <?php
    // contact form section
    $contact_form_section = get_field('contact_form_section', 'option');
    $contact_form_title = ($contact_form_section['title']) ? $contact_form_section['title'] : '';
    $contact_form_description = ($contact_form_section['description']) ? $contact_form_section['description'] : '';
    $contact_form_shortcode = ($contact_form_section['contact_form_shortcode']) ? $contact_form_section['contact_form_shortcode'] : '';
    if ($contact_form_section && !empty($contact_form_shortcode)) :
    ?>
        <section class="global_findModal_contact_form_template">
            <div class="wrapper flex_row">
                <div class="column flex_column">
                    <div class="inner_col_1 flex_column">
                        <h2><?php echo $contact_form_title ?></h2>
                        <p><?php echo $contact_form_description ?></p>
                    </div>
                    <div class="inner_col_2 flex_column">
                        <?php echo do_shortcode(" $contact_form_shortcode ") ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>