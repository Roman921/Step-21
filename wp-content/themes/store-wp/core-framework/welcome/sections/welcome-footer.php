<?php
/**
 * Welcome screen who are woo template
 */
?>
<div id="who" class="feature-section col three-col" style="margin-bottom: 1.618em; padding-top: 1.618em; overflow: hidden;">
    <div class="col-1">
        <h4>
            <?php esc_html_e( 'Iografica Themes', 'store-wp' ); ?>
        </h4>
        <p>
            <?php esc_html_e( 'Our goal is make the best free and premium WordPress themes and plugins.', 'store-wp' ); ?>
        </p>
        <p>
            <?php esc_html_e( 'Follow us on:', 'store-wp' ); ?><br>
            <a href="<?php echo esc_url('https://www.facebook.com/iograficathemes'); ?>"><?php esc_html_e( 'Facebook','store-wp'); ?></a> |
            <a href="<?php echo esc_url('https://twitter.com/iograficathemes'); ?>"><?php esc_html_e( 'Twitter','store-wp'); ?></a> |
            <a href="<?php echo esc_url('https://plus.google.com/+Iograficathemes/'); ?>"><?php esc_html_e( 'Google Plus','store-wp'); ?></a>
        </p>
        <p>
            <a href="<?php echo esc_url('http://iograficathemes.com'); ?>" class="button">
                <?php esc_html_e( 'Visit the website', 'store-wp' ); ?>
            </a>
        </p>
    </div>

    <div class="col-2">
        <h4>
            <?php esc_html_e( 'Can i contribute?', 'store-wp' ); ?>
        </h4>
        <p>
            <?php esc_html_e( 'Would you like to translate the theme into your language? Send us your language file and it will be included in the next theme release.', 'store-wp' ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url('http://www.iograficathemes.com/document/make-a-translation/'); ?>" class="button">
                <?php esc_html_e( 'Read how to make a translation', 'store-wp' ); ?>
            </a>
        </p>
    </div>

    <div class="col-3 last">
        <h4>
            <?php esc_html_e( 'Can\'t find a feature?', 'store-wp' ); ?>
        </h4>
        <p>
            <?php esc_html_e( 'Please suggest and vote on ideas / feature requests at the ', 'store-wp' ); ?>
            <a href="<?php echo esc_url('https://iograficathemes.uservoice.com'); ?>">
                <?php esc_html_e( 'feedback forum', 'store-wp' ); ?>
            </a>
        </p>

        <h4>
            <?php esc_html_e( 'Do you like the theme?', 'store-wp' ); ?>
        </h4>
        <p>
            <?php echo sprintf( esc_html__( 'Why not leave a review on %sWordPress.org%s? We\'d really appreciate it! :-)', 'store-wp' ), '<a href="'. esc_url(wp_get_theme()->get( 'ThemeURI' )) .'">', '</a>' ); ?>
        </p>
    </div>
</div>
