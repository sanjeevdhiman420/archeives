<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sellerbuyer' );

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
define( 'AUTH_KEY',         '=ocx KdG mOJ}nt::Z^jl23425m*u3U# .#*uLx5`sPDU&]e6^-W0A~AXp$#8f{]' );
define( 'SECURE_AUTH_KEY',  'x9UX^h-(-unJX`D<l2<h.uzm~gX{,:_di}3J^GG>v5V53CWaI$r}j$lv8`}5/5Vk' );
define( 'LOGGED_IN_KEY',    '}<,!kLaVM nHL1m;fG[Uh#6s~]w.d>,4`,<tTJAg 2}nGStCwlK|+Hg%htLR%/bB' );
define( 'NONCE_KEY',        '3jfczQPzI:-L9ZUVL~.vqn0{dW_M<s@J+GclN<VoHtPeF*b.Y!oevk5NXVVW}2j]' );
define( 'AUTH_SALT',        'Wu?*-D&!_8~/O[+vxajo?B`2EtL0dG$+(#eYTU C1]r!PQGXk4-d|<V,.,]vu2c#' );
define( 'SECURE_AUTH_SALT', 'r$L=0[%%{vH%bq2K0GcGd*z_<m=fpZc*a{A1fzZQOtONge}YIzz|Ya1>=%0g(ZV=' );
define( 'LOGGED_IN_SALT',   'F&v}iRuzDmeCsY]:W4n%0{yo8o?$n ~ 9OV0Q`V05[y~60+au9D{3Od?Do$bVI`a' );
define( 'NONCE_SALT',       '5Zi4qwkPWXcBq^bEJyC=e*SBU1aKe:o)TSwx!{@C_^Wxx^qTY~!g>&j%g37^;*A{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
