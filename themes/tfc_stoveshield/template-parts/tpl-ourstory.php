<?php
/* Template Name: Our Story Page */
get_header();
?>
<main>
    <!-- Section-1 ourstory intorduction -->
    <section class="ourstory_section1 intro">
        <div class="container_1760">
            <div class="wrapper flex_column">
                <div class="column">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>

                <?php
                // video section code
                $video = get_field('our_story_video_section');
                if ($video) :
                    $video_img = ($video['video']) ? $video['video'] : '';
                ?>
                    <div class="column">
                        <img src="<?php echo esc_url($video_img) ?>" alt="<?php echo tfc_getimage_filename($video_img); ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- Section-2 Ourstory ourvision -->
    <?php
    // echo '<pre>';
    $our_vision = get_field('our_vision');
    // print_r($our_vision);
    if ($our_vision) :
        $image = ($our_vision['image']) ? $our_vision['image'] : '';
        $title = ($our_vision['title']) ? $our_vision['title'] : '';
        $content = $our_vision['content'] ? $our_vision['content'] : '';

        $feature_title = ($our_vision['feature_title']) ? $our_vision['feature_title'] : '';
        $features = $our_vision['features'];
        $stove_button = $our_vision['stovebutton'];
    ?>
        <section class="ourstory_section2 ourvision">
            <div class="container_1760">
                <div class="wrapper flex_row">
                    <div class="column">
                        <?php if ($image) : ?>
                            <img src="<?php echo $image; ?>" alt="<?php echo tfc_getimage_filename($image); ?>">
                        <?php endif; ?>
                    </div>

                    <div class="column flex_column">

                        <?php if (!empty($title)) : ?>
                            <h2><?php echo $title ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($content)) : ?>
                            <p><?php echo $content; ?></p>
                        <?php endif; ?>


                        <div class="inner_column flex_column">
                            <?php if ($feature_title) : ?>
                                <span><?php echo $feature_title; ?></span>
                            <?php endif; ?>

                            <?php if ($features) : ?>
                                <ul class="flex_column">
                                    <?php foreach ($features as $data) : ?>
                                        <li>
                                            <?php if ($data['image']) : ?>
                                                <img src="<?php echo $data['image']; ?>" alt="<?php echo tfc_getimage_filename($data['image']);  ?>" style="width:25px; height:25px;" />
                                            <?php endif; ?>
                                            <?php if ($data['feature_description']) : ?>
                                                <span><?php echo $data['feature_description']; ?></span>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if ($stove_button['url'] && $stove_button['title']) : ?>

                                <a class="global_btn" href="<?php echo esc_url($stove_button['url']); ?>">
                                    <div class="btn_wrapper">
                                        <span><?php echo $stove_button['title']; ?></span>
                                        <img src="<?php echo get_site_url() . '/wp-content/uploads/2024/04/arrow-right.svg'; ?>" alt="arrow-right" style="width: 23px; height:23px;">
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Section-3 -->
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