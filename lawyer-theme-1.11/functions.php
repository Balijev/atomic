<?php
// Theme setup and support features
function lehoia_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'script', 'style'));
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu', 'lehoia'),
        )
    );
}
add_action('after_setup_theme', 'lehoia_theme_setup');

// Enqueue theme styles and scripts
function lehoia_enqueue_scripts()
{
    wp_enqueue_style('lehoia-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('lehoia-main', get_template_directory_uri() . '/js/main.js', array(), filemtime(get_template_directory() . '/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'lehoia_enqueue_scripts');

// Register widget areas
function lehoia_widgets_init()
{
    register_sidebar(
        array(
            'name'          => __('Primary Sidebar', 'lehoia'),
            'id'            => 'sidebar-1',
            'description'   => __('Main sidebar that appears on pages and archives.', 'lehoia'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Widgets', 'lehoia'),
            'id'            => 'footer-1',
            'description'   => __('Widgets displayed in the footer.', 'lehoia'),
            'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'lehoia_widgets_init');

function lehoia_customize_register($wp_customize)
{
    $wp_customize->add_section('lehoia_hero_section', array(
        'title'       => __('Hero Section', 'lehoia'),
        'priority'    => 30,
        'description' => __('Edit the homepage hero text, buttons, and image.', 'lehoia'),
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Ahmed Tomić',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'    => __('Hero subtitle', 'lehoia'),
        'section'  => 'lehoia_hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_title_primary', array(
        'default'           => 'Broj #1 Advokat u',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_primary', array(
        'label'   => __('Hero primary title', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_title_secondary', array(
        'default'           => 'Tuzli, TK',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_secondary', array(
        'label'   => __('Hero secondary title', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Tražite vrhunsku pravnu pomoć? Advokat Ahmed Tomić nudi beskompromisnu posvećenost i dokazanu stručnost. Njegova praksa je utemeljena na povjerenju i rezultat[...]',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_description', array(
        'label'   => __('Hero description', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_primary_text', array(
        'default'           => 'STUPITE U KONTAKT',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_primary_text', array(
        'label'   => __('Primary button text', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_button_primary_url', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_button_primary_url', array(
        'label'   => __('Primary button URL', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('hero_button_secondary_text', array(
        'default'           => 'PODRUČJA PRAKSE',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_button_secondary_text', array(
        'label'   => __('Secondary button text', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_button_secondary_url', array(
        'default'           => get_post_type_archive_link('practice_areas'),
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_button_secondary_url', array(
        'label'   => __('Secondary button URL', 'lehoia'),
        'section' => 'lehoia_hero_section',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('hero_image', array(
        'default'           => get_template_directory_uri() . '/assets/lawyer-hero.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'    => __('Hero image', 'lehoia'),
        'section'  => 'lehoia_hero_section',
        'settings' => 'hero_image',
    )));

    $wp_customize->add_section('lehoia_seo_section', array(
        'title'       => __('SEO', 'lehoia'),
        'priority'    => 40,
        'description' => __('Set meta descriptions and schema details for the site.', 'lehoia'),
    ));

    $wp_customize->add_setting('site_meta_description', array(
        'default'           => get_bloginfo('description'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('site_meta_description', array(
        'label'   => __('Site meta description', 'lehoia'),
        'section' => 'lehoia_seo_section',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('schema_phone', array(
        'default'           => '064/4115301',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('schema_phone', array(
        'label'   => __('Schema phone', 'lehoia'),
        'section' => 'lehoia_seo_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('schema_address', array(
        'default'           => 'Maršala Tita 145, Tuzla Grad 75000',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('schema_address', array(
        'label'   => __('Schema address', 'lehoia'),
        'section' => 'lehoia_seo_section',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('schema_opening_hours', array(
        'default'           => 'Mo-Fr 09:00-16:00',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('schema_opening_hours', array(
        'label'   => __('Schema opening hours', 'lehoia'),
        'section' => 'lehoia_seo_section',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'lehoia_customize_register');

function lehoia_meta_description()
{
    if (is_singular()) {
        $description = get_the_excerpt() ?: get_theme_mod('site_meta_description', get_bloginfo('description'));
    } elseif (is_front_page() || is_home()) {
        $description = get_theme_mod('site_meta_description', get_bloginfo('description'));
    } elseif (is_category() || is_tag() || is_author()) {
        $description = strip_tags(term_description());
    } else {
        $description = get_theme_mod('site_meta_description', get_bloginfo('description'));
    }

    if ($description) {
        echo '<meta name="description" content="' . esc_attr(wp_trim_words($description, 30, '...')) . '">' . "\n";
    }
}
add_action('wp_head', 'lehoia_meta_description', 1);

function lehoia_schema_markup()
{
    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'LegalService',
        'name'        => get_bloginfo('name'),
        'url'         => home_url('/'),
        'description' => get_theme_mod('site_meta_description', get_bloginfo('description')),
        'telephone'   => get_theme_mod('schema_phone', '064/4115301'),
        'address'     => array(
            '@type'         => 'PostalAddress',
            'streetAddress' => get_theme_mod('schema_address', 'Maršala Tita 145, Tuzla Grad 75000'),
        ),
        'openingHours' => array(get_theme_mod('schema_opening_hours', 'Mo-Fr 09:00-16:00')),
        'logo'         => wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full'),
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
}
add_action('wp_head', 'lehoia_schema_markup', 2);

// Register custom post types for Practice Areas and Testimonials
function lehoia_register_custom_post_types()
{
    // Practice Areas
    $labels_practice = array(
        'name'               => _x('Practice Areas', 'post type general name', 'lehoia'),
        'singular_name'      => _x('Practice Area', 'post type singular name', 'lehoia'),
        'menu_name'          => _x('Practice Areas', 'admin menu', 'lehoia'),
        'name_admin_bar'     => _x('Practice Area', 'add new on admin bar', 'lehoia'),
        'add_new'            => _x('Add New', 'practice area', 'lehoia'),
        'add_new_item'       => __('Add New Practice Area', 'lehoia'),
        'new_item'           => __('New Practice Area', 'lehoia'),
        'edit_item'          => __('Edit Practice Area', 'lehoia'),
        'view_item'          => __('View Practice Area', 'lehoia'),
        'all_items'          => __('All Practice Areas', 'lehoia'),
        'search_items'       => __('Search Practice Areas', 'lehoia'),
        'parent_item_colon'  => __('Parent Practice Areas:', 'lehoia'),
        'not_found'          => __('No practice areas found.', 'lehoia'),
        'not_found_in_trash' => __('No practice areas found in Trash.', 'lehoia')
    );

    $args_practice = array(
        'labels'             => $labels_practice,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'practice-areas'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail')
    );

    register_post_type('practice_areas', $args_practice);

    // Testimonials
    $labels_testimonials = array(
        'name'               => _x('Testimonials', 'post type general name', 'lehoia'),
        'singular_name'      => _x('Testimonial', 'post type singular name', 'lehoia'),
        'menu_name'          => _x('Testimonials', 'admin menu', 'lehoia'),
        'name_admin_bar'     => _x('Testimonial', 'add new on admin bar', 'lehoia'),
        'add_new'            => _x('Add New', 'testimonial', 'lehoia'),
        'add_new_item'       => __('Add New Testimonial', 'lehoia'),
        'new_item'           => __('New Testimonial', 'lehoia'),
        'edit_item'          => __('Edit Testimonial', 'lehoia'),
        'view_item'          => __('View Testimonial', 'lehoia'),
        'all_items'          => __('All Testimonials', 'lehoia'),
        'search_items'       => __('Search Testimonials', 'lehoia'),
        'parent_item_colon'  => __('Parent Testimonials:', 'lehoia'),
        'not_found'          => __('No testimonials found.', 'lehoia'),
        'not_found_in_trash' => __('No testimonials found in Trash.', 'lehoia')
    );

    $args_testimonials = array(
        'labels'             => $labels_testimonials,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-testimonial',
        'supports'           => array('title', 'editor', 'thumbnail')
    );

    register_post_type('testimonials', $args_testimonials);
}
add_action('init', 'lehoia_register_custom_post_types');

function lehoia_get_page_by_slug($slug)
{
    $pages = get_posts(
        array(
            'name'        => $slug,
            'post_type'   => 'page',
            'post_status' => array('publish', 'draft', 'pending', 'private'),
            'numberposts' => 1,
        )
    );

    return !empty($pages) ? $pages[0] : null;
}

// Ensure pages are created if missing
function lehoia_ensure_pages_exist()
{
    $pages = array(
        'Home' => '',
        'About' => '',
        'Practice Areas' => '',
        'Case Results' => '',
        'Testimonials' => '',
        'Free Consultation' => '',
        'Contact' => '',
    );

    foreach ($pages as $title => $content) {
        $slug = sanitize_title($title);

        if (null == lehoia_get_page_by_slug($slug)) {
            wp_insert_post(
                array(
                    'post_title'     => $title,
                    'post_name'      => $slug,
                    'post_content'   => $content,
                    'post_status'    => 'publish',
                    'post_type'      => 'page',
                    'post_author'    => 1,
                )
            );
        }
    }
}
add_action('init', 'lehoia_ensure_pages_exist');

// Ensure menu is created if missing
function lehoia_ensure_menu_exists()
{
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        $pages = array(
            'Home',
            'About',
            'Practice Areas',
            'Contact',
        );

        foreach ($pages as $page_title) {
            $slug = sanitize_title($page_title);
            $page = lehoia_get_page_by_slug($slug);
            if ($page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $page_title,
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ));
            }
        }

        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('init', 'lehoia_ensure_menu_exists');

function lehoia_prune_primary_menu_items()
{
    $menu_name = 'Primary Menu';
    $menu = wp_get_nav_menu_object($menu_name);
    if (! $menu) {
        return;
    }

    $menu_items = wp_get_nav_menu_items($menu->term_id);
    if (! $menu_items) {
        return;
    }

    $remove_titles = array('Case Results', 'Testimonials', 'Free Consultation', 'Contact');
    $contact_seen = false;

    foreach ($menu_items as $item) {
        if (in_array($item->title, $remove_titles, true)) {
            wp_delete_post($item->ID, true);
            continue;
        }

        if ('Contact' === $item->title) {
            if ($contact_seen) {
                wp_delete_post($item->ID, true);
            } else {
                $contact_seen = true;
            }
        }
    }
}
add_action('init', 'lehoia_prune_primary_menu_items');

// Create pages programmatically on theme activation
function lehoia_create_pages()
{
    $pages = array(
        'Home' => '',
        'About' => '',
        'Practice Areas' => '',
        'Case Results' => '',
        'Testimonials' => '',
        'Free Consultation' => '',
        'Contact' => '',
    );

    foreach ($pages as $title => $content) {
        $slug = sanitize_title($title);

        if (null == lehoia_get_page_by_slug($slug)) {
            wp_insert_post(
                array(
                    'post_title'     => $title,
                    'post_name'      => $slug,
                    'post_content'   => $content,
                    'post_status'    => 'publish',
                    'post_type'      => 'page',
                    'post_author'    => 1,
                )
            );
        }
    }
}
// register_activation_hook(__FILE__, 'lehoia_create_pages'); // not reliable in themes
// Ensure pages are created when switching theme
add_action('after_switch_theme', 'lehoia_create_pages');

// Add menu items programmatically on theme activation
function lehoia_create_menu()
{
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        $pages = array(
            'Home',
            'About',
            'Practice Areas',
            'Contact',
        );

        foreach ($pages as $page_title) {
            $slug = sanitize_title($page_title);
            $page = lehoia_get_page_by_slug($slug);
            if ($page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $page_title,
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                ));
            }
        }

        // Assign menu to theme location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'lehoia_create_menu');

// Contact Form Shortcode (now posts to admin-post.php)
function lehoia_contact_form_shortcode()
{
    ob_start();

    // Notices based on redirect
    $notice = '';
    if ( isset( $_GET['contact_status'] ) ) {
        $status = sanitize_text_field( $_GET['contact_status'] );
        if ( 'success' === $status ) {
            $notice = '<div class="alert alert-success">' . esc_html__( 'Hvala vam što ste nas kontaktirali. Uskoro ćemo vam se javiti.', 'lehoia' ) . '</div>';
        } elseif ( 'error' === $status ) {
            $notice = '<div class="alert alert-error">' . esc_html__( 'Došlo je do greške prilikom slanja vaše poruke. Molimo pokušajte ponovo kasnije.', 'lehoia' ) . '</div>';
        } elseif ( 'nonce_error' === $status ) {
            $notice = '<div class="alert alert-error">' . esc_html__( 'Došlo je do greške s formom. Pokušajte ponovo.', 'lehoia' ) . '</div>';
        }
    }

    echo $notice;
?>
    <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="contact-form">
        <?php wp_nonce_field('lehoia_contact_form_submit', 'lehoia_contact_form_nonce'); ?>
        <input type="hidden" name="action" value="lehoia_contact_form" />
        <div class="input-wrapper">
            <label for="name">Ime i Prezime</label>
            <input class="input w-input" type="text" id="name" name="name" placeholder="Unesite svoje ime i prezime?" required value="<?php echo esc_attr( $_POST['name'] ?? '' ); ?>" />
        </div>
        <div class="input-wrapper">
            <label for="email">Email</label>
            <input class="input w-input" type="email" id="email" name="email" placeholder="Koji je Vaš E-mail?" required value="<?php echo esc_attr( $_POST['email'] ?? '' ); ?>" />
        </div>
        <div class="input-wrapper">
            <label for="phone">Broj Telefona</label>
            <input class="input w-input" type="tel" id="phone" name="phone" placeholder="+387 xx xxx xxx" required value="<?php echo esc_attr( $_POST['phone'] ?? '' ); ?>" />
        </div>
        <div class="input-wrapper">
            <label for="service">Servis</label>
            <input class="input w-input" type="text" id="service" name="service" placeholder="Ex. Zaposlenik" required value="<?php echo esc_attr( $_POST['service'] ?? '' ); ?>" />
        </div>
        <div class="input-wrapper">
            <label for="message">Poruka</label>
            <textarea class="text-area w-input" id="message" name="message" placeholder="Zdravo, želio bih razgovarati o..." rows="5"><?php echo esc_textarea( $_POST['message'] ?? '' ); ?></textarea>
        </div>
        <div class="input-wrapper">
            <input type="submit" name="contact_form_submit" value="Pošalji poruku" class="button-primary w-button" />
        </div>
    </form>
<?php
    return ob_get_clean();
}
add_shortcode('contact_form', 'lehoia_contact_form_shortcode');

// Handler for admin-post.php submissions
add_action( 'admin_post_nopriv_lehoia_contact_form', 'lehoia_handle_contact_form' );
add_action( 'admin_post_lehoia_contact_form', 'lehoia_handle_contact_form' );

function lehoia_handle_contact_form() {
    // Verify nonce
    if ( ! isset( $_POST['lehoia_contact_form_nonce'] ) || ! wp_verify_nonce( $_POST['lehoia_contact_form_nonce'], 'lehoia_contact_form_submit' ) ) {
        wp_safe_redirect( add_query_arg( 'contact_status', 'nonce_error', wp_get_referer() ?: home_url() ) );
        exit;
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
    $service = sanitize_text_field( wp_unslash( $_POST['service'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

    $to      = get_option( 'admin_email' );
    $subject = 'New Contact Form Submission - ' . get_bloginfo( 'name' );
    $body    = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\n\nMessage:\n$message";

    // Use site admin email as From and include Reply-To as user's email (better deliverability)
    $from = get_bloginfo('name') . ' <' . $to . '>';
    $headers = array( 'Content-Type: text/html; charset=UTF-8', 'From: ' . $from );
    if ( ! empty( $email ) ) {
        $headers[] = 'Reply-To: ' . $email;
    }

    if ( wp_mail( $to, $subject, nl2br( esc_html( $body ) ), $headers ) ) {
        wp_safe_redirect( add_query_arg( 'contact_status', 'success', wp_get_referer() ?: home_url() ) );
        exit;
    } else {
        wp_safe_redirect( add_query_arg( 'contact_status', 'error', wp_get_referer() ?: home_url() ) );
        exit;
    }
}
