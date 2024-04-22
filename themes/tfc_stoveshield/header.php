<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tfc_stoveshield
 */

?>
<!doctype html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="top_row_header">
            <div class="wrapper">
                <?php
                $top_bar = get_field('top_bar_section', 'option');
                if ($top_bar) :
                    foreach ($top_bar as $data) : ?>
                        <div class="column">
                            <?php if ($data['icon'] && $data['title']) :
                                echo '
                                 <img src="' . $data['icon'] . '" width="20" height="20" alt="' . tfc_getimage_filename($data['icon']) . '">
                                <span>' . $data['title'] . '</span>';
                            endif; ?>
                        </div>
                <?php endforeach;
                endif;
                ?>
            </div>
        </div>

        <div class="main_row_header">
            <div class="wrapper container_1760">
                <?php
                $header_section = get_field('header_section', 'option');
                $logo = ($header_section['logo']) ? $header_section['logo'] : '';
                $button_text = ($header_section['button_text']) ? $header_section['button_text'] : '';
                $button_link = ($header_section['button_link']) ? $header_section['button_link'] : '';
                ?>
                <div class="column">
                    <?php
                    if ($logo) :
                        echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . $logo . '" alt="' . tfc_getimage_filename($logo) . '"></a>';
                    endif;
                    ?>
                </div>

                <div class="column">
                    <?php
                    if (has_nav_menu('menu-1')) :
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'menu_class' => 'navlinks',
                            )
                        );
                    endif;
                    ?>
                </div>

                <div class="column">
                    <div class="inner_col_1">
                        <a class="serach_icon">
                            <img src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2024/04/search-alt.svg" logo="search-alt" />
                        </a>

                        <a href="<?php echo esc_url(home_url()) . '/my-account'; ?>">
                            <img src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2024/04/user.svg" alt="user">
                        </a>

                        <?php is_active_sidebar('header_sidebar_1') ? dynamic_sidebar('header_sidebar_1') : '' ?>

                    </div>

                    <?php if ($button_text && $button_link) : ?>
                        <div class="inner_col_2">
                            <a class="global_btn" href="<?php echo  $button_link ?>">
                                <div class="btn_wrapper">
                                    <span><?php echo $button_text ?></span>
                                    <img src="<?php echo esc_url(home_url()) . '/wp-content/uploads/2024/04/arrow-right.svg'; ?>" alt="" style="width: 22px; height: 23px; ">
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div id="search_modal">
            <div class="ajax_search">
                <input type="search" name="" id="" placeholder="Search for your stove model number">
                <img src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2024/04/searchmodalIcon.svg" alt="searchmodalIcon" style="max-width: fit-content;" />
            </div>
            <span class="close_icon" title="Close" style="cursor: pointer;">
                <img src="<?php echo esc_url(home_url()); ?>/wp-content/uploads/2024/04/xmark.svg" alt="xmark" style="max-width:fit-content;">
            </span>
        </div>

        <div class="mobile_header">
            <div class="logo">
                <?php
                if ($logo) :
                    echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . $logo . '" style="width: 100px;" alt="' . tfc_getimage_filename($logo) . '" ></a>';
                endif;
                ?>
            </div>
            <img id="hamburger" src="<?php echo esc_url(home_url()).'/wp-content/uploads/2024/04/hanburger.svg' ;?>" alt="hanburger" style="width: 24px; height: 24px;">

            <div class="mobile_offcanvas">
                <?php
                if (has_nav_menu('menu-1')) :
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class' => 'flex_column',
                        )
                    );
                endif;
                ?>
                <img id="offcavas_modal_close" src="<?php echo esc_url(home_url()).'/wp-content/uploads/2024/04/xmark.svg' ?>" alt="x-mark" style="width: 24px; height: 24px;">
            </div>
        </div>

    </header>