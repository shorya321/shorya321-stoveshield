<?php 

/* Template Name: Home page */

get_header();

?>

<main>
	<?php
	// Banner code
	$banner = get_field('banner_section');
	if($banner){
		$title = ($banner['title']) ? $banner['title'] : '';
		$image = ($banner['image']) ? $banner['image'] : '';
		$subtitle=($banner['sub_title']) ? $banner['sub_title'] : ' ';
		$description= ($banner['description']) ? $banner['description'] :' ';
	}
	?>
	
 <section class="hero_section" style="background-image: url('<?php echo esc_url($image) ?>');">
      <div class="wrapper flex_column">
		  
        <span><?php echo $subtitle ; ?></span>
        <h1><?php echo $title; ?></h1>
        <div class="input_container"><input type="search" name="" id="" placeholder="Search your stove model number..."></div>
        <div class="video_popup flex_row">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.0015 11.3344C15.3354 11.5569 15.5023 11.6682 15.5605 11.8085C15.6113 11.9311 15.6113 12.0689 15.5605 12.1915C15.5023 12.3318 15.3354 12.4431 15.0015 12.6656L11.2438 15.1708C10.8397 15.4402 10.6377 15.5749 10.4702 15.5649C10.3243 15.5561 10.1894 15.484 10.1012 15.3674C10 15.2336 10 14.9908 10 14.5052V9.49481C10 9.00923 10 8.76644 10.1012 8.63261C10.1894 8.51601 10.3243 8.44386 10.4702 8.43515C10.6377 8.42515 10.8397 8.55982 11.2438 8.82917L15.0015 11.3344Z" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span><?php echo $description; ?></span>
        </div>

      </div>
     </section>
	
     <!---------- Section-2 Home Page -------------------->
	<?php
	// Feature code
	$feature = get_field('feature_section');
	if($feature){
		$feature_title = ($feature['feature_title']) ? $feature['feature_title'] : '';
		$subtitle=($feature['subtitle']) ? $feature['subtitle'] : '';
		$features_arr=$feature['features'];
	}
	?>
     <section class="homepage_section2">
        <div class="container_1500">
            <div class="wrapper flex_column">
        <div class="column">
            <h2><?php echo $feature_title; ?></h2>
            <p><?php echo $subtitle; ?></p>
        </div>
		 <div class="column flex_row">
		<?php
			 if($features_arr){
		foreach ($features_arr as $item) {
     	echo '<div class="info_box flex_column">';
    	echo '<img src="' . $item['feature_inner_image'] . '" width="69px;" height="68px;">';
    	echo '<h3>' . $item['feature_inner_title'] . '</h3>';
    	echo '<p>' . $item['feature_inner_description'] . '</p>';
    	echo '</div>';
}};?>
  		</div>      
        </div>
    </div>
     </section>

     <!---------- Section-3 Home Page -------------------->
	<?php
	// Brand section code
	$brand = get_field('brand_section');
	if($brand){
		$brand_title = ($brand['brand_title']) ? $brand['brand_title'] : '';
		$brand_text = ($brand['brand_text']) ? $brand['brand_text'] : '';
		$brand_arr =$brand['brand_images'];
		$shop_btn = $brand['shop_button'];
	}
	?>
     <section class="homepage_section3">
        <div class="container_1760">
            <div class="wrapper flex_column">
            <h2><?php echo $brand_title;?></h2>  
          <div class="column flex_column">
            <div class="inner_column inner_column1 grid_row">
                 <?php
			 if($brand_arr){
		foreach ($brand_arr as $brand) {
			echo '<a href="#">';
    	echo '<img src="' . $brand['stove_brand'] . '">';
			echo '</a>';
  
         }};?>
            </div>
           
          </div>
          <div class="column flex_row">
            <span><?php echo $brand_text;?></span>
            <a class="global_btn" href="<?php echo esc_url($shop_btn['url']); ?>" target="_blank">
				<?php echo $shop_btn['title']; ?>
            </a>
          </div>
        </div>
        </div>
     </section>


     <!---------- Section-4 Home Page -------------------->
	<?php
	// Quality section code
	$quality = get_field('quality_section');
	if($quality){
		$quality_title = ($quality['quality_title']) ? $quality['quality_title'] : '';
		$quality_img = ($quality['quality_image']) ? $quality['quality_image'] : '';
	
	}
	?>
     <section class="homepage_section4">
        <div class="container_1500">
            <div class="wrapper flex_column">
                <h2><?php echo $quality_title;?></h2>
                 <img src="<?php echo esc_url($quality_img) ?>">
            </div>
        </div>
     </section>


     <!---------- Section-5 Home Page -------------------->
	<?php
    // product specification section code
    $specification = get_field('product_specification');
    if ($specification) {
        $specification_title = ($specification['specification_title']) ? $specification['specification_title'] : '';
        $specification_content = ($specification['specification_content']) ? $specification['specification_content'] : '';
        $specification_product = $specification['product_features'];
        $specification_product_second =$specification['product_features_second'];	
    }
    ?>
    <section class="homepage_section5">
        <div class="container_1500">
            <div class="wrapper flex_column">
                <div class="column flex_row">
                    <div class="inner_column">
                        <h2>
                            <?php echo $specification_title; ?>
                        </h2>
                        <p>
                            <?php echo $specification_content; ?>
                        </p>
                    </div>
                </div>
                <div class="column flex_row">
                    <div class="inner_column inner_column_1 flex_column">
                        <div class="product_img">
                            <?php if ($specification_product['product_image']) {
                                echo '<img src="' . $specification_product['product_image'] . '">';
                            }
                            ; ?>
                        </div>
                        <div class="product_description">
                            <?php
                            if ($specification_product['product_name']) {
                                echo '<h2>' . $specification_product['product_name'] . '</h2>';
                            } else {
                                '';
                            }
                            ?>
                            <ul class="flex_column">
                                <?php
                                $specs_desc = $specification_product['specification_description'];
                                foreach ($specs_desc as $desc) { ?>
                                    <li>
                                        <img src="<?php echo $desc['specification_icon']; ?>" style="width:30px;">
                                        <span>
                                            <?php echo $desc['specification_icon_text']; ?>
                                        </span>
                                    </li>
                                <?php };
                                if ($specification_product['shop_button']) {?>
                                    <li>
                                        <a class="global_btn btn_wrapper" href="<?php echo $specification_product['shop_button']['url']; ?>">
                                    <span><?php echo $specification_product['shop_button']['title']?></span>
											<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
										</a>
                            </li>
                               <?php };?>
                            </ul>
                        </div>
                    </div>

                    <div class="inner_column inner_column_1 flex_column">
                        <div class="product_img">
                            <?php if ($specification_product_second['product_image']) {
                                echo '<img src="' . $specification_product_second['product_image'] . '">';
                            }
                            ; ?>
                        </div>
                        <div class="product_description">
                            <?php
                            if ($specification_product_second['product_name']) {
                                echo '<h2>' . $specification_product_second['product_name'] . '</h2>';
                            } else {
                                '';
                            }
                            ?>
                            <ul class="flex_column">
                                <?php
                                $specs_desc = $specification_product_second['specification_description'];
                                foreach ($specs_desc as $desc) { ?>
                                    <li>
                                        <img src="<?php echo $desc['specification_icon']; ?>" style="width:30px;">
                                        <span>
                                            <?php echo $desc['specification_icon_text']; ?>
                                        </span>
                                    </li>
                                <?php };
                                if ($specification_product_second['shop_button']) {?>
                                    <li>
                                        <a class="global_btn btn_wrapper" href="<?php echo $specification_product_second['shop_button']['url']; ?>">
                                    <span><?php echo $specification_product_second['shop_button']['title']?></span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                                </a>
                            </li>
                               <?php }
                                ; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

     <!---------- Section-6 Home Page -------------------->
	<?php
	// video section code
	$video = get_field('stove_video');
	if($video){
		$video_img = ($video['video']) ? $video['video'] : '';
	}
	?>
     <section class="homepage_section6">
        <div class="container_1500">
     <img src="<?php echo esc_url($video_img); ?>">
        </div>
     </section>


     <!---------- Section-7 Home Page Review Section -------------------->
	<?php
	// review section code
	$review = get_field('product_reviews');
	if($review){
		$reviewtitle = ($review['review_title']) ? $review['review_title'] : '';
		$reviewsubtitle = ($review['review_subtitle']) ? $review['review_subtitle'] : '';
	}
	?>
     <section class="homepage_section7 review_section">
        <div class="container_1760">
            <div class="wrapper">
              <div class="column flex_row">
                <div class="inner_column">
                    <h2><?php echo $reviewtitle;?></h2>
                </div>
              </div>
              <div class="column">
                <p><?php echo $reviewsubtitle;?></p>
              </div>  
            </div>
        </div>
     </section>

     <!---------- Section-8 Home Page Popular Products-------------------->
	<?php
	$product =get_field('product_section');
	$productheading =($product['product_title']) ? $product['product_title'] : '';
	?>
     <section class="homepage_section8 best_sellers">
        <div class="container_1760">
            <div class="wrapper flex_column">
                <div class="column flex_row">
                    <h2><?php echo $productheading;?></h2>
                </div>
                <div class="column grid_row">
					<?php echo do_shortcode('[tfc_display_woocommerce_products post_type="product" category="" posts_per_page="4"]'); ?>
				</div>  
                </div>
            </div>
     </section>

     <!---------- Section-9 Home Page -------------------->
	<?php
	// find your stove section code
	$gift = get_field('gift_section');
	if($gift){
		$gifttitle = ($gift['gift_title']) ? $gift['gift_title'] : '';
		$giftamount=($gift['gift_amount']) ? $gift['gift_amount'] : ' ';
		$giftbutton= $gift['amount_btn'];
	}
	?>
	
     <section class="global_gift_card_template">
     <div class="wrapper flex_column">
        <div class="column flex_column">
         <h2><?php echo $gifttitle;?></h2>
         <h3><?php echo $giftamount;?></h3>
         <a class="global_btn" href="">
				<?php echo $giftbutton['title']; ?>
        </a>
        </div>
     </div>
     </section>

     <!---------- Section-10 Home Page -------------------->
	<?php
	// find your stove section code
	$stove = get_field('find_your_stoveshield_section');
	if($stove){
		$stovetitle = ($stove['title']) ? $stove['title'] : '';
		$stoveimage = ($stove['stove_image']) ? $stove['stove_image'] : '';
		$stovesubtitle=($stove['sub_title']) ? $stove['sub_title'] : ' ';
		$stovedescription= ($stove['description']) ? $stove['description'] :' ';
	}
	?>
     <section class="global_find_store_template">
        <div class="container_1760" style="background-image: url('<?php echo esc_url($stoveimage) ?>');">
            <div class="wrapper flex_column">
                <h2><?php echo $stovetitle ;?></h2>
                <div class="input_container"><input type="search" name="" id="" placeholder="Search your stove model number..."></div>
                <div class="video_popup flex_row">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.0015 11.3344C15.3354 11.5569 15.5023 11.6682 15.5605 11.8085C15.6113 11.9311 15.6113 12.0689 15.5605 12.1915C15.5023 12.3318 15.3354 12.4431 15.0015 12.6656L11.2438 15.1708C10.8397 15.4402 10.6377 15.5749 10.4702 15.5649C10.3243 15.5561 10.1894 15.484 10.1012 15.3674C10 15.2336 10 14.9908 10 14.5052V9.49481C10 9.00923 10 8.76644 10.1012 8.63261C10.1894 8.51601 10.3243 8.44386 10.4702 8.43515C10.6377 8.42515 10.8397 8.55982 11.2438 8.82917L15.0015 11.3344Z" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      <span><?php echo $stovesubtitle ;?></span>
                </div>
                <p><?php echo $stovedescription ;?></p>
        
              </div>
        </div>

     </section>

     <!---------- Section-11 Home Page FAQ's Section -------------------->
	<?php
	// FAQ section code
	$faq = get_field('faq_section');
	if($faq){
		$faqtitle = ($faq['faq_title']) ? $faq['faq_title'] : '';
		$faqsubtitle = ($faq['faq_subtitle']) ? $faq['faq_subtitle'] : '';
		$faqaccordion = $faq['faq_accordion'];
	}
	?>
     <section class="global_faq">
     <div class="container_1500">
        <div class="wrapper flex_column">
            <div class="column flex_column">
             <h2><?php echo $faqtitle; ?></h2>
             <p><?php echo $faqsubtitle; ?></p>
            </div>
            <div class="column">
                <div class="accordion flex_column">
                            <?php
						if($faqaccordion){
							foreach($faqaccordion as $accordion){
								echo '<div class="tab">';
								echo '<div class="tab_title">';
								echo '<h2>' .$accordion['faq_accordiontitle'] .'</h2>';
								echo '<svg class="opensvg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>';
								echo '</div>';
								echo '<div class="content open">';
								echo '<p>' .$accordion['faq_accordioncontent'] .'</p>';
								echo '</div>';
								echo '</div>';
						     	}
							}
							?>
                        </div>
                    </div>              
        </div>
     </div>
     </section>

     <!---------- Section-12 Home Page -------------------->
	<?php
	// Blog section code
	$blog =get_field('blog_section');
	if($blog){
		$blog_title = ($blog['blog_title']) ? $blog['blog_title'] : '';
		$blog_content = ($blog['blog_subtitle']) ? $blog['blog_subtitle'] : '';
	}
	?>
     <section class="global_blogs_archive_loop_template">
        <div class="container_1760">
            <div class="wrapper flex_column">
                <div class="column flex_column">
                    <h2><?php echo $blog_title ;?></h2>
                    <p><?php echo $blog_content ;?></p>
                </div>
				<div class="column flex_row">
					<?php echo news_home_post();?>
				</div>
            </div>
        </div>
     </section>

     <!---------- Section-13 Home Page -------------------->
     <section class="global_findModal_contact_form_template">
        <div class="wrapper flex_row">
            <div class="column flex_column">
                <div class="inner_col_1 flex_column">
                    <h2>Need Help Finding Your Model?</h2>
                    <p>Send us a message with your stove brand and model number and we will be in contact within 24 hours." Need help finding your model number?</p>
                </div>

                <div class="inner_col_2 flex_column">
                    <?php echo do_shortcode('[contact-form-7 id="d68ae60" title="Contact Form"]'); ?>
                </div>
              
            </div>
        </div>
     </section>
	
    </main>

<?php get_footer();?>