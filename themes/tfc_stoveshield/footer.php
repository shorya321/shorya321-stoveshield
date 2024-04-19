<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tfc_stoveshield
 */
?>
<!-- Footer Section Starts -->
<footer>
    <div class="container_1760">
        <div class="wrapper">
            <div class="u_content flex_row">
                <div class="column flex_column">
                    <?php
                    // footer logo section
                    $footer_section = get_field('footer_section', 'option');
                    $footer_logo = $footer_section['logo'];
                    $footer_description = $footer_section['description'];
                    if ($footer_section) :
                    ?>
                        <div class="logo">
                            <?php if ($footer_logo) : ?>
                                <a href=""><img src="<?php echo  $footer_logo; ?>" alt=""></a>
                            <?php endif; ?>
                        </div>
                        <?php if ($footer_description) : ?>
                            <p><?php echo $footer_description; ?><a href="<?php echo esc_html(site_url('/')) ?>"><strong>Read our story</strong></a></p>
                        <?php endif; ?>

                        <?php

                        $payment_method = get_field('payment_method', 'option');
                        $payment_title = $payment_method['title'];
                        if ($payment_method && $payment_title) :
                            echo '<h3>' . $payment_title . '</h3>';
                        endif ?>

                        <div class="payment_icons flex_row">
                            <?php
                            // payments icons
                            if ($payment_method && $payment_method['payment_images']) :
                                foreach ($payment_method['payment_images'] as $data) :
                                    $file_name = pathinfo(basename($data['images']), PATHINFO_FILENAME);
                                    echo '<img src="' . $data['images'] . '" alt="' . $file_name . '" width="65" height="45">';
                                endforeach;
                            endif;
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="column flex_column tfc_footer_menu">
                    <?php
                    // widgets menu
                    if (is_active_sidebar('footer_sidebar_1')) :
                        dynamic_sidebar('footer_sidebar_1');
                    endif;
                    ?>
                </div>
                <div class="column flex_column tfc_footer_menu">
                    <?php
                    // widgets menu
                    if (is_active_sidebar('footer_sidebar_2')) :
                        dynamic_sidebar('footer_sidebar_2');
                    endif;
                    ?>
                </div>
                <div class="column flex_column">
                    <?php
                    // contact info section
                    $contact_section = get_field('contact_section', 'option');
                    $contact_button_text = $contact_section['button_text'];
                    $contact_button_link = $contact_section['button_link'];
                    $contact_info = $contact_section['contact_info'];
                    if ($contact_section && $contact_info && $contact_info['address'] && $contact_info['email']) :
                    ?>
                        <h3>Contact Info</h3>
                        <a href="#" target="_blank" class="inner_col_1 flex_row">
                            <?php if (!empty($contact_info['address'])) : ?>
                                <img src="<?php echo get_site_url() . '/wp-content/uploads/2024/04/location-pin-alt-1.svg' ?>" style="width: 29px; height:29px;" alt="logo" />
                                <span><?php echo esc_html($contact_info['address']); ?></span>
                            <?php endif; ?>
                        </a>
                        <a href="#" target="_blank" class="inner_col_1 flex_row">
                            <?php
                            if (!empty($contact_info['email'])) : ?>
                                <img src="<?php echo get_site_url() . "/wp-content/uploads/2024/04/mail.svg" ?>" style="width: 29px; height:29px;" alt="logo" />
                                <span><?php echo esc_html($contact_info['email']); ?></span>
                        <?php endif;
                        endif; ?>
                        </a>

                        <div class="inner_col_3 flex_column">
                            <?php
                            // social icons
                            $social_section = get_field('social_section', 'option');
                            $sol_title = ($social_section['title']) ? $social_section['title'] : '';
                            $social_links = $social_section['follow_us'];

                            if ($social_section && $social_links) : ?>
                                <div class="inner_col_3 flex_column">
                                    <h3><?php echo $sol_title; ?></h3>
                                    <div class="social_icons flex_row">
                                        <?php foreach ($social_links as $data) : ?>
                                            <a href="<?php echo $data['link']; ?>">
                                                <img src="<?php echo $data['icon']; ?>">
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            // contact button
                            if ($contact_section && $contact_button_text && $contact_button_link) : ?>
                                <a class="global_btn" href="<?php echo $contact_button_link; ?>">
                                    <div class="btn_wrapper">
                                        <span><?php echo $contact_button_text; ?></span>
                                        <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                </a>
                            <?php endif ?>
                        </div>
                </div>
            </div>
            <?php

            // footer bottom
            $disclaimer = get_field('footer_below_section', 'option');
            if ($disclaimer && $disclaimer['disclaimer']) : ?>
                <div class="m_content flex_column">
                    <div class="wrapper">
                        <h4>Disclaimer</h4>
                        <p><?php echo esc_html($disclaimer['disclaimer']); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="l_content">
                <?php

                // copyright section
                $copyright = get_field('copyright', 'option');
                if ($copyright && $copyright['copyright_description']) : ?>
                    <span><?php echo $copyright['copyright_description'] ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>

</footer>
<div class="overlay"></div>
<?php
wp_footer(); ?>
</body>

</html>