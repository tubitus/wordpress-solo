<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'PWokBEOhWIuboaYE3-~g^:jTFjK% u$ ?TrTI,(--M$24+$O^p93/kQGZ:cx+,/Y' );
define( 'SECURE_AUTH_KEY',  'p.f,J|tq>5q$)S:!,T`eA4~lw0p(OS(vLEM<(rO<r;?LOz@CrnWx0=n(>Rx`:& O' );
define( 'LOGGED_IN_KEY',    'R1FT]c$jNP[d}M+KRfgD1AqR8KFBQ~zYD6@_To:I@P~]>Xx%*Lj`;hF(-QV$e<5W' );
define( 'NONCE_KEY',        'KiS.NkNj!/V;-B1CMf34DDBAL}ZTA#Irrj3**^bN4feC/?=]YnKoSI0s:G[Wz0%1' );
define( 'AUTH_SALT',        '@N@0lJD#:T34H)I{{jHfh$*XRGdU?1)!h+ynV*Rx|lk5*?aIbn=^he$c#v*Oz(]p' );
define( 'SECURE_AUTH_SALT', '|-8dnyG11CNHdfD%LX1%& MpSW/R/X})=STz?WLBkcb.Bk_X`d-Ypn4_#80R`p?d' );
define( 'LOGGED_IN_SALT',   'Z]wux:.D<TPpjvU)>PHHJzYZ=;XM|qamRL+?+%PKjkE&2TrG)`9lLgynvC4DF6yC' );
define( 'NONCE_SALT',       'I]w~cC<.*u5EsTc;=/_opQbE6sutLk?*soC,jz%Axv@7W[T.ggR3R-ncXhLEDwd`' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
