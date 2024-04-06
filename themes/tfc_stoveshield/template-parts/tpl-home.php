<?php /* Template Name: Home page */ 


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
        }
        };
        ?>
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
                <h2><?php echo $quality_title;?></h2>;
                 <img src="<?php echo esc_url($quality_img) ?>">';
            </div>
        </div>
     </section>


     <!---------- Section-5 Home Page -------------------->
	<?php
	// product specification section code
	$specification = get_field('product_specification');
	if($specification){
		$specification_title = ($specification['specification_title']) ? $specification['specification_title'] : '';
		$specification_content = ($specification['specification_content']) ? $specification['specification_content'] : '';
		$specification_product =$specification['product_features'];
		echo '<pre>';
			print_r($specification_product);
		echo '<a href="#">';
    	echo '<img src="' . $specification_product['product_image'] . '">';
	echo '</a>';
		foreach($specification_product as $product){
			echo '<pre>';
			print_r($product);
// 			echo '<a href="#">';
//     	echo '<img src="' . $product . '">';
// 			echo '</a>';
			
		}
		
	
	}
	?>
     <section class="homepage_section5">
        <div class="container_1500">
            <div class="wrapper flex_column">
             <div class="column flex_row">
                <div class="inner_column">
                    <h2><?php echo $specification_title;?></h2>
                    <p><?php echo $specification_content;?></p>
                </div>
             </div>
             <div class="column flex_row">
                <div class="inner_column inner_column_1 flex_column">

                    <div class="product_img">
                        <img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/stove_top_protect.png" alt="">
                    </div>
                    <div class="product_description">
                        <h2>Stove Top Protector</h2>
                        <ul class="flex_column">
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.2508 5.25C19.2508 5.25 17.2591 13.125 20.8793 21C24.4995 28.875 23.6245 36.75 23.6245 36.75M33.1294 36.75C33.1294 36.75 34.3009 28.875 30.6258 22.75C26.9507 16.625 28.0008 10.5 28.0008 10.5M13.8768 36.75C13.8768 36.75 15.0483 28.875 11.3732 22.75C7.69817 16.625 8.74823 10.5 8.74823 10.5" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Heat Resistant to 500* F</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.75 36.75L29.75 5.25M29.75 36.75L22.75 29.75M29.75 36.75L36.75 29.75M14.7 7L8.05 7C7.06991 7 6.57986 7 6.20552 7.19074C5.87623 7.35851 5.60852 7.62623 5.44074 7.95551C5.25 8.32986 5.25 8.81991 5.25 9.8L5.25 16.45C5.25 17.4301 5.25 17.9201 5.44074 18.2945C5.60852 18.6238 5.87623 18.8915 6.20552 19.0593C6.57986 19.25 7.06991 19.25 8.05 19.25L14.7 19.25C15.6801 19.25 16.1701 19.25 16.5445 19.0593C16.8738 18.8915 17.1415 18.6238 17.3093 18.2945C17.5 17.9201 17.5 17.4301 17.5 16.45L17.5 9.8C17.5 8.81991 17.5 8.32986 17.3093 7.95551C17.1415 7.62623 16.8738 7.35852 16.5445 7.19074C16.1701 7 15.6801 7 14.7 7ZM14.7 26.25L11.55 26.25C10.5699 26.25 10.0799 26.25 9.70552 26.4407C9.37623 26.6085 9.10852 26.8762 8.94074 27.2055C8.75 27.5799 8.75 28.0699 8.75 29.05L8.75 32.2C8.75 33.1801 8.75 33.6701 8.94074 34.0445C9.10852 34.3738 9.37623 34.6415 9.70552 34.8093C10.0799 35 10.5699 35 11.55 35L14.7 35C15.6801 35 16.1701 35 16.5445 34.8093C16.8738 34.6415 17.1415 34.3738 17.3093 34.0445C17.5 33.6701 17.5 33.1801 17.5 32.2L17.5 29.05C17.5 28.0699 17.5 27.5799 17.3093 27.2055C17.1415 26.8762 16.8738 26.6085 16.5445 26.4407C16.1701 26.25 15.6801 26.25 14.7 26.25Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                              <span>Easy to Apply</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 28V35M10.5 7V14M12.25 31.5H5.25M14 10.5H7M22.75 7L25.8175 14.7776C26.1463 15.6115 26.3107 16.0284 26.5625 16.3799C26.7857 16.6915 27.0585 16.9643 27.3701 17.1875C27.7216 17.4393 28.1385 17.6037 28.9724 17.9325L36.75 21L28.9724 24.0675C28.1385 24.3963 27.7216 24.5607 27.3701 24.8125C27.0585 25.0357 26.7857 25.3085 26.5625 25.6201C26.3107 25.9716 26.1463 26.3885 25.8175 27.2224L22.75 35L19.6825 27.2224C19.3537 26.3886 19.1893 25.9716 18.9375 25.6201C18.7143 25.3085 18.4415 25.0357 18.1299 24.8125C17.7784 24.5607 17.3615 24.3963 16.5276 24.0675L8.75 21L16.5276 17.9325C17.3615 17.6037 17.7784 17.4393 18.1299 17.1875C18.4415 16.9643 18.7143 16.6915 18.9375 16.3799C19.1893 16.0284 19.3537 15.6115 19.6825 14.7777L22.75 7Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span>Easy to Clean Up</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.875 21.875L17.5156 24.5156C18.1171 25.1171 18.4179 25.4179 18.7597 25.5188C19.0599 25.6074 19.3811 25.5928 19.6721 25.4774C20.0033 25.346 20.2756 25.0192 20.8203 24.3657L28 15.75M28.5753 8.32747C29.8682 8.36436 31.1501 8.8762 32.1369 9.86301C33.1237 10.8498 33.6356 12.1317 33.6725 13.4246C33.709 14.7041 33.7272 15.3438 33.7648 15.4927C33.8452 15.8114 33.7518 15.5859 33.9203 15.8682C33.9991 16 34.4386 16.4653 35.3174 17.3958C36.2055 18.3361 36.75 19.6045 36.75 21C36.75 22.3955 36.2055 23.6639 35.3174 24.6042C34.4386 25.5347 33.9991 26 33.9203 26.1318C33.7518 26.4141 33.8452 26.1886 33.7648 26.5073C33.7272 26.6562 33.709 27.2959 33.6725 28.5754C33.6356 29.8683 33.1237 31.1502 32.1369 32.137C31.1501 33.1238 29.8682 33.6356 28.5753 33.6725C27.2959 33.709 26.6562 33.7273 26.5073 33.7648C26.1885 33.8452 26.414 33.7518 26.1318 33.9204C26 33.9991 25.5347 34.4386 24.6042 35.3174C23.6639 36.2055 22.3955 36.75 21 36.75C19.6045 36.75 18.3361 36.2055 17.3958 35.3174C16.4653 34.4385 16 33.9991 15.8682 33.9204C15.586 33.7518 15.8114 33.8452 15.4927 33.7648C15.3438 33.7273 14.7039 33.709 13.4246 33.6725C12.1317 33.6356 10.8498 33.1238 9.86295 32.137C8.87613 31.1502 8.36428 29.8683 8.3274 28.5753C8.29091 27.2959 8.27266 26.6562 8.23512 26.5073C8.15474 26.1885 8.24813 26.414 8.07959 26.1318C8.00086 25.9999 7.56143 25.5347 6.68258 24.6042C5.79448 23.6638 5.25 22.3955 5.25 21C5.25 19.6045 5.79448 18.3362 6.68258 17.3958C7.56143 16.4653 8.00086 16.0001 8.07959 15.8682C8.24813 15.586 8.15474 15.8115 8.23512 15.4927C8.27266 15.3438 8.29091 14.7041 8.3274 13.4247C8.36428 12.1317 8.87613 10.8498 9.86295 9.86301C10.8498 8.8762 12.1317 8.36435 13.4246 8.32747C14.7041 8.29097 15.3438 8.27272 15.4927 8.23517C15.8114 8.15479 15.5859 8.24818 15.8682 8.07964C16 8.00091 16.4653 7.56143 17.3958 6.68259C18.3361 5.79448 19.6045 5.25 21 5.25C22.3955 5.25 23.6639 5.79449 24.6042 6.68262C25.5347 7.56147 26 8.00089 26.1318 8.07963C26.414 8.24817 26.1885 8.15478 26.5073 8.23516C26.6562 8.27271 27.2959 8.29096 28.5753 8.32747Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    
                                <span>FDA compliant, PTFE Coated Fibreglass Fabric</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M36.75 25.725C36.75 31.8139 33.3267 36.75 27.125 36.75C20.9233 36.75 17.5 31.8139 17.5 25.725C17.5 19.6361 27.125 5.25 27.125 5.25C27.125 5.25 36.75 19.6361 36.75 25.725Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.75 10.5C15.75 13.3995 13.3995 15.75 10.5 15.75C7.60051 15.75 5.25 13.3995 5.25 10.5C5.25 7.60051 7.60051 5.25 10.5 5.25C13.3995 5.25 15.75 7.60051 15.75 10.5Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span>Water Resistant, Removable and Hand Washable</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.5 21H31.5C31.5 17.2853 29.3956 14.0343 26.25 12.25L22.5215 17.8471M24.5 21C24.5 22.933 22.933 24.5 21 24.5C19.067 24.5 17.5 22.933 17.5 21M24.5 21C24.5 19.067 22.933 17.5 21 17.5C19.067 17.5 17.5 19.067 17.5 21M17.5 21H10.5C10.5 17.2856 12.6044 14.0347 15.75 12.25L19.4785 17.8471M19.4798 24.1535L15.75 29.7504C17.2838 30.8612 19.0798 31.5 20.9997 31.5C22.9198 31.5 24.7161 30.861 26.25 29.75L22.5202 24.1535M36.75 21C36.75 29.6985 29.6985 36.75 21 36.75C12.3015 36.75 5.25 29.6985 5.25 21C5.25 12.3015 12.3015 5.25 21 5.25C29.6985 5.25 36.75 12.3015 36.75 21Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span>Blocks Grease, Oils & Cleaning Chemicals from damaging The Panel</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
                                <a class="global_btn" href="">
                                    <div class="btn_wrapper">
                                        <span>Shop Stove Top Protector</span>
                                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="inner_column inner_column_1 flex_column">
                    <div class="product_img">
                        <img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/decal_protect.png" alt="">
                    </div>
                    <div class="product_description">
                        <h2>Decal Protector</h2>
                        <ul class="flex_column">
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.2508 5.25C19.2508 5.25 17.2591 13.125 20.8793 21C24.4995 28.875 23.6245 36.75 23.6245 36.75M33.1294 36.75C33.1294 36.75 34.3009 28.875 30.6258 22.75C26.9507 16.625 28.0008 10.5 28.0008 10.5M13.8768 36.75C13.8768 36.75 15.0483 28.875 11.3732 22.75C7.69817 16.625 8.74823 10.5 8.74823 10.5" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>Heat Resistant up to 300* F</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.125 15.7499L17.5 20.9999H24.5L21.875 26.2499M35 20.9999C35 28.8068 25.4451 34.4639 22.1225 36.1951C21.7631 36.3824 21.5834 36.476 21.3342 36.5245C21.14 36.5622 20.86 36.5622 20.6658 36.5245C20.4166 36.476 20.2369 36.3824 19.8775 36.1951C16.5549 34.4639 7 28.8068 7 20.9999V14.3807C7 12.9816 7 12.282 7.22883 11.6806C7.43098 11.1494 7.75947 10.6754 8.1859 10.2996C8.66862 9.87416 9.32365 9.62853 10.6337 9.13726L20.0169 5.61858C20.3807 5.48214 20.5626 5.41393 20.7497 5.38689C20.9157 5.3629 21.0843 5.3629 21.2503 5.38689C21.4374 5.41393 21.6193 5.48214 21.9831 5.61858L31.3663 9.13726C32.6764 9.62853 33.3314 9.87416 33.8141 10.2996C34.2405 10.6754 34.569 11.1494 34.7712 11.6806C35 12.282 35 12.9816 35 14.3807V20.9999Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                              <span>Sturdy & Durable</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M29.75 36.75L29.75 5.25M29.75 36.75L22.75 29.75M29.75 36.75L36.75 29.75M14.7 7L8.05 7C7.06991 7 6.57986 7 6.20552 7.19074C5.87623 7.35851 5.60852 7.62623 5.44074 7.95551C5.25 8.32986 5.25 8.81991 5.25 9.8L5.25 16.45C5.25 17.4301 5.25 17.9201 5.44074 18.2945C5.60852 18.6238 5.87623 18.8915 6.20552 19.0593C6.57986 19.25 7.06991 19.25 8.05 19.25L14.7 19.25C15.6801 19.25 16.1701 19.25 16.5445 19.0593C16.8738 18.8915 17.1415 18.6238 17.3093 18.2945C17.5 17.9201 17.5 17.4301 17.5 16.45L17.5 9.8C17.5 8.81991 17.5 8.32986 17.3093 7.95551C17.1415 7.62623 16.8738 7.35852 16.5445 7.19074C16.1701 7 15.6801 7 14.7 7ZM14.7 26.25L11.55 26.25C10.5699 26.25 10.0799 26.25 9.70552 26.4407C9.37623 26.6085 9.10852 26.8762 8.94074 27.2055C8.75 27.5799 8.75 28.0699 8.75 29.05L8.75 32.2C8.75 33.1801 8.75 33.6701 8.94074 34.0445C9.10852 34.3738 9.37623 34.6415 9.70552 34.8093C10.0799 35 10.5699 35 11.55 35L14.7 35C15.6801 35 16.1701 35 16.5445 34.8093C16.8738 34.6415 17.1415 34.3738 17.3093 34.0445C17.5 33.6701 17.5 33.1801 17.5 32.2L17.5 29.05C17.5 28.0699 17.5 27.5799 17.3093 27.2055C17.1415 26.8762 16.8738 26.6085 16.5445 26.4407C16.1701 26.25 15.6801 26.25 14.7 26.25Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span>Easy to Apply</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.75 28V35M10.5 7V14M12.25 31.5H5.25M14 10.5H7M22.75 7L25.8175 14.7776C26.1463 15.6115 26.3107 16.0284 26.5625 16.3799C26.7857 16.6915 27.0585 16.9643 27.3701 17.1875C27.7216 17.4393 28.1385 17.6037 28.9724 17.9325L36.75 21L28.9724 24.0675C28.1385 24.3963 27.7216 24.5607 27.3701 24.8125C27.0585 25.0357 26.7857 25.3085 26.5625 25.6201C26.3107 25.9716 26.1463 26.3885 25.8175 27.2224L22.75 35L19.6825 27.2224C19.3537 26.3886 19.1893 25.9716 18.9375 25.6201C18.7143 25.3085 18.4415 25.0357 18.1299 24.8125C17.7784 24.5607 17.3615 24.3963 16.5276 24.0675L8.75 21L16.5276 17.9325C17.3615 17.6037 17.7784 17.4393 18.1299 17.1875C18.4415 16.9643 18.7143 16.6915 18.9375 16.3799C19.1893 16.0284 19.3537 15.6115 19.6825 14.7777L22.75 7Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    
                                <span>Easy to Clean Up</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M36.75 25.725C36.75 31.8139 33.3267 36.75 27.125 36.75C20.9233 36.75 17.5 31.8139 17.5 25.725C17.5 19.6361 27.125 5.25 27.125 5.25C27.125 5.25 36.75 19.6361 36.75 25.725Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M15.75 10.5C15.75 13.3995 13.3995 15.75 10.5 15.75C7.60051 15.75 5.25 13.3995 5.25 10.5C5.25 7.60051 7.60051 5.25 10.5 5.25C13.3995 5.25 15.75 7.60051 15.75 10.5Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span>Water Resistant, Removable and Hand Washable</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.5 21H31.5C31.5 17.2853 29.3956 14.0343 26.25 12.25L22.5215 17.8471M24.5 21C24.5 22.933 22.933 24.5 21 24.5C19.067 24.5 17.5 22.933 17.5 21M24.5 21C24.5 19.067 22.933 17.5 21 17.5C19.067 17.5 17.5 19.067 17.5 21M17.5 21H10.5C10.5 17.2856 12.6044 14.0347 15.75 12.25L19.4785 17.8471M19.4798 24.1535L15.75 29.7504C17.2838 30.8612 19.0798 31.5 20.9997 31.5C22.9198 31.5 24.7161 30.861 26.25 29.75L22.5202 24.1535M36.75 21C36.75 29.6985 29.6985 36.75 21 36.75C12.3015 36.75 5.25 29.6985 5.25 21C5.25 12.3015 12.3015 5.25 21 5.25C29.6985 5.25 36.75 12.3015 36.75 21Z" stroke="#219653" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <span>Blocks Grease, Oils & Cleaning Chemicals from damaging The Panel</span>
                            </li>
                            <li>
                                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
                                <a class="global_btn" href="">
                                    <div class="btn_wrapper">
                                        <span>Shop Decal Panel Protector</span>
                                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                            </li>
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
     <section class="homepage_section8 best_sellers">
        <div class="container_1760">
            <div class="wrapper flex_column">
                <div class="column flex_row">
                    <h2>Shop For Popular Stove Top Protectors For Your Stove, Range or Cooktop</h2>
                </div>
                <div class="column grid_row">

                    <div class="product_loop product_wrapper flex_column">
                        <div class="column product_meta flex_column">
                            <div class="inner_column brand_name">
                                <span>Brand Name</span>
                                <strong> - GE</strong>
                            </div>
                            <div class="inner_column model_no">
                                <span>Model No.</span>
                                <strong> - PGP943SET5SS</strong>
                            </div>
                        </div>
                        <div class="column product_image">
                            <img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/stove_protect-4-1.png" alt="">
                        </div>
                        <div class="column product_details flex_column">
                            <h3>GE Decal Protector  Stove Shield</h3>
                            <span class="price">$59.99</span>
                            <a class="global_btn add_to_cart" href="">
                                <div class="btn_wrapper">
                                    <span>Add to cart</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="product_loop product_wrapper flex_column">
                        <div class="column product_meta flex_column">
                            <div class="inner_column brand_name">
                                <span>Brand Name</span>
                                <strong> - GE</strong>
                            </div>
                            <div class="inner_column model_no">
                                <span>Model No.</span>
                                <strong> - PGP943SET5SS</strong>
                            </div>
                        </div>
                        <div class="column product_image">
                            <img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/stove_protect-4-1.png" alt="">
                        </div>
                        <div class="column product_details flex_column">
                            <h3>GE Decal Protector – Stove Shield</h3>
                            <span class="price">$59.99</span>
                            <a class="global_btn add_to_cart" href="">
                                <div class="btn_wrapper">
                                    <span>Add to cart</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="product_loop product_wrapper flex_column">
                        <div class="column product_meta flex_column">
                            <div class="inner_column brand_name">
                                <span>Brand Name</span>
                                <strong> - GE</strong>
                            </div>
                            <div class="inner_column model_no">
                                <span>Model No.</span>
                                <strong> - PGP943SET5SS</strong>
                            </div>
                        </div>
                        <div class="column product_image">
                            <img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/stove_protect-4-1.png" alt="">
                        </div>
                        <div class="column product_details flex_column">
                            <h3>GE Decal Protector – Stove Shield</h3>
                            <span class="price">$59.99</span>
                            <a class="global_btn add_to_cart" href="">
                                <div class="btn_wrapper">
                                    <span>Add to cart</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            
                        </div>
                    </div>

                    <div class="product_loop product_wrapper flex_column">
                        <div class="column product_meta flex_column">
                            <div class="inner_column brand_name">
                                <span>Brand Name</span>
                                <strong> - GE</strong>
                            </div>
                            <div class="inner_column model_no">
                                <span>Model No.</span>
                                <strong> - PGP943SET5SS</strong>
                            </div>
                        </div>
                        <div class="column product_image">
                            <img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/stove_protect-4-1.png" alt="">
                        </div>
                        <div class="column product_details flex_column">
                            <h3>GE Decal Protector – Stove Shield</h3>
                            <span class="price">$59.99</span>
                            <a class="global_btn add_to_cart" href="">
                                <div class="btn_wrapper">
                                    <span>Add to cart</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                            stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            
                        </div>
                    </div>
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
            <div class="btn_wrapper">
                <span>Select Amount</span>
                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
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
     <section class="global_faq">
     <div class="container_1500">
        <div class="wrapper flex_column">
            <div class="column flex_column">
             <h2>FAQ's</h2>
             <p>Frequently Asked Questions</p>
            </div>
            <div class="column">
                <div class="accordion flex_column">
                    <div class="tab">
                        <div class="tab_title">
                            <h3>Shipping</h3>
                            <svg class="opensvg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content open">
                            <p>
                                Yes! We love adding to our Stove Shield collection. Please send us an email at service@stoveshield.com. If you have questions on how to locate your model number, we've put together a guide to find your stove model number: Locate My Model Number
                            </p>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab_title">
                            <h3>Order Tracking Number</h3>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <p>
                                Yes! We love adding to our Stove Shield collection. Please send us an email at service@stoveshield.com. If you have questions on how to locate your model number, we've put together a guide to find your stove model number: Locate My Model Number
                            </p>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab_title">
                            <h3>How is Stove Shield made?</h3>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <p>
                                Yes! We love adding to our Stove Shield collection. Please send us an email at service@stoveshield.com. If you have questions on how to locate your model number, we've put together a guide to find your stove model number: Locate My Model Number
                            </p>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab_title">
                            <h3>Will you provide installation instructions?</h3>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <p>
                                Yes! We love adding to our Stove Shield collection. Please send us an email at service@stoveshield.com. If you have questions on how to locate your model number, we've put together a guide to find your stove model number: Locate My Model Number
                            </p>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="tab_title">
                            <h3>I don’t see my Stove Shield available. Can you make my stove shield?</h3>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content">
                            <p>
                                Yes! We love adding to our Stove Shield collection. Please send us an email at service@stoveshield.com. If you have questions on how to locate your model number, we've put together a guide to find your stove model number: Locate My Model Number
                            </p>
                        </div>
                    </div>
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
                    <div class="post_archive_loop flex_column">
                        <div class="column featured_image">
                            <a href=""><img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/blog_img_1-1.png" alt=""></a>
                        </div>
                        <div class="column post_short_meta_desp flex_column">
                            <h3>How to Find the Right Stove Model Number of Your Stove?</h3>
                             <div class="post_date">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.125 9.375H21.875M7.29167 3.125V5.20833M17.7083 3.125V5.20833M6.25 13.5417H8.33333M6.25 17.7083H8.33333M11.4583 13.5417H13.5417M11.4583 17.7083H13.5417M16.6667 13.5417H18.75M16.6667 17.7083H18.75M6.45833 21.875H18.5417C19.7084 21.875 20.2918 21.875 20.7375 21.6479C21.1295 21.4482 21.4482 21.1295 21.6479 20.7375C21.875 20.2918 21.875 19.7084 21.875 18.5417V8.54167C21.875 7.37489 21.875 6.7915 21.6479 6.34585C21.4482 5.95385 21.1295 5.63514 20.7375 5.4354C20.2918 5.20833 19.7084 5.20833 18.5417 5.20833H6.45833C5.29156 5.20833 4.70817 5.20833 4.26252 5.4354C3.87052 5.63514 3.55181 5.95385 3.35207 6.34585C3.125 6.7915 3.125 7.37489 3.125 8.54167V18.5417C3.125 19.7084 3.125 20.2918 3.35207 20.7375C3.55181 21.1295 3.87052 21.4482 4.26252 21.6479C4.70817 21.875 5.29156 21.875 6.45833 21.875Z" stroke="#6F6E6D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>January 26, 2024</span>
                             </div>
                             <p>Lorem ipusm dolar sit amet, lorem ipsum dolar sit amat Lorem ipsum dolar sit amet, lorem ipsum dolar sit amet...</p>
                             <a class="global_btn" href="">
                                <div class="btn_wrapper">
                                    <span>Read More</span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            </div>
                        </div>
                    <div class="post_archive_loop flex_column">
                        <div class="column featured_image">
                            <a href=""><img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/blog_img_1-1.png" alt=""></a>
                        </div>
                        <div class="column post_short_meta_desp flex_column">
                            <h3>How to Find the Right Stove Model Number of Your Stove?</h3>
                             <div class="post_date">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.125 9.375H21.875M7.29167 3.125V5.20833M17.7083 3.125V5.20833M6.25 13.5417H8.33333M6.25 17.7083H8.33333M11.4583 13.5417H13.5417M11.4583 17.7083H13.5417M16.6667 13.5417H18.75M16.6667 17.7083H18.75M6.45833 21.875H18.5417C19.7084 21.875 20.2918 21.875 20.7375 21.6479C21.1295 21.4482 21.4482 21.1295 21.6479 20.7375C21.875 20.2918 21.875 19.7084 21.875 18.5417V8.54167C21.875 7.37489 21.875 6.7915 21.6479 6.34585C21.4482 5.95385 21.1295 5.63514 20.7375 5.4354C20.2918 5.20833 19.7084 5.20833 18.5417 5.20833H6.45833C5.29156 5.20833 4.70817 5.20833 4.26252 5.4354C3.87052 5.63514 3.55181 5.95385 3.35207 6.34585C3.125 6.7915 3.125 7.37489 3.125 8.54167V18.5417C3.125 19.7084 3.125 20.2918 3.35207 20.7375C3.55181 21.1295 3.87052 21.4482 4.26252 21.6479C4.70817 21.875 5.29156 21.875 6.45833 21.875Z" stroke="#6F6E6D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>January 26, 2024</span>
                             </div>
                             <p>Lorem ipusm dolar sit amet, lorem ipsum dolar sit amat Lorem ipsum dolar sit amet, lorem ipsum dolar sit amet...</p>
                             <a class="global_btn" href="">
                                <div class="btn_wrapper">
                                    <span>Read More</span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            </div>
                        </div>
                    <div class="post_archive_loop flex_column">
                        <div class="column featured_image">
                            <a href=""><img src="http://stoveshields.thenerdshosting.com/wp-content/uploads/2024/04/blog_img_1-1.png" alt=""></a>
                        </div>
                        <div class="column post_short_meta_desp flex_column">
                            <h3>How to Find the Right Stove Model Number of Your Stove?</h3>
                             <div class="post_date">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.125 9.375H21.875M7.29167 3.125V5.20833M17.7083 3.125V5.20833M6.25 13.5417H8.33333M6.25 17.7083H8.33333M11.4583 13.5417H13.5417M11.4583 17.7083H13.5417M16.6667 13.5417H18.75M16.6667 17.7083H18.75M6.45833 21.875H18.5417C19.7084 21.875 20.2918 21.875 20.7375 21.6479C21.1295 21.4482 21.4482 21.1295 21.6479 20.7375C21.875 20.2918 21.875 19.7084 21.875 18.5417V8.54167C21.875 7.37489 21.875 6.7915 21.6479 6.34585C21.4482 5.95385 21.1295 5.63514 20.7375 5.4354C20.2918 5.20833 19.7084 5.20833 18.5417 5.20833H6.45833C5.29156 5.20833 4.70817 5.20833 4.26252 5.4354C3.87052 5.63514 3.55181 5.95385 3.35207 6.34585C3.125 6.7915 3.125 7.37489 3.125 8.54167V18.5417C3.125 19.7084 3.125 20.2918 3.35207 20.7375C3.55181 21.1295 3.87052 21.4482 4.26252 21.6479C4.70817 21.875 5.29156 21.875 6.45833 21.875Z" stroke="#6F6E6D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>January 26, 2024</span>
                             </div>
                             <p>Lorem ipusm dolar sit amet, lorem ipsum dolar sit amat Lorem ipsum dolar sit amet, lorem ipsum dolar sit amet...</p>
                             <a class="global_btn" href="">
                                <div class="btn_wrapper">
                                    <span>Read More</span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            </div>
                        </div>

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
                    <form action="" method="POST" class="flex_column">
                        <input type="text" name="name" id="name" placeholder="Name">
                        <input type="email" name="email" id="email" placeholder="Email address">
                        <input type="text" name="modal_number" id="modal_number" placeholder="Enter your stove model number (Optional)">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                        <div class="global_submit_btn">
                            <div class="btn_wrapper">
                                <input type="submit" value="Submit">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </form>
                </div>
              
            </div>
        </div>
     </section>
    </main>
<?php get_footer();?>