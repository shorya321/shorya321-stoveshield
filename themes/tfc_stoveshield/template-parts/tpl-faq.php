<?php
/* Template Name: FAQ's page */
get_header();
?>
<main>
    <?php
    $faqs = get_field('faqs');
    if ($faqs) :
    ?>
        <section class="section_1_faq" style="margin-top: 8.875rem;">
            <div class="container_1760">
                <h2>Frequently Asked Questions</h2>
                <div class="wrapper flex_row">
                    <div class="column">
                        <ul class="flex_column">
                            <?php
                            foreach ($faqs as $faq) :
                                $faq_title = $faq['faq_title'];
                                echo '<li><a href="#' . $faq_title . '">' . $faq_title . ' </a> </li>';
                            endforeach ?>
                        </ul>
                    </div>

                    <div class="faq_container flex_column">
                        <?php
                        foreach ($faqs as $faq) : ?>
                            <div id="<?php echo $faq['faq_title']; ?>" class="column">
                                <h2><?php echo $faq['faq_title']; ?></h2>
                                <div class="accordion flex_column">
                                    <?php
                                    foreach ($faq['faq_questions'] as $faq) : ?>
                                        <?php if ($faq['faq_question'] && $faq['faq_answer']) : ?>
                                            <div class="tab">
                                                <div class="tab_title">
                                                    <h3><?php echo $faq['faq_question']; ?></h3>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 12H20M12 4V20" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <div class="content">
                                                    <p><?php echo $faq['faq_answer']; ?></p>
                                                </div>
                                            </div>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                        <?php
                        endforeach; ?>
                    </div>
                </div>
            </div>

        </section>

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
                    <?php $faq_contact = get_field('faq_contact'); ?>
                    <div class="column flex_column">
                        <div class="inner_col_1 flex_column">
                            <h2><?php echo $contact_form_title; ?></h2>
                            <p><?php echo $contact_form_description; ?></p>
                        </div>
                        <div class="inner_col_2 flex_column">
                            <?php echo do_shortcode("$contact_form_shortcode"); ?>
                        </div>

                    </div>
                </div>
            </section>
    <?php
        endif;
    endif; ?>
</main>
<?php get_footer(); ?>