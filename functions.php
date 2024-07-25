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

    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10.0.0/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script('wp-it-volunteers-scripts', get_template_directory_uri() . '/assets/scripts/main.js', array(), false, true);
    wp_enqueue_script('choices-scripts', 'https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js', array(), false, true);


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

    // Connected contacts-style & contacts-scripts
    if (is_page_template('templates/contacts.php')) {
        wp_enqueue_style('contacts-style', get_template_directory_uri() . '/assets/styles/template-styles/contacts.css', array('main'));
        wp_enqueue_script('contacts-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/contacts.js', array(), false, true);
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
    if (is_page_template('templates/single-breeders.php')) {
        wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('single-breeders-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-breeders.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_script('single-breeders-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), false, true);
        wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array('main'));
        wp_enqueue_style('single-breeders-style', get_template_directory_uri() . '/assets/styles/template-styles/single-breeders.css', array('main'));
     
    }

     if (is_page_template('templates/single-news.php')) {
         wp_enqueue_script('home-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
         wp_enqueue_script('single-news-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/single-news.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('single-news-style', get_template_directory_uri() . '/assets/styles/template-styles/single-news.css', array('main'));
     
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

    if (is_singular() && locate_template('template-parts/loader.php')) {
        wp_enqueue_style('loader-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/loader.css', array('main'));
    }

    if (is_singular() && locate_template('template-parts/contact-form.php')) {
        wp_enqueue_style('contact-form-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/contact-form.css', array('main'));
        wp_enqueue_script('contact-form-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/contact-form.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_page_template('templates/partners.php')) {
        wp_enqueue_style('partners-style', get_template_directory_uri() . '/assets/styles/template-styles/partners.css', array('main'));
        wp_enqueue_script('partners-jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', array(), false, false);
        wp_enqueue_script('partners-scripts', get_template_directory_uri() . '/assets/scripts/template-scripts/partners.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_singular() && locate_template('template-parts/feedbacks.php')) {
        wp_enqueue_script('touch-swipe-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js', array(), false, true);
        wp_enqueue_style('feedbacks-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/feedbacks.css', array('main'));
        wp_enqueue_script('feedbacks-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/feedbacks.js', array('touch-swipe-scripts'), false, true);
        wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/styles/vendors/swiper.css', array('main'));
        wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/assets/scripts/vendors/swiper-bundle.js', array(), false, true);
    }

    if (is_singular() && locate_template('template-parts/join-us.php')) {
        wp_enqueue_style('join-us-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/join-us.css', array('main'));
        wp_enqueue_script('join-us-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/join-us.js', array('touch-swipe-scripts'), false, true);
    }

    if (is_singular() && locate_template('template-parts/one-card-breeder.php')) {
        wp_enqueue_style('one-card-breeder-style', get_template_directory_uri() . '/assets/styles/template-parts-styles/one-card-breeder.css', array('main'));
        wp_enqueue_script('one-card-breeder-scripts', get_template_directory_uri() . '/assets/scripts/template-parts-scripts/one-card-breeder.js', array('touch-swipe-scripts'), false, true);
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
}

/** add fonts */
function add_google_fonts()
{
    wp_enqueue_style('google_web_fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap', [], null);
}

add_action('wp_enqueue_scripts', 'add_google_fonts');

/** add swiper */
function add_swiper()
{
    wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
    wp_enqueue_script('swiper-scripts', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
}

add_action('wp_enqueue_scripts', 'add_swiper');

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
    wp_register_script('custom-scripts', get_template_directory_uri() . '/src/scripts/template-parts-scripts/load-more-button.js', array('jquery'), '1.0', true);

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

    $number = get_posts_per_page($width);
    $total_posts = wp_count_posts()->publish;
    $total_pages = ceil($total_posts / $number);


    // change template-parts by custom postType
    if ($postType === 'friends_clubs') {
        $template = 'template-parts/friends-clubs-card';
    } else if ($postType === 'our_photographs') {
        $template = 'template-parts/photograph-card';
        $number /= 2;
    }

    $args = array(
        'post_type' => $postType,
        'posts_per_page' => $number,
        'order' => 'ASC',
        'paged' => $page,
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


