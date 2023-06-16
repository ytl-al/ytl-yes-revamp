<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ytl' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}P>_{Ey1_dl|<(?v(SH)b]*_?^X3%H)6OUvP0f_d2|AvZ9ZW7v[EKi>jUsx975VI' );
define( 'SECURE_AUTH_KEY',  'mlR3ttC:adcjc2aFiH^n }cKr>a/@2 #UM+I6wn9!K-ff#5j3-;&Kp-Ms4hEk*?%' );
define( 'LOGGED_IN_KEY',    ';#;{ SOC>uvQfygxt,QBZeD(hrgY2EZTpYCyeJ1}=,x*3)l]pd`:MVZ2ua&m2<[H' );
define( 'NONCE_KEY',        '6=fV|PA:satz/dl+Y)&ojqswDcw%k+vv+a!$hwPPpKlMM&nv^]~k_)0tgsh_Sr:h' );
define( 'AUTH_SALT',        'jf$OMHU0g`s-to(0R(WO5(CQ^#0WIkO)( C+vFgwB(J rn@ *-[COSQqHZ[:6$_@' );
define( 'SECURE_AUTH_SALT', '6&}kbfYm,&}^U;eivg^Udb0_1M_H>ik%Ly$/<~OU?{AREBJww#x)d?)DHL~eZP6u' );
define( 'LOGGED_IN_SALT',   '=fKZVNp4X%xLM?(?N{:h|;%}JAjebP6lVT34;WLl:6Z_3g.s:h(_r)E+^`_/oi|L' );
define( 'NONCE_SALT',       '`P<X0t@HSk`$SUT?A2th&.A{&qft>7JIR^b<w!0YofA%2;n,In@}gB#tLkJ$AwIx' );
define( 'SITE_ENV', 'LOCAL');
define( 'WP_MEMORY_LIMIT', '256M' );
define('FP_STORE_LOCATIONS', 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQI-x7j9XeZ0lmQx4tFI0nnup0du20jq9YQXtnUPdzsOWAAGA9dm0OEyAskIB6BuQ/pub?gid=349852332&single=true&output=csv');
define('XPAY_LIB_PATH', 'https://selfcareiot.ytlcomms.my/xpay/js/xpaylib.js');
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'yes_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
