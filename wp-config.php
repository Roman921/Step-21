<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'BKQR+W3TXW:.^j8JF|98 bl!k#%@d):rP^Z-^-%[ys.Yp!~[V;2H0J]cN5$vAcd2');
define('SECURE_AUTH_KEY',  '1J+E7F np3`1N3/KfOB.]aYqmmq>6De^E23G|,HYhB{GE-^:0Gqk`obgh53&_nRm');
define('LOGGED_IN_KEY',    '9{2AZ^)Tx(pO23%PH7 ~cara3]-S4GisdVTG}E?-Q$98&(lTq<0H-W<Q6ovvYtU@');
define('NONCE_KEY',        '<S!M4JL&+z<|=9rq!$+Y<Ry!Qj,#}jE3UZjk:l|(D:[gAn3`}(|S*r;:R75h/an:');
define('AUTH_SALT',        '],-L&su8Y5;PMZo%gRb-o9@_#3pTNk |ug!{eHsNoG_sCr^HuhSAy?&5z^J?VN| ');
define('SECURE_AUTH_SALT', 'bet?M>&-4k&Ac:$-r^EL3d|@)&=c_=Y|E~AFhNG7*Gd*+KqY@+o#i@[2HbU-B<5y');
define('LOGGED_IN_SALT',   'b/yH#Wl02A8{WHS=RU0~T_+IAj7-/Vw-g.<Z)8/2A!)`-6ko|%3C5%*b6E1k(TD.');
define('NONCE_SALT',       'llS*rO0Sn_IG%eU{p&=q9%>F5&;%hF$ZB8gPP!s6Ud}-uuu|YFyq|6jWbfbpjX^x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
