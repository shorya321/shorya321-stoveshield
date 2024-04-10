<?php
/* Template Name: FAQ's page */
get_header();

$faqsarr = get_field('faqs');
?>
<main>
    <section class="section_1_faq" style="margin-top: 8.875rem;">
        <div class="container_1760">
            <h2>Frequently Asked Questions</h2>
            <div class="wrapper flex_row">
                <div class="column">
                    <ul class="flex_column">
                        <?php
                        foreach ($faqsarr as $faqmain) {
                            $faq_str = $faqmain['faq_title'];
                            echo '<li><a href="#' . $faq_str . '">' . $faq_str . ' </a> </li>';
                        }; ?>
                    </ul>
                </div>

                <div class="faq_container flex_column">
                    <?php
                    foreach ($faqsarr as $faqmain) { ?>

                        <div id="<?php echo $faqmain['faq_title']; ?>" class="column">
                            <h2><?php echo $faqmain['faq_title']; ?></h2>
                            <div class="accordion flex_column">
                                <?php
                                foreach ($faqmain['faq_questions'] as $faq) { ?>
                                    <div class="tab">
                                        <div class="tab_title">
                                            <h3><?php echo $faq['faq_question']; ?></h3>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="content">
                                            <p><?php echo $faq['faq_answer']; ?></p>
                                        </div>
                                    </div>
                                <?php };?>
                            </div>
                        </div>
                        <?php 
                    }; ?>
                </div>
            </div>
        </div>

    </section>

    <section class="global_findModal_contact_form_template">
        <div class="wrapper flex_row">
            <?php $faq_contact=get_field('faq_contact'); ?>
            <div class="column flex_column">
                <div class="inner_col_1 flex_column">
                    <h2><?php $faq_contact['title'] ? print_r($faq_contact['title']):' '?></h2>
                    <p><?php $faq_contact['subtitle'] ? print_r($faq_contact['subtitle']): ' '?></p>
                </div>

                <div class="inner_col_2 flex_column">
                    <?php echo do_shortcode('[contact-form-7 id="d68ae60" title="Contact Form"]'); ?>
                </div>

            </div> 
        </div>
    </section>

</main>
<?php get_footer(); ?>