<?php
if (!function_exists('wp_it_volunteers_setup')) {
    function wp_it_volunteers_setup()
    {
        add_theme_support('custom-logo',
            array(
                'height' => 64,
                'width' => 64,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'wp_it_volunteers_setup');
}

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'wp_it_volunteers_scripts');

function wp_it_volunteers_scripts()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('wp-it-volunteers-style', get_template_directory_uri() . '/assets/styles/main.css', array('main'));
    wp_enqueue_style('swiper-style', "https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css", array('main'));
    wp_enqueue_style('choices-style', "https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css", array('main'));
    wp_enqueue_style('loader-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/loader.css', array('main'));
    wp_enqueue_style('lightbox-style', "https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css", array());

    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10.0.0/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('wp-it-volunteers-scripts', get_template_directory_uri() . '/assets/scripts/main.js', array(), false, true);
    wp_enqueue_script('choices-scripts', 'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js', array(), false, true);
    wp_enqueue_script('lightbox-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js', array(), false, true);


    if (is_page_template('templates/home.php')) {
        wp_enqueue_script('touch-swipe-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js', array(), false, true);
        wp_enqueue_script('home-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/home.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/vendors/swiper.css', array('main'));
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/scripts/vendors/swiper-bundle.js', array(), false, true);
        wp_enqueue_script('home-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), false, true);
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array('main'));
        wp_enqueue_style('home-style', get_template_directory_uri() . '/assets/styles/template-styles/home.css', array('main'));
    }

    if (is_page_template('templates/contacts.php')) {
        wp_enqueue_style('contacts-style', get_template_directory_uri() . '/assets/styles/template-styles/contacts.css', array('main'));
        wp_enqueue_script('contacts-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/contacts.js', array(), false, true);
    }

    if (is_page_template('templates/shows.php')) {
        wp_enqueue_style('shows-style', get_template_directory_uri() . '/assets/styles/template-styles/shows.css', array('main'));
        wp_enqueue_script('shows-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/shows.js', array(), false, true);
    }

    if (is_page_template('templates/events.php')) {
        wp_enqueue_style('events-style', get_template_directory_uri() . '/assets/styles/template-styles/events.css', array('main'));
        wp_enqueue_script('events-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/events.js', array(), false, true);
    }

    if (is_page_template('templates/user-cabinet.php')) {
        wp_enqueue_style('user-cabinet-style', get_template_directory_uri() . '/assets/styles/template-styles/user-cabinet.css', array('main'));
        wp_enqueue_script('user-cabinet-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/user-cabinet.js', array(), false, true);
    
        wp_localize_script('user-cabinet-scripts', 'ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('load_user_cabinet_content_nonce')
        ));
    }

    if (is_page_template('templates/about-us.php')) {
        wp_enqueue_style('about-us-style', get_template_directory_uri() . '/assets/styles/template-styles/about-us.css', array('main'));
        wp_enqueue_script('about-us-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/about-us.js', array(), false, true);
        wp_enqueue_script('touch-swipe-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js', array(), false, true);
        wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/vendors/swiper.css', array('main'));
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/scripts/vendors/swiper-bundle.js', array(), false, true);
    }
    if (is_page_template('templates/rules-wcf.php')) {
        wp_enqueue_style('rules-wcf-style', get_template_directory_uri() . '/assets/styles/template-styles/rules-wcf.css', array('main'));
        wp_enqueue_script('rules-wcf-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/rules-wcf.js', array(), false, true);
    }
    if (is_page_template('templates/club-membership.php')) {
        wp_enqueue_style('club-membership-style', get_template_directory_uri() . '/assets/styles/template-styles/club-membership.css', array('main'));
        wp_enqueue_script('club-membership-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/club-membership.js', array(), false, true);
    }
    if (is_page_template('templates/single-breeders.php')) {
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('single-breeders-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-breeders.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_script('single-breeders-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), false, true);
        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array('main'));
        wp_enqueue_style('single-breeders-style', get_template_directory_uri() . '/assets/styles/template-styles/single-breeders.css', array('main'));

    }

    if (is_page_template('templates/single-breed.php')) {
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('single-breed-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-breed.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_script('single-breed-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), false, true);
        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array('main'));
        wp_enqueue_style('single-breed-style', get_template_directory_uri() . '/assets/styles/template-styles/single-breed.css', array('main'));

    }


    if (is_page_template('templates/single-courses.php')) {
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('single-courses-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-courses.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('single-courses-style', get_template_directory_uri() . '/assets/styles/template-styles/single-courses.css', array('main'));
    }

    if (is_page_template('templates/single-news.php')) {
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('single-news-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-news.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('single-news-style', get_template_directory_uri() . '/assets/styles/template-styles/single-news.css', array('main'));

    }

    if (is_page_template('templates/single-tip.php')) {
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('single-tip-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-tip.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('single-tip-style', get_template_directory_uri() . '/assets/styles/template-styles/single-tip.css', array('main'));

    }


    if (is_page_template('templates/our-breeders.php')) {
        wp_enqueue_script('touch-swipe-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js', array(), false, true);
        wp_enqueue_script('our-breeders-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/our-breeders.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/vendors/swiper.css', array('main'));
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/scripts/vendors/swiper-bundle.js', array(), false, true);
        wp_enqueue_script('our-breeders-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), false, true);
        wp_enqueue_script('our-breeders-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array('main'));
        wp_enqueue_style('our-breeders-style', get_template_directory_uri() . '/assets/styles/template-styles/our-breeders.css', array('main'));
        wp_localize_script('our-breeders-scripts', 'myAjax', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('our-breeders_nonce'),
        ));
    }

    if (is_page_template('templates/breeds-cat.php')) {
        wp_enqueue_script('touch-swipe-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js', array(), false, true);
        wp_enqueue_script('breeds-cat-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/breeds-cat.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/vendors/swiper.css', array('main'));
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/scripts/vendors/swiper-bundle.js', array(), false, true);
        wp_enqueue_script('breeds-cat-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), false, true);
        wp_enqueue_script('breeds-cat-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array('main'));
        wp_enqueue_style('breeds-cat-style', get_template_directory_uri() . '/assets/styles/template-styles/breeds-cat.css', array('main'));
        wp_localize_script('breeds-cat-scripts', 'myAjax', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('breeds-cat_nonce'),
        ));
    }

    if (is_page_template('templates/partners.php')) {
        wp_enqueue_style('partners-style', get_template_directory_uri() . '/assets/styles/template-styles/partners.css', array('main'));
        wp_enqueue_script('partners-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('partners-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/partners.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_page_template('templates/education.php')) {
        wp_enqueue_style('education-style', get_template_directory_uri() . '/assets/styles/template-styles/education.css', array('main'));
    }

    if (is_page_template('templates/news-archive.php')) {
        wp_enqueue_style('news-archive-style', get_template_directory_uri() . '/assets/styles/template-styles/news-archive.css', array('main'));
        wp_enqueue_script('news-archive-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/news-archive.js', array(), false, true);

        // Retrieve active tags
        $active_tags = isset($_GET['filter_tag']) ? (array)$_GET['filter_tag'] : array();

        // Check for available posts
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => 6,
            'paged' => 1, 
        );
        if (!empty($active_tags)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'news_tag',
                    'field'    => 'slug',
                    'terms'    => $active_tags,
                ),
            );
        }
    
        $query = new WP_Query($args);

        // If there are no posts, pass this information to JavaScript
        $has_more_posts = $query->found_posts > 6; // Are there more than 6 posts?

        wp_localize_script('news-archive-scripts', 'myAjax', array(
            'ajaxUrl'       => admin_url('admin-ajax.php'),
            'nonce'         => wp_create_nonce('news-archive_nonce'),
            'activeTags'    => $active_tags, // Pass active tags
            'hasMorePosts'  => $has_more_posts, // Information about more posts
        ));

        wp_reset_postdata(); // Reset the query
    }
    
    if (is_page_template('templates/login.php')) {
        wp_enqueue_style('login-style', get_template_directory_uri() . '/assets/styles/template-styles/login.css', array('main'));
        wp_enqueue_script('login-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/login.js', array(), false, true);
    }
    
    if (is_page_template('templates/register.php')) {
        wp_enqueue_style('register-style', get_template_directory_uri() . '/assets/styles/template-styles/register.css', array('main'));
        wp_enqueue_script('register-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/register.js', array(), false, true);
    }

    if (is_singular() && locate_template('template-parts/breadcrumbs.php')) {
        wp_enqueue_style('breadcrumbs', get_template_directory_uri() . '/assets/styles/template-parts-styles/breadcrumbs.css', array('main'));
    }

    if (is_singular() && locate_template('template-parts/contact-form.php')) {
        wp_enqueue_style('contact-form-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/contact-form.css', array('main'));
        wp_enqueue_script('contact-form-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/contact-form.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_singular()) {
        if (locate_template('template-parts/feedbacks.php') || locate_template('template-parts/feedbacks-breed.php')) {
            wp_enqueue_script('touch-swipe-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js', array(), false, true);
            wp_enqueue_style('feedbacks-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/feedbacks.css', array('main'));
            wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/vendors/swiper.css', array('main'));
            wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/scripts/vendors/swiper-bundle.js', array(), false, true);

            if (locate_template('template-parts/feedbacks.php')) {
                wp_enqueue_script('feedbacks-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/feedbacks.js', array('touch-swipe-scripts'), false, true);
            }

            if (locate_template('template-parts/feedbacks-breed.php')) {
                wp_enqueue_script('feedbacks-breed-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/feedbacks-breed.js', array('touch-swipe-scripts'), false, true);
            }
        }
    }


    if (is_singular() && locate_template('template-parts/join-us.php')) {
        wp_enqueue_style('join-us-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/join-us.css', array('main'));
        wp_enqueue_script('join-us-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/join-us.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_singular() && locate_template('template-parts/one-card-breeder.php')) {
        wp_enqueue_style('one-card-breeder-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-card-breeder.css', array('main'));
        wp_enqueue_script('one-card-breeder-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/one-card-breeder.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_singular() && locate_template('template-parts/one-card-breed.php')) {
        wp_enqueue_style('one-card-breed-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-card-breed.css', array('main'));
        wp_enqueue_script('one-card-breed-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/one-card-breed.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_singular() && locate_template('template-parts/friends-clubs-card.php')) {
        wp_enqueue_style('friends-clubs-card-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/friends-clubs-card.css', array('main'));
    }

    if (is_singular() && locate_template('template-parts/photograph-card.php')) {
        wp_enqueue_style('photograph-card-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/photograph-card.css', array('main'));
    }

    if (is_singular() && locate_template('template-parts/our-partner-card.php')) {
        wp_enqueue_style('our-partner-card-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/our-partner-card.css', array('main'));
    }

    if (is_singular() && locate_template('template-parts/education-card.php')) {
        wp_enqueue_style('education-card-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/education-card.css', array('main'));
    }


    if (is_singular() && locate_template('template-parts/one-card-news.php')) {
        wp_enqueue_style('one-card-news-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-card-news.css', array('main'));
    }

    if (is_singular() && locate_template('template-parts/one-card-event.php')) {
        wp_enqueue_style('one-card-event-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-card-event.css', array('main'));
    }

}

/** add fonts */
function add_google_fonts()
{
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap', [], null);
}

add_action('wp_enqueue_scripts', 'add_google_fonts');

/** add swiper */
function add_swiper()
{
    wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
}

add_action('wp_enqueue_scripts', 'add_swiper');

/** add Masonry */
function mason_script()
{
    wp_enqueue_script('jquery-masonry');
}

add_action('wp_enqueue_scripts', 'mason_script');

/** Register menus */
function wp_it_volunteers_menus()
{
    $locations = array(
        'header' => __('Header Menu', 'wp-it-volunteers'),
        'footer' => __('Footer Menu', 'wp-it-volunteers'),
    );

    register_nav_menus($locations);
}

add_action('init', 'wp_it_volunteers_menus');


function polylang_translate()
{
    if (function_exists('pll_register_string')) {
        pll_register_string('відправити', 'відправити', 'General');
    }
}

add_action('init', 'polylang_translate');


/** ACF add options page */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}

function loadDirectory()
{ ?>
    <script type="text/javascript">
        var theme_directory = "<?php echo get_template_directory_uri() ?>";
    </script>
<?php }

add_action('wp_head', 'loadDirectory');


// Add svg to menuuu
function find_replace_my_fancy_svg($items, $args)
{
    $items = str_replace(
        '%SVG%',
        '<svg width="13" height="12" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M3.748 6.49l2.164 2.255A.83.83 0 006.5 9a.803.803 0 00.59-.255L9.253 6.49C9.781 5.941 9.404 5 8.661 5H4.333c-.744 0-1.112.94-.585 1.49z"/></svg>',
        $items
    );

    return $items;
}

add_filter('wp_nav_menu_items', 'find_replace_my_fancy_svg', 10, 2);


function init_load_more_posts()
{

    wp_enqueue_script('jquery');
    wp_register_script('custom-scripts', get_template_directory_uri() . '/src/scripts/template-scripts/partners.js', array('jquery'), '1.0', true);

    /* Localize the script with the ajaxurl */
    wp_localize_script('custom-scripts', 'my_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('my_nonce')
    ));

    wp_enqueue_script('custom-scripts');
}

add_action('wp_enqueue_scripts', 'init_load_more_posts');


function load_more_posts()
{
    $page = $_POST['page'];
    $width = $_POST['width'];
    $postType = (isset($_POST['postType'])) ? $_POST['postType'] : '';
    $taxonomy = (isset($_POST['taxonomy'])) ? $_POST['taxonomy'] : '';
    $terms = isset($_POST['terms']) ? $_POST['terms'] : '';

    $taxQuery =  array(
        array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $terms
        )
    );

    $number = get_posts_per_page($width);


    // change template-parts by terms or postType
    if ($terms === 'friends-clubs') {
        $template = 'template-parts/friends-clubs-card';
    } else if ($terms === 'our-photographers') {
        $template = 'template-parts/photograph-card';
        $number /= 2;
    } else if ($terms === 'vebinars') {
        $template = 'template-parts/education-card';
        $number /= 3;
    } else if ($terms === 'literature') {
        $template = 'template-parts/education-card';
        $number /= 3;
    } else if ($terms === 'zoopsychology') {
        $template = 'template-parts/education-card';
        $number /= 3;
    } else if ($postType === 'courses') {
        $template = 'template-parts/education-card';
        $number /= 4;
    }

    $args = array(
        'post_type' => $postType,
        'posts_per_page' => $number,
        'order' => 'ASC',
        'paged' => $page,
        'tax_query' => $taxQuery
    );

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part($template) ?>
        <?php endwhile;
    endif;
    $html = ob_get_clean();
    wp_reset_postdata();

    $total_pages = $query->max_num_pages;

    wp_send_json(array('html' => $html, 'totalPages' => $total_pages));
    wp_die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');


function get_posts_per_page($width)
{
    if ($width > 1349.98) {
        return 8;
    } else if ($width < 767.98 || $width >= 992) {
        return 8;
    } else {
        return 9;
    }
}


/*** AJAX breeders */
add_action('wp_ajax_load_breeders', 'load_breeders');
add_action('wp_ajax_nopriv_load_breeders', 'load_breeders');

function load_breeders()
{
    // Перевірка nonce
    if (!isset($_POST["nonce"]) || !wp_verify_nonce($_POST["nonce"], "our-breeders_nonce")) {
        exit;
    }

    // Отримання параметрів з AJAX-запиту
    $page = $_POST['page'];
    $width = $_POST['width'];
    $order = $_POST['order'];
    $orderby = $_POST['orderby'];


    // Визначення кількості постів на сторінку залежно від ширини
    $number = get_breeders_per_page($width);

    // Побудова запиту для отримання постів
    $args = array(
        'post_type' => 'breeders',
        'posts_per_page' => $number,
        'order' => $order,
        'orderby' => $orderby,
        'paged' => $page,
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post(); ?>
            <?php get_template_part('template-parts/one-card-breeder'); ?>
        <?php endwhile;
    endif;

    $html = ob_get_clean();

    $total_pages = $query->max_num_pages;

    wp_reset_postdata();

    // Відправка відповіді JSON з HTML та кількістю сторінок
    wp_send_json(array('html' => $html, 'totalPages' => $total_pages));
    wp_die();
}

/*** AJAX breeders */
add_action('wp_ajax_load_breeds', 'load_breeds');
add_action('wp_ajax_nopriv_load_breeds', 'load_breeds');

function load_breeds()
{
    // Перевірка nonce
    if (!isset($_POST["nonce"]) || !wp_verify_nonce($_POST["nonce"], "breeds-cat_nonce")) {
        exit;
    }

    // Отримання параметрів з AJAX-запиту
    $page = $_POST['page'];
    $width = $_POST['width'];
    $order = $_POST['order'];
    $orderby = $_POST['orderby'];


    // Визначення кількості постів на сторінку залежно від ширини
    $number = get_breeds_per_page($width);

    // Побудова запиту для отримання постів
    $args = array(
        'post_type' => 'breed',
        'posts_per_page' => $number,
        'order' => $order,
        'orderby' => $orderby,
        'paged' => $page,
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post(); ?>
            <?php get_template_part('template-parts/one-card-breed'); ?>
        <?php endwhile;
    endif;

    $html = ob_get_clean();

    $total_pages = $query->max_num_pages;

    wp_reset_postdata();

    // Відправка відповіді JSON з HTML та кількістю сторінок
    wp_send_json(array('html' => $html, 'totalPages' => $total_pages));
    wp_die();
}


function load_partners_pagination()
{

    $page = $_POST['page'];
    $width = $_POST['width'];
    $postType = (isset($_POST['postType'])) ? $_POST['postType'] : '';

    $number = get_partners_per_page($width);
    $total_posts = wp_count_posts()->publish;
    $total_pages = ceil($total_posts / $number);


    $args = array(
        'post_type' => $postType,
        'posts_per_page' => $number,
        'order' => 'ASC',
        'paged' => $page,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'partners_categories',
                'field' => 'slug',
                'terms' => 'our-partners'
            )
        )
    );


    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('template-parts/our-partner-card') ?>
        <?php endwhile;
    endif;
    $html = ob_get_clean();
    wp_reset_postdata();

    wp_send_json(array('html' => $html, 'totalPages' => $total_pages, 'postsPerPage' => $number));
    wp_die();
}

add_action('wp_ajax_load_partners_pagination', 'load_partners_pagination');
add_action('wp_ajax_nopriv_load_partners_pagination', 'load_partners_pagination');


function get_partners_per_page($width)
{
    if ($width > 767.98) {
        return 12;
    } else {
        return 6;
    }
}


function get_breeders_per_page($width)
{
    if ($width > 767.98) {
        return 12;
    } else {
        return 6;
    }
}

function get_breeds_per_page($width)
{
    if ($width > 767.98) {
        return 12;
    } else {
        return 6;
    }
}

// load more posts in news-archive
function load_news_archive() {
    
    check_ajax_referer('news-archive_nonce', 'nonce');

    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $active_tags = isset($_POST['filter_tags']) ? (array)$_POST['filter_tags'] : array();

    $args = array(
        'post_type' => array('news'),
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged,
        'meta_query' => array(
            array (
                'key' => 'news_date_meta',
                'value' => current_time('Ymd'),
                'compare' => '<',
                'type' => 'NUMERIC'
            )
        )
    );

    if (!empty($active_tags)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'news_tag',
                'field'    => 'slug',
                'terms'    => $active_tags,
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) { 
        while ($query->have_posts()) {
            $query->the_post();

            ?>
            <div class="one-card-news">
                <?php  get_template_part('template-parts/one-card-news'); ?>
                <div class="news-tags-container">
                    <?php
                    $tags = get_the_terms(get_the_ID(), 'news_tag');
                    if ($tags && !is_wp_error($tags)) {
                        foreach ($tags as $tag) {
                            $term_color = get_field('tag_color', 'news_tag_' . $tag->term_id);
                            $term_color_style = $term_color ? 'style="background-color:' . esc_attr($term_color) . ';"' : '';
                            echo '<span class="news-tag" ' . $term_color_style . '>' . esc_html($tag->name) . '</span>';
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo 'no_more_posts';
    }
    wp_die();
}

add_action('wp_ajax_load_news_archive', 'load_news_archive');
add_action('wp_ajax_nopriv_load_news_archive', 'load_news_archive');


// Відключаємо адмін панель для всіх, крім адміністраторів

if (!current_user_can('administrator')):
  show_admin_bar(false);
endif;


// User cabinet
add_action( 'wp_ajax_' . 'load_user_cabinet_content', 'load_user_cabinet_content' );

function load_user_cabinet_content() {
    check_ajax_referer('load_user_cabinet_content_nonce', 'nonce');
    $content_tab = isset($_POST['contentTab']) ? sanitize_text_field($_POST['contentTab']) : '';
    $response = '';

    $page = get_posts(array(
        'post_type'  => 'page',
        'meta_key'   => '_wp_page_template',
        'meta_value' => 'templates/user-cabinet.php'
    ));
    
    if (!empty($page)) {
        $page_id = $page[0]->ID;
    } else {
        $page_id = 0;
    }

    $field_name = 'user-cabinet_' . $content_tab;
    $button_card_text = get_field('user-cabinet_card-title', $page_id) ?: 'Відкрити/Open';

    if ($content_tab === 'form') {
        if (have_rows($field_name, $page_id)) {
            while (have_rows($field_name, $page_id)) {
                the_row();
                $content_title = get_sub_field($field_name . '-title');
                $content_link = get_sub_field($field_name . '-link');
                
                $response .= '<div class="content-user-cabinet__form-item">
                                <svg class="content-user-cabinet__clip-svg" width="38" height="90">
                                    <use href="' . get_bloginfo('template_url') . '/assets/images/sprite.svg#icon-clip"></use>
                                </svg>
                            ';
                $response .= '<h3 class="content-user-cabinet__form-title">' . esc_html($content_title) . '</h3>';
                $response .= '<a href="' . esc_url($content_link) . '" target="_blank" class="content-user-cabinet__link red_medium_button">
                                ' . esc_html($button_card_text) . '
                                <svg width="16" height="14"> 
                                    <use href="' . get_bloginfo('template_url') . '/assets/images/sprite.svg#icon-google"></use> 
                                </svg>
                            </a>';
                $response .= '</div>';
            }
        } else {
            $response .= '<p>No form items available.</p>';
        }
    } else {
        if (have_rows($field_name, $page_id)) {
            while (have_rows($field_name, $page_id)) {
                the_row();
                $content_image = get_sub_field($field_name . '-image');
                $content_title = get_sub_field($field_name . '-title');
                $content_link = get_sub_field($field_name . '-link');
                
                $response .= '<div class="content-user-cabinet__content-item">';
                $response .= '<div class="content-user-cabinet__image-heading-container">';
                $response .= '<div class="content-user-cabinet__content-image">';
                $response .= '<img src="' . esc_url($content_image) . '" alt="' . esc_attr($content_title) . '"/>';
                $response .= '</div>';
                $response .= '<h3 class="content-user-cabinet__title">' . esc_html($content_title) . '</h3>';
                $response .= '</div>';
                $response .= '<a href="' . esc_url($content_link) . '" target="_blank" class="content-user-cabinet__link red_medium_button">
                                ' . esc_html($button_card_text) . '
                                <svg width="16" height="14"> 
                                    <use href="' . get_bloginfo('template_url') . '/assets/images/sprite.svg#icon-google"></use> 
                                </svg>
                            </a>';
                $response .= '</div>';
            }
        } else {
            $response .= '<p>No content items available.</p>';
        }
    }
    
    wp_send_json_success($response);
}

function custom_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/src/images/logo_icon.svg');
            width: 120px;
            height: 60px;
            background-size: contain;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'custom_login_url');

function custom_login_title() {
    return 'Visit Selina homepage';
}
add_filter('login_headertext', 'custom_login_title');


add_filter( 'wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3 );

function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $key ) {
    $key = get_password_reset_key( $user );
    $message = sprintf(__('Доброго дня, %s!'), $user->user_login ) . "\r\n\r\n";

    $message .= 'Вітаємо з реєстрацією на сайті Селіна!' . "\r\n\r\n";
    $message .= 'Будь ласка, встановіть власний пароль для Вашого облікового запису:' . "\r\n\r\n";
    $message .= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . "\r\n\r\n";
    $message .= "Якщо сталася помилка, просто проігноруйте цей лист." . "\r\n\r\n";
    $message .= "З повагою," . "\r\n";
    $message .= "команда Селіна" . "\r\n";
    $wp_new_user_notification_email['message'] = $message;

    return $wp_new_user_notification_email;
}

add_filter( 'retrieve_password_message', 'wpdocs_retrieve_password_message', 20, 3 );
function wpdocs_retrieve_password_message( $wp_retrieve_password_notification_email, $user, $key ) {
	$key = get_password_reset_key( $user );
    $message = sprintf(__('Доброго дня, %s!'), $user->user_login ) . "\r\n\r\n";

    $message .= 'Ми отримали запит на скидання пароля для Вашого облікового запису на сайті Селіна.' . "\r\n\r\n";
    $message .= 'Будь ласка, перейдіть за посиланням, щоб створити новий пароль:' . "\r\n\r\n";
    $message .= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . "\r\n\r\n";
    $message .= "Якщо сталася помилка, просто проігноруйте цей лист." . "\r\n\r\n";
    $message .= "З повагою," . "\r\n";
    $message .= "команда Селіна" . "\r\n";
    $wp_retrieve_password_notification_email['message'] = $message;

	return $wp_retrieve_password_notification_email;
}

add_filter( 'retrieve_password_message', 'wpdocs_retrieve_password_message', 20, 3 );
function wpdocs_retrieve_password_message( $message, $key, $user_login ) {
	$site_name  = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
	$reset_link = network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' );

	// Create new message
    $message = __( 'Доброго дня, ' . $user_login, 'text_domain' ) . "\r\n\r\n";
	$message = __( 'Ми отримали запит на скидання паролю для Вашого облікового запису на сайті Селіна.', 'text_domain' ) . "\r\n\r\n";
	$message .= __( 'Будь ласка, перейдіть за посиланням, щоб створити новий пароль:', 'text_domain' ) . "\r\n\r\n";
	$message .= $reset_link . "\r\n\r\n";
    $message .= __( 'Якщо сталася помилка, просто проігноруйте цей лист.', 'text_domain' ) . "\r\n\r\n";
    $message .= "З повагою," . "\r\n";
    $message .= "команда Селіна" . "\r\n";

	return $message;
}
