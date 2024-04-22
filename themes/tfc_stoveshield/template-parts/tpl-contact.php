<?php
/* Template Name: Contact Page */
get_header();

$contact_section = get_field('contact_section', 'option');
$contact_info = $contact_section['contact_info'];
?>
<main>
    <section class="login_form contactUs">
        <div class="wrapper flex_row">

            <div class="column">
                <div class="inner_wrapper flex_column">
                    <div class="u_content flex_column">
                        <h2>Find My Stove Shield</h2>
                        <div class="input_container">
                            <input type="search" name="" id="" placeholder="Search your stove model number...">
                        </div>
                        <div class="video_popup flex_row">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.0015 11.3344C15.3354 11.5569 15.5023 11.6682 15.5605 11.8085C15.6113 11.9311 15.6113 12.0689 15.5605 12.1915C15.5023 12.3318 15.3354 12.4431 15.0015 12.6656L11.2438 15.1708C10.8397 15.4402 10.6377 15.5749 10.4702 15.5649C10.3243 15.5561 10.1894 15.484 10.1012 15.3674C10 15.2336 10 14.9908 10 14.5052V9.49481C10 9.00923 10 8.76644 10.1012 8.63261C10.1894 8.51601 10.3243 8.44386 10.4702 8.43515C10.6377 8.42515 10.8397 8.55982 11.2438 8.82917L15.0015 11.3344Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Need Help Locating Your Model Number?</span>
                        </div>
                    </div>
                    <?php if (!empty($contact_info['email'])) : ?>
                        <div class="m_content flex_column">
                            <h2>Get In Touch</h2>
                            <p>Email us at <a href="mailto:<?php echo $contact_info['email']; ?>"> <?php echo $contact_info['email']; ?></a> with your stove model or question and we will be in contact within 24 hours.</p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($contact_info['address']) || !empty($contact_info['email'])) : ?>
                        <div class="l_content flex_row">
                            <?php if ($contact_info['address']) : ?>
                                <div class="inner_column flex_column">
                                    <a href="">
                                        <img src="<?php echo get_site_url() . '/wp-content/uploads/2024/04/location-pin-alt-1.svg'; ?> " alt="location-pin-alt-1" style="width: 30px; height:30px;">
                                        <h3>Find us</h3>
                                    </a>
                                    <p><?php echo $contact_info['address']; ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($contact_info['email'])) : ?>
                                <div class="inner_column flex_column">
                                    <a href="">
                                        <img src="<?php echo get_site_url() . '/wp-content/uploads/2024/04/mail.svg'; ?>" alt="mail" style="width: 30px; height:30px;">
                                        <h3>Find us</h3>
                                    </a>
                                    <p><a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            
            <div class="column flex_column">
                <div class="inner_wrapper">
                    <h2>Write us a message</h2>
                    <?php if (!empty($contact_info['email'])) : ?>
                        <p>Email us at <a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a>
                            with your stove model or question and we will be in contact within 24 hours.
                        </p>
                    <?php endif; ?>

                    <?php $contact_form_section = get_field('contact_form_section', 'options');
                    $shortcode = ($contact_form_section['contact_page_shortcode__']) ? $contact_form_section['contact_page_shortcode__'] : '';
                    echo do_shortcode(" $shortcode ");
                    ?>
                    <?php if ($contact_info['email']) : ?>
                        <p>We recommend emailing us directly at <a href="mailto:<?php echo $contact_info['email']; ?>"><?php echo $contact_info['email']; ?></a> We look forward to hearing from you!</p>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </section>
</main>
<?php
get_footer(); ?>