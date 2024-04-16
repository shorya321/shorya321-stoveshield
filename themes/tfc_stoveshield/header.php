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
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
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
                <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="25" cy="25" r="25" fill="#EFE33B" />
                    <path d="M29.6725 29.6412L34 34M32 24C32 28.4183 28.4183 32 24 32C19.5817 32 16 28.4183 16 24C16 19.5817 19.5817 16 24 16C28.4183 16 32 19.5817 32 24Z" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <span class="close_icon" title="Close" style="cursor: pointer;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 6L18 18M18 6L6 18" stroke="#131A29" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </div>

        <div class=" mobile_header">
            <div class="logo">
                <a href=""><img src="/assets/moblie_logo.svg" alt=""></a>
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