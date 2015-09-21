<?php
/**
 * Welcome screen getting started template
 */
?>
<?php
// get theme customizer url
$url 	= admin_url() . 'customize.php?';
?>
<div id="getting_started" class="feature-section col two-col panel" style="margin-bottom: 1.618em; padding-top: 1.618em; overflow: hidden;">
    <h2>
        <?php esc_html_e( 'Using', 'store-wp' ); ?> <?php echo wp_get_theme()->get( "Name" );?>
    </h2>
    <p>
        <?php esc_html_e( 'Thank you for use our theme. You can read detailed information on theme features and how to develop on top of it in the documentation.', 'store-wp' ); ?>
    </p>
    <p>
        <a href="http://www.iograficathemes.com/documentation/" class="button">
            <?php esc_html_e( 'View Documentation', 'store-wp' ); ?>
        </a>
    </p>
    <p>
        <?php esc_html_e( 'Here are some common theme-setup tasks: ', 'store-wp' ); ?>
    </p>

    <div class="col-1">
        <h3>
            <?php esc_html_e( 'Customize your theme' ,'store-wp' ); ?>
        </h3>
        <p>
            <?php esc_html_e( 'Customize your website with the WordPress Customizer.', 'store-wp' ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url( $url ); ?>" class="button"><?php esc_html_e( 'Open the Customizer', 'store-wp' ); ?></a>
        </p>
    </div>

    <div class="col-2 last">
        <h3>
            <?php esc_html_e( 'Configure menu locations' ,'store-wp' ); ?>
        </h3>
        <p>
            <?php esc_html_e( 'Add and use your custom navigation menus.', 'store-wp' ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url( self_admin_url( 'nav-menus.php' ) ); ?>" class="button">
                <?php esc_html_e( 'Configure menus', 'store-wp' ); ?>
            </a>
        </p>
    </div>
</div>
