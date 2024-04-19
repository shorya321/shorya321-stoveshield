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
                    foreach ($top_bar as $data) :
                        echo '<div class="column">
                                <img src="' . $data['icon'] . '" width="20" height="20">
                                <span>' . $data['title'] . '</span>
                            </div>';
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <?php ?>

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
                        echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . $logo . '"></a>';
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
                            <img src="http://localhost/stoveshields/wp-content/uploads/2024/04/search-alt.svg" logo="search-alt" />
                        </a>

                        <a href="">
                            <img src="http://localhost/stoveshields/wp-content/uploads/2024/04/user.svg" alt="user">
                        </a>
                        
                        <?php is_active_sidebar('header_sidebar_1') ? dynamic_sidebar('header_sidebar_1') : '' ?>

                    </div>

                    <?php if ($button_text && $button_link) : ?>
                        <div class="inner_col_2">
                            <a class="global_btn" href="<?php echo  $button_link ?>">
                                <div class="btn_wrapper">
                                    <span><?php echo $button_text ?></span>
                                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.58398 11.5H17.4173M17.4173 11.5L11.9173 6M17.4173 11.5L11.9173 17" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
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
                <img src="http://localhost/stoveshields/wp-content/uploads/2024/04/searchmodalIcon.svg" alt="searchmodalIcon" style="max-width: fit-content;" />
            </div>
            <span class="close_icon" title="Close" style="cursor: pointer;">
                <img src="http://localhost/stoveshields/wp-content/uploads/2024/04/xmark.svg" alt="xmark" style="max-width:fit-content;">
            </span>
        </div>

        <div class=" mobile_header">
            <div class="logo">
                <?php
                if ($logo) :
                    echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . $logo . '" style="width: 100px; " ></a>';
                endif;
                ?>
            </div>
            <svg id="hamburger" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 18V16H21V18H3ZM3 13V11H21V13H3ZM3 8V6H21V8H3Z" fill="black" />
            </svg>

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
                <svg id="offcavas_modal_close" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 6L18 18M18 6L6 18" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

    </header>