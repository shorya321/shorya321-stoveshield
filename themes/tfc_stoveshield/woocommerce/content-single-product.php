<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<div class="container_1500 tfc_product">
		<div class="wrapper flex_row">
			<div class="column">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action('woocommerce_before_single_product_summary');
				?>
			</div>

			<div class="summary entry-summary column flex_column">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action('woocommerce_single_product_summary');
				?>
			</div>
		</div>
		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
	</div>

	<!-- Modal on Scroll -->
	<div class="add_to_cart_popup_modal flex_row tfc_single_product_modal">
		<div class="column flex_row">
			<!-- <img src="/assets/singleproductimage.png" alt=""> -->
			<?php echo woocommerce_show_product_images(); ?>
			<div class="inner_col">
				<div class="inner_col product_title">
					<?php
					global $product;
					echo '<h3>' . $product->get_name() . '</h3>';
					?>
				</div>
				<?php
				// model number get
				$model_number_name = get_field('model_number_name');
				$model_brand_name = get_field('model_brand_name');
				$extra_model_numbers = get_field('extra_model_numbers');
				$model_number = ($model_number_name) ? $model_number_name : '';
				$model_brand = ($model_brand_name) ? $model_brand_name : '';
				$extra_model = ($extra_model_numbers) ? $extra_model_numbers : '';
				?>
				<?php if ($model_number) : ?>
					<div class="inner_col global_product_meta_card">
						<span>Model Number:</span>
						<span><?php echo $model_number; ?></span>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="column">
			<div class="price">
				<span><?php echo woocommerce_template_single_price(); ?></span>
			</div>
		</div>
		<div class="column flex_row">
			<div class="add_to_cart_section flex_row">
				<!-- <div class="counter">
					<button class="decreaseBtn">-</button>
					<span class="quantity">0</span>
					<button class="increaseBtn">+</button>
				</div>
				<a class="global_btn add_to_cart" href="">
					<div class="btn_wrapper">
						<span>Add to cart</span>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
				</a> -->
				<?php echo woocommerce_template_single_add_to_cart(); ?>
			</div>
		</div>
	</div>

	<section class="section2_single_product">
		<div class="container_1760 flex_column">
			<div class="wrapper">
				<?php if ($model_number || $model_brand || $extra_model) : ?>
					<h1>Description</h1>

					<div class="column brand_name flex_row">
						<?php if ($model_brand) : ?>
							<div class="inner_column">
								<span>Brand Name:</span>
								<span><?php echo $model_brand; ?></span>
							</div>
						<?php endif; ?>

						<?php if ($model_number) : ?>
							<div class="inner_column">
								<span>Model Number:</span>
								<span><?php echo $model_number; ?></span>
							</div>
						<?php endif; ?>

						<?php if ($extra_model) : ?>
							<div class="inner_column">
								<span>Extra Model Number:</span>
								<span><?php echo $extra_model; ?></span>
							</div>
						<?php endif; ?>

					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>



	<?php
	//Product Details
	$product_details = get_field('product_details', 'option');
	if ($product_details) :
		$product_title = ($product_details['title']) ? $product_details['title'] : '';
		$product_description = ($product_details['description']) ? $product_details['description'] : '';
		$product_image = ($product_details['image']) ? $product_details['image'] : '';
		$feature = $product_details['feature'];
		$product_description = ($product_details['product_description']) ? $product_details['product_description'] : '';
		$additional_feature = $product_details['additional_feature'];
		$addional_description = ($product_details['addional_description']) ? $product_details['addional_description'] : '';
	?>
		<section class="section3_single_product product_details">
			<div class="container_1500">
				<div class="wrapper flex_column">
					<?php if ($product_title || $product_description) : ?>
						<div class="column flex_column">
							<?php if ($product_title) : ?>
								<h1><?php echo $product_title; ?></h1>
							<?php endif; ?>
							<?php if ($product_description) : ?>
								<p><?php echo $product_description; ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ($product_image) : ?>
						<div class="column">
							<img src="<?php echo $product_image ?>" alt="<?php echo tfc_getimage_filename($product_image); ?>">
						</div>
					<?php endif; ?>

					<div class="column flex_column">
						<?php if ($feature) : ?>
							<div class="inner_wrapper flex_row">
								<?php foreach ($feature as $data) :
									if ($data['feature_icon'] && $data['feature_text']) : ?>
										<div class="inner_column">
											<img src="<?php echo $data['feature_icon']; ?>" alt="<?php echo tfc_getimage_filename($data['feature_icon']); ?>">
											<h3><?php echo $data['feature_text'];  ?></h3>
										</div>
								<?php endif;
								endforeach; ?>
							</div>
						<?php
						endif; ?>
						<?php if ($product_description) : ?>
							<p><?php echo $product_description . ' '; ?><a href="<?php echo esc_url(home_url()) . '/our-story'; ?>">Read more about our story</a></p>
						<?php endif; ?>
					</div>

					<?php if ($additional_feature) : ?>
						<div class="column flex_row">
							<?php foreach ($additional_feature as $data) :
								if ($data['feature_icon'] && $data['feature_text']) : ?>
									<div class="inner_column">
										<img src="<?php echo $data['feature_icon']; ?>" alt="<?php echo tfc_getimage_filename($data['feature_icon']); ?>">
										<h3><?php echo $data['feature_text'];  ?></h3>
									</div>

							<?php endif;
							endforeach; ?>
						</div>
					<?php endif; ?>

					<?php if ($addional_description) : ?>
						<div class="column flex_column">
							<p><?php echo $addional_description; ?> </p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	// video section
	$video = get_field('video', 'option');
	if ($video) :
		$video_title = ($video['title']) ? $video['title'] : '';
		$video_image = ($video['image']) ? $video['image'] : '';
	?>
		<section class="section4_single_product">
			<?php if ($video_title || $video_image) : ?>
				<div class="wrapper flex_column">
					<?php if ($video_title) : ?>
						<h2><?php echo $video_title; ?></h2>
					<?php endif;
					if ($video_image) : ?>
						<img src="<?php echo $video_image; ?>" alt="<?php echo tfc_getimage_filename($video_image); ?>">
					<?php endif; ?>
				</div>
			<?php endif ?>
		</section>
	<?php endif; ?>

	<?php
	// Customer Services
	$customer_service = get_field('customer_service', 'option');
	if ($customer_service) :
		$title = ($customer_service['title']) ? $customer_service['title'] : '';
		$description = ($customer_service['description']) ? $customer_service['description'] : '';
		$button = $customer_service['button'];
	?>
		<section class="section5_single_product">
			<div class="wrapper flex_column">
				<?php if ($title) : ?>
					<h2><?php echo $title ?></h2>
				<?php endif; ?>
				<?php if ($description) : ?>
					<p><?php echo wordwrap($description, 128, "<br>\n"); ?></p>
					<?php endif;

				if ($button) :
					if ($button['title'] && $button['url']) : ?>
						<a class="global_btn" href="<?php echo $button['url']; ?>">
							<div class="btn_wrapper">
								<span><?php echo $button['title']; ?></span>
								<img src="<?php echo home_url() . '/wp-content/uploads/2024/04/arrow-right.svg' ?>" alt="arrow-right" style="width: 22px; height:23px;">
							</div>
						</a>
				<?php endif;
				endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<section class="single_productPage_review_section">
		<div class="container_1760">
			<div class="wrapper flex_column">
				<h1>Reviews(10)</h1>
				<p>Here We are going to use Review X plugin</p>
			</div>
		</div>
	</section>

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

</div>


<?php do_action('woocommerce_after_single_product'); ?>