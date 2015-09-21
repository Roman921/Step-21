<?php
//the id of the options
$igthemes_option='store-wp';

//start class
class IGthemes_Customizer {

// add some settings
public static function igthemes_customize($wp_customize) {
/** The short name gives a unique element to each options id. */
global $igthemes_option;
//upgrade message
$upgrade_message = '<a class="upgrade-tag" href="http://www.iograficathemes.com/downloads/store-wp-premium/" target="_blank">' . __(' - only premium', 'store-wp') . '</a>';

// slect categories
$categories = get_categories();
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }

//01 PREMIUM
$wp_customize->add_section('upgrade-premium', array(
        'title' => __('UPGRADE TO PREMIUM', 'store-wp'),
        'priority' => 1,
    ) );

//03 GENERAL
    $wp_customize->get_section('title_tagline')->title = __('General Settings', 'store-wp');
    $wp_customize->get_section('title_tagline')->priority = 3;

//04 LAYOUT
    $wp_customize->add_section('layout-settings', array(
        'title' => __('Layout settings', 'store-wp'),
        'priority' => 4,
    ));

// 05 STYLE
    $wp_customize->get_section('colors')->title = __('Style Settings', 'store-wp');
    $wp_customize->get_section('colors')->priority = 5;

// 06 FOOTER
    $wp_customize->add_section('footer-settings', array(
        'title' => __('Footer Settings', 'store-wp'),
        'priority' => 6,
    ));

// 06 SOCIAL
    $wp_customize->add_section('social-settings', array(
        'title' => __('Social Settings', 'store-wp'),
        'priority' => 7,
    ));

// 07 ADVANCED
    $wp_customize->add_section('advanced-settings', array(
        'title' => __('Advanced Settings', 'store-wp'),
        'priority' => 7,
    ));

/*****************************************************************
* PREMIUM
******************************************************************/
$wp_customize->add_setting($igthemes_option . '[upgrade_box]', array(
    'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ) );

$wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'upgrade_box', array(
    'label' => __('', 'store-wp'),
    'description' => '<p style="font-style: normal;">' . __('If you like this theme, considering supporting development by purchasing the premium version.', 'store-wp'). '</p>'
    . '<ul class="premium" style="font-style: normal;"> '. '<li><strong>'. __('Main premium features:', 'store-wp'). '</strong></li>'
    . '<li>' . __('- All options enabled', 'store-wp') . '</li>'
    . '<li>' .  __('- Premium shortcodes included', 'store-wp') . '</li>'
    . '<li>' . __('- Priority support', 'store-wp'). '</li>'
    . '<li>' .  __('- Money back guarantee', 'store-wp') . '</li>'
    . '<li>' . '<a class="upgrade-button" href="http://www.iograficathemes.com/downloads/store-wp-premium/" rel="nofollow">' . __('upgrade to premium', 'store-wp') . '</a></li>'
    . '</ul>',    'type' => 'custom',
    'section' => 'upgrade-premium',
    'settings' => $igthemes_option . '[upgrade_box]',
    )));

/*****************************************************************
* GENERAL SETTINGS
******************************************************************/
//blog name
    $wp_customize->add_setting('blogname', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_text',
        'transport'=>'postMessage'
    ));
    $wp_customize->add_control('blogname', array(
        'label' => __('Site Title', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => 'blogname',
        'priority' => 1,
    ));
//blog description
    $wp_customize->add_setting('blogdescription', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_text',
        'transport'=>'postMessage'
    ));
    $wp_customize->add_control('blogdescription', array(
        'label' => __('Tagline', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => 'blogdescription',
        'priority' => 2,
    ));
//logo
    $wp_customize->add_setting($igthemes_option . '[logo]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logo', array(
        'label' => __('Site Logo', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[logo]',
    )));
//favicon
    $wp_customize->add_setting($igthemes_option . '[favicon]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon', array(
        'label' => __('Site Favicon', 'store-wp'),
        'description' => __('Upload your site favicon (16x16 px)', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[favicon]',
    )));
//iphone icon
    $wp_customize->add_setting($igthemes_option . '[icon_iphone]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'iphone_icon', array(
        'label' => __('IPhone Icon', 'store-wp'),
        'description' => __('Apple touch icon iphone (57x57 px)', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[icon_iphone]',
    )));
//ipad icon
    $wp_customize->add_setting($igthemes_option . '[icon_ipad]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'icon_ipad', array(
        'label' => __('IPad Icon', 'store-wp'),
        'description' => __('Apple touch icon ipad (76x76 px)', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[icon_ipad]',
    )));
//iphone retina icon
    $wp_customize->add_setting($igthemes_option . '[icon_iphone_retina]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'icon_iphone_retina', array(
        'label' => __('IPhone Retina Icon', 'store-wp'),
        'description' => __('Apple touch icon iphone retina (120x120 px)', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[icon_iphone_retina]',
    )));
//ipad retina icon
    $wp_customize->add_setting($igthemes_option . '[icon_ipad_retina]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'icon_ipad_retina', array(
        'label' => __('IPad Retina Icon', 'store-wp'),
        'description' => __('Apple touch icon ipad retina (152x152 px)', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[icon_ipad_retina]',
    )));
//windows 8 icon
    $wp_customize->add_setting($igthemes_option . '[win_tile_image]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'win_tile_image', array(
        'label' => __('Windows 8 Icon', 'store-wp'),
        'description' => __('Pinned site Windows 8 icon (144x144 px)', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[win_tile_image]',
    )));
//windows 8 icon color
    $wp_customize->add_setting($igthemes_option . '[win_tile_color]', array(
        'default' => 'fff',
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_hex',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'win_tile_color', array(
        'label' => __('Windows 8 Icon Color', 'store-wp'),
        'description' => __('Windows 8 pinned image color', 'store-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[win_tile_color]',
    )));
//lightbox
    $wp_customize->add_setting($igthemes_option . '[lightbox]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('lightbox', array(
        'label' => __('Lightbox', 'store-wp'),
        'description' => __('Enable image lightbox', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[lightbox]',
    ));
//breadcrumb
    $wp_customize->add_setting($igthemes_option . '[breadcrumb]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('breadcrumb', array(
        'label' => __('Breadcrumb', 'store-wp'),
        'description' => __('Enable breadcrumb (it will use WordPress SEO breadcrumb if available)', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[breadcrumb]',
    ));
//shortcodes
    $wp_customize->add_setting($igthemes_option . '[shortcodes]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,$igthemes_option . '[shortcodes', array(
        'label' => __('Shortcodes', 'store-wp'),
        'description' => __('Enable theme shortcodes', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[shortcodes]',
    )));
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//sidebar main
    $wp_customize->add_setting($igthemes_option . '[sidebar_main]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_main', array(
        'label' => __('Main Layout', 'store-wp'),
        'description' =>  __('Select the index page layout', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[sidebar_main]',
    )));
//main featured images
    $wp_customize->add_setting($igthemes_option . '[main_featured_images]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_featured_images', array(
        'label' => __('Index featured image', 'store-wp'),
        'description' => __('Show featured images in index page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[main_featured_images]',
    ));
//main numeric pagination
    $wp_customize->add_setting($igthemes_option . '[main_numeric_pagination]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_numeric_pagination', array(
        'label' => __('Numeric pagination', 'store-wp'),
        'description' => __('Use numeric pagination in index page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[main_numeric_pagination]',
    ));
//sidebar single
    $wp_customize->add_setting($igthemes_option . '[sidebar_single]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_single', array(
        'label' => __('Single Layout', 'store-wp'),
        'description' => __('Select the single post layout', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[sidebar_single]',
    )));
//post featured image
    $wp_customize->add_setting($igthemes_option . '[post_featured_image]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('post_featured_image', array(
        'label' => __('Post featured image', 'store-wp'),
        'description' => __('Show featured image in post page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[post_featured_image]',
    ));
//post meta
    $wp_customize->add_setting($igthemes_option . '[post_meta]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'post_meta', array(
        'label' => __('Meta Data', 'store-wp'),
        'description' => __('Hide post meta data', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[post_meta]',
    )));
//sidebar shop
    $wp_customize->add_setting($igthemes_option . '[sidebar_shop]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_shop', array(
        'label' => __('Shop Layout', 'store-wp'),
        'description' => __('Select the shop page layout', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[sidebar_shop]',
    )));
//shop product slider
    $wp_customize->add_setting($igthemes_option . '[shop_slide]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('shop_slide', array(
        'label' => __('Shop Slide', 'store-wp'),
        'description' => __('Show product slides in the shop page', 'store-wp'),
        'type' => 'checkbox',
        'section' => 'layout-settings',
        'settings' => $igthemes_option . '[shop_slide]',
    ));
/*****************************************************************
* STYLE SETTINGS
******************************************************************/
//header style
    $wp_customize->add_setting($igthemes_option . '[header_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'header_style', array(
        'label' => __('Header Style', 'store-wp'),
        'description' => __('Header custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[header_style]',
    )));
//menu style
    $wp_customize->add_setting($igthemes_option . '[menu_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'menu_style', array(
        'label' => __('Menu Style', 'store-wp'),
        'description' => __('Menu custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[menu_style]',
    )));
//link style
    $wp_customize->add_setting($igthemes_option . '[link_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'link_style', array(
        'label' => __('Links Style', 'store-wp'),
        'description' => __('Links custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[link_style]',
    )));
//button style
    $wp_customize->add_setting($igthemes_option . '[button_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'button_style', array(
        'label' => __('Buttons Style', 'store-wp'),
        'description' => __('Buttons custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[button_style]',
    )));
//footer style
    $wp_customize->add_setting($igthemes_option . '[footer_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'footer_style', array(
        'label' => __('Footer Style', 'store-wp'),
        'description' => __('Footer custom colors', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[footer_style]',
    )));
/*****************************************************************
* FOOTER SETTINGS
******************************************************************/
//footer text
    $wp_customize->add_setting($igthemes_option . '[footer_text]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'footer_text', array(
        'label' => __('Footer Text', 'store-wp'),
        'description' => '<span class="description customize-control-description">' . __('Footer custom text', 'store-wp') . $upgrade_message . '</div>',
        'type' => 'custom',
        'section' => 'footer-settings',
        'settings' => $igthemes_option . '[footer_text]',
    )));
//footer credits
    $wp_customize->add_setting($igthemes_option . '[footer_credits]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'footer_credits', array(
        'label' => __('Credits Link', 'store-wp'),
        'description' => __('Remove author credits', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'footer-settings',
        'settings' => $igthemes_option . '[footer_credits]',
    )));

/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting($igthemes_option . '[facebook_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',

    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => __('Facebook url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[facebook_url]',
    ));
//twitter
    $wp_customize->add_setting($igthemes_option . '[twitter_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => __('Twitter url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[twitter_url]',
    ));
//google
    $wp_customize->add_setting($igthemes_option . '[google_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('google_url', array(
        'label' => __('Google plus url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[google_url]',
    ));
//pinterest
    $wp_customize->add_setting($igthemes_option . '[pinterest_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => __('Pinterest url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[pinterest_url]',
    ));
//tumblr
    $wp_customize->add_setting($igthemes_option . '[tumblr_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => __('Tumblr url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[tumblr_url]',
    ));
//instagram
    $wp_customize->add_setting($igthemes_option . '[instagram_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => __('Instagram url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[instagram_url]',
    ));
//linkedin
    $wp_customize->add_setting($igthemes_option . '[linkedin_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => __('Linkedin url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[linkedin_url]',
    ));
//dribbble
    $wp_customize->add_setting($igthemes_option . '[dribbble_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => __('Dribble url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[dribbble_url]',
    ));
//vimeo
    $wp_customize->add_setting($igthemes_option . '[vimeo_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('vimeo_url', array(
        'label' => __('Vimeo url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[vimeo_url]',
    ));
//youtube
    $wp_customize->add_setting($igthemes_option . '[youtube_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => __('Youtube url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[youtube_url]',
    ));
//rss
    $wp_customize->add_setting($igthemes_option . '[rss_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('rss_url', array(
        'label' => __('RSS url', 'store-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[rss_url]',
    ));

/*****************************************************************
* ADVANCED SETTINGS
******************************************************************/
//custom css
    $wp_customize->add_setting($igthemes_option . '[custom_css]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'custom_css', array(
        'label' => __('Custom CSS', 'store-wp'),
        'description' => __('Add your custom css code', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_css]',
    )));
//custom js
    $wp_customize->add_setting($igthemes_option . '[custom_js]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'custom_js', array(
        'label' => __('Custom Javascript', 'store-wp'),
        'description' => __('Add your custom js code', 'store-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_js]',
    )));
    //END
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('IGthemes_Customizer' , 'igthemes_customize') );
//END OF CLASS
