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
define( 'DB_NAME', 'servicequotation' );

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
define( 'AUTH_KEY',         'Q=-J01mbyhe>NUIzwj,3MoBYk4;]vX%+!|?$a[]X>+hOk%]]_n~e`y>0dG-ONhw=' );
define( 'SECURE_AUTH_KEY',  'FVs866^l>SRN,nRW($Zjt~>3 rGIYU@,5N<Aw^^=@p^JQ0 <=G/KK#Yr,;s%;:F6' );
define( 'LOGGED_IN_KEY',    'qPu;n($3n^7k5}9x{ejs*ZFY*OvB;Opf9>5X$]=_qNK?TG9kB2~H~~o1`d+5RE^F' );
define( 'NONCE_KEY',        '`Zqg)0kr)IvIt<?_f1Ip.x.&^abjRiyZD>S-6*#>VR8)+nY+urFt+HzM{|2V7KY-' );
define( 'AUTH_SALT',        'DfBjQ=,^oy#nF4pO6$o&M/tmxD{];h1cPSIg#|AGi9yk n/(VL|b@]l_EZ,5[b[c' );
define( 'SECURE_AUTH_SALT', '6^E?g{MtuUW^2}gXKZX;f$u-GTaoJXXP wP rB[W6:KA*}A!pna~j)gXEn3j9x-?' );
define( 'LOGGED_IN_SALT',   'Qp g@AD.];F, yfb&Q0p%*8OGeE(sCZMr?*j<`SdvaS(/$z>hY6QNg7(kF>`>V$(' );
define( 'NONCE_SALT',       '{D3?X}fps{#/*/=+hS?=?VgA71Hf}(.V3Fyq.>C]SzD718j-%t.25SQueiO@BPjv' );

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
