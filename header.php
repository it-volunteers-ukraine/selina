<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>It-volunteers</title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="top-wrapper">
                <div class="social-media">
                    <?php
                    $socialLinks = get_field('social-media', 'option');
                    foreach ($socialLinks as $row) : ?>
                        <a href="<?= $row['social-link']; ?>" class="icon">
                            <img src="<?= $row['social-icon']; ?>" alt="image">
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="black-logo">
                    <img class="logo" src="<?php echo get_template_directory_uri() . '/src/images/logo_icon.svg'; ?>" alt="black-logo">
                </div>

                <div class="wrapper-buttons">
                    <div class="buttons">
                        <a class="button red_medium_button registration-btn"
                           href="
                <?php echo esc_attr(get_field('registration-link', 'option')); ?>">
                            <?php the_field('registration-text', 'option'); ?>
                        </a>
                        <a class="button login-btn"
                           href="<?php echo esc_attr(get_field('login-link', 'option')); ?>">
                            <?php the_field('login-text', 'option'); ?>
                        </a>
                    </div>
                    <button class="switch">
                        <span class="language">EN</span>
                        <svg class="flag" width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20C15.5333 20 20 15.5333 20 10H0C0 15.5333 4.46667 20 10 20Z"
                                  fill="#FFE62E"/>
                            <path d="M10 0C4.46667 0 0 4.46667 0 10H20C20 4.46667 15.5333 0 10 0Z"
                                  fill="#045C6F"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bottom-wrapper">
            <div class="container">
                <div class="nav">
                    <div class="logo">
                        <?php
                        if (has_custom_logo()) {
                            echo get_custom_logo();
                        }
                        ?>
                    </div>
                    <div class="burger">
                        <svg width="44" height="28" viewBox="0 0 44 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0 2.3125C0 1.76549 0.217298 1.24089 0.604092 0.854092C0.990886 0.467298 1.51549 0.25 2.0625 0.25H41.9375C42.4845 0.25 43.0091 0.467298 43.3959 0.854092C43.7827 1.24089 44 1.76549 44 2.3125C44 2.85951 43.7827 3.38411 43.3959 3.77091C43.0091 4.1577 42.4845 4.375 41.9375 4.375H2.0625C1.51549 4.375 0.990886 4.1577 0.604092 3.77091C0.217298 3.38411 0 2.85951 0 2.3125ZM0 14C0 13.453 0.217298 12.9284 0.604092 12.5416C0.990886 12.1548 1.51549 11.9375 2.0625 11.9375H41.9375C42.4845 11.9375 43.0091 12.1548 43.3959 12.5416C43.7827 12.9284 44 13.453 44 14C44 14.547 43.7827 15.0716 43.3959 15.4584C43.0091 15.8452 42.4845 16.0625 41.9375 16.0625H2.0625C1.51549 16.0625 0.990886 15.8452 0.604092 15.4584C0.217298 15.0716 0 14.547 0 14ZM2.0625 23.625C1.51549 23.625 0.990886 23.8423 0.604092 24.2291C0.217298 24.6159 0 25.1405 0 25.6875C0 26.2345 0.217298 26.7591 0.604092 27.1459C0.990886 27.5327 1.51549 27.75 2.0625 27.75H41.9375C42.4845 27.75 43.0091 27.5327 43.3959 27.1459C43.7827 26.7591 44 26.2345 44 25.6875C44 25.1405 43.7827 24.6159 43.3959 24.2291C43.0091 23.8423 42.4845 23.625 41.9375 23.625H2.0625Z"
                                  fill="white"/>
                        </svg>
                    </div>
                </div>
                <div class="wrapper-nav">
                    <nav class="nav">
                        <?php wp_nav_menu([
                            'theme_location' => 'header',
                            'container' => false,
                            'menu_class' => 'header__list',
                            'menu_id' => false,
                            'echo' => true,
                            'items_wrap' => '<ul id="%1$s" class="header__list %2$s">%3$s</ul>',
                        ])
                        ?>
                    </nav>
                    <div class="search">
                        <div class="search-wrapper">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.25 9.25L7.05173 7.05173M0.75 4.41379C0.75 2.39034 2.39034 0.75 4.41379 0.75C6.43726 0.75 8.07759 2.39034 8.07759 4.41379C8.07759 6.43726 6.43726 8.07759 4.41379 8.07759C2.39034 8.07759 0.75 6.43726 0.75 4.41379Z"
                                      stroke="#045C6F" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input aria-label="search" type="search" placeholder="Пошук">
                        </div>
                    </div>
                </div>
            </div>
    </header>
</div>