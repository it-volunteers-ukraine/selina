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
<?php get_template_part('template-parts/loader'); ?>
<div class="wrapper">
    <header class="header">
        <div id="header-top" class="header-top">
        <div class="container">
            <div class="top-row">
                <div class="social-media">
                    <?php
                    $socialLinks = get_field('social-media', 'option');
                    foreach ($socialLinks as $row) :
                        $icon = $row['social-icon'];
                        $link = $row['social-link'];
                        ?>
                        <a href="<?php echo esc_url($link); ?>" class="icon">
                            <img src="<?php echo esc_html($icon); ?>" alt="image">
                        </a>
                    <?php endforeach; ?>
                    <a href="mailto:<?php the_field('email', 'option') ?>" rel="noopener noreferrer">
                        <img src="<?php the_field('icon-email', 'option') ?>" alt="email">
                    </a>
                    <a href="tel:<?php the_field('phone', 'option') ?>" rel="noopener noreferrer" class="icon">
                        <img src="<?php the_field('icon-phone', 'option') ?>" alt="phone">
                    </a>
                </div>
                <div class="black-logo">
                    <?php
                    if (has_custom_logo()) {
                        echo get_custom_logo();
                    }
                    ?>
                </div>
                <div class="wrapper-buttons">
                    <div class="buttons">
                        <?php
                        $is_user_logged_in = is_user_logged_in();

                        if ( $is_user_logged_in ) {
                            $personal_account_link = esc_attr(get_field('personal-account-link', 'option'));
                            $personal_account_text = esc_html(get_field('personal-account-text', 'option'));

                            echo '<a class="button red_medium_button registration-btn account-btn" href="' . $personal_account_link . '">';
                            echo $personal_account_text;
                            echo '</a>';

                            echo '<a class="button login-btn" href="' .  wp_logout_url( home_url() ) . '">';
                            echo esc_html(get_field('exit-text', 'option'));
                            echo '</a>';


                        } else {
                            $registration_link = esc_attr(get_field('registration-link', 'option'));
                            $registration_text = esc_html(get_field('registration-text', 'option'));

                            echo '<a class="button red_medium_button registration-btn" href="' . $registration_link . '">';
                            echo $registration_text;
                            echo '</a>';

                            echo '<a class="button login-btn" href="' . esc_attr(get_field('login-link', 'option')) . '">';
                            echo esc_html(get_field('login-text', 'option'));
                            echo '</a>';
                        }
                        ?>
                    </div>

                    <?php
                    $current_language = (function_exists('pll_current_language')) ? pll_current_language('slug') : '';
                    if (function_exists('pll_the_languages')) {
                        $languages = pll_the_languages(array('show_names' => 1, 'show_flags' => 1, 'raw' => 1));
                    }

                    $langUrl = null;

                    foreach ($languages as $language) {
                        if ($language['slug'] != $current_language) {
                            $langUrl = esc_url($language['url']);
                        }
                    }

                    $inputSet = false;
                    ?>

                    <div class="switch">
                        <?php foreach ($languages as $lang => $language): ?>
                            <?php if (!$inputSet && $lang === $current_language): ?>
                                <input
                                        onchange="redirectToPage('<?= esc_url($langUrl); ?>')"
                                        id="language-toggle"
                                        class="check-toggle check-toggle-round-flat"
                                    <?= $lang === 'en' ? 'checked' : ''; ?>
                                        type="checkbox"
                                >
                                <?php $inputSet = true; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <label for="language-toggle"></label>

                        <?php foreach ($languages as $lang => $language): ?>
                            <span class="<?= $lang !== 'en' ? 'on' : 'off' ?> flag-<?= $language['slug']; ?>">
        </span>
                            <span class="lang-size <?= $lang !== 'en' ? 'on-lang' : 'off-lang' ?>">
            <?= $language['slug']; ?>
        </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="bottom-row">
                    <div class="white-logo">
                        <?php
                        if (has_custom_logo()) {
                            echo get_custom_logo();
                        }
                        ?>
                    </div>

                    <div id="header-menu-btn" class="menu-btn">
                        <div class="burger"></div>
                    </div>
                </div>
                <nav id="bottom-nav-container" class="nav-menu">
                    <?php wp_nav_menu([
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_class' => 'header__list',
                        'menu_id' => false,
                        'echo' => true,
                        'items_wrap' => '<ul id="%1$s" class="header__list %2$s">%3$s</ul>',
                    ])
                    ?>
                    <div class="search-desktop search">
                        <?php get_search_form() ?>
                    </div>


                    <div id="header-mobile" class="content-mobile">
                        <nav id="header-nav-menu">
                            <div class="search-mobile search">
                                <?php get_search_form() ?>
                            </div>
                            <?php wp_nav_menu([
                                'theme_location' => 'header',
                                'container' => false,
                                'menu_class' => 'header__list-mobile',
                                'menu_id' => false,
                                'echo' => true,
                                'items_wrap' => '<ul id="%1$s" class="header__list-mobile %2$s">%3$s</ul>',
                            ])
                            ?>
                                <div class="social-media">
                                    <?php
                                    $socialLinks = get_field('social-media', 'option');
                                    foreach ($socialLinks as $row) :
                                        $icon = $row['social-icon'];
                                        $link = $row['social-link'];
                                        ?>
                                        <a href="<?php echo esc_url($link); ?>" class="icon">
                                            <img src="<?php echo esc_html($icon); ?>" alt="image">
                                        </a>
                                    <?php endforeach; ?>
                                    <a href="mailto:<?php the_field('email', 'option') ?>" rel="noopener noreferrer">
                                        <img src="<?php the_field('icon-email', 'option') ?>" alt="email">
                                    </a>
                                </div>
                            <div class="phone">
                                <span><?php the_field('label-phone', 'option') ?></span>
                                <a href="tel:<?php the_field('phone', 'option') ?>" rel="noopener noreferrer"
                                   class="icon">
                                    <?php the_field('phone', 'option') ?>
                                </a>
                            </div>
                            <div class="buttons">
                                <?php
                                $is_user_logged_in = is_user_logged_in();

                                if ( $is_user_logged_in ) {
                                    $personal_account_link = esc_attr(get_field('personal-account-link', 'option'));
                                    $personal_account_text = esc_html(get_field('personal-account-text', 'option'));

                                    echo '<a class="button red_medium_button registration-btn account-btn" href="' . $personal_account_link . '">';
                                    echo $personal_account_text;
                                    echo '</a>';

                                    echo '<a class="button login-btn" href="' .  wp_logout_url( home_url() ) . '">';
                                    echo esc_html(get_field('exit-text', 'option'));
                                    echo '</a>';

                                } else {
                                    $registration_link = esc_attr(get_field('registration-link', 'option'));
                                    $registration_text = esc_html(get_field('registration-text', 'option'));

                                    echo '<a class="button red_medium_button registration-btn" href="' . $registration_link . '">';
                                    echo $registration_text;
                                    echo '</a>';

                                    echo '<a class="button login-btn" href="' . esc_attr(get_field('login-link', 'option')) . '">';
                                    echo esc_html(get_field('login-text', 'option'));
                                    echo '</a>';
                                }
                                ?>
                                <?php
                                $current_language = (function_exists('pll_current_language')) ? pll_current_language('slug') : '';
                                if (function_exists('pll_the_languages')) {
                                    $languages = pll_the_languages(array('show_names' => 1, 'show_flags' => 1, 'raw' => 1));
                                }

                                $langUrl = null;

                                foreach ($languages as $language) {
                                    if ($language['slug'] != $current_language) {
                                        $langUrl = esc_url($language['url']);
                                    }
                                }

                                $inputSet = false;
                                ?>

                                <div class="switch">
                                    <?php foreach ($languages as $lang => $language): ?>
                                        <?php if (!$inputSet && $lang === $current_language): ?>
                                            <input
                                                    onchange="redirectToPage('<?= esc_url($langUrl); ?>')"
                                                    id="language-toggle"
                                                    class="check-toggle check-toggle-round-flat"
                                                <?= $lang === 'en' ? 'checked' : ''; ?>
                                                    type="checkbox"
                                            >
                                            <?php $inputSet = true; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <label for="language-toggle"></label>

                                    <?php foreach ($languages as $lang => $language): ?>
                                        <span class="<?= $lang !== 'en' ? 'on' : 'off' ?> flag-<?= $language['slug']; ?>">
        </span>
                                        <span class="lang-size <?= $lang !== 'en' ? 'on-lang' : 'off-lang' ?>">
            <?= $language['slug']; ?>
        </span>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</div>