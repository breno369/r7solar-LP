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
define( 'DB_NAME', 'r7theme' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'r7theme_mysql' );

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
define( 'AUTH_KEY',         'cO{o F&|zxvWLV`*I#/};~xwQ*`g[HfDd2)mN{1{f+%c-***iC:H~}LSnO}Man%^' );
define( 'SECURE_AUTH_KEY',  'r6+Zd|hJELXOwukXB{H/!8O_G:Bm0ak~Bz{N(]I/Z<J1Y~J1=ZmXBJijESW,@A L' );
define( 'LOGGED_IN_KEY',    'v3RP*C2:G1^wYLDRp/sW~jpgsN,~$zZx|(8l|[~m1Nt[5Y5T*e?ML:$!*ID]$7~l' );
define( 'NONCE_KEY',        'WIEY>Ua88&w8@IMYP`52leVgmvKFKR=Foj~*II-lZ>ZTr]b!wLj zNM-E$fcM2z6' );
define( 'AUTH_SALT',        'y^}2MukEEKm,@KFjb9yPP]>Kxi=E Ys|u{]WHYvda4TM2ASU0O~r4u%!YW:mvuXy' );
define( 'SECURE_AUTH_SALT', 'jcBR$wHVX>Zi0V{k6,S@<l7wZN4%5z.Emy!3oh6,,5`0WCEe]ftMJZw1yfG;/!7Z' );
define( 'LOGGED_IN_SALT',   '(P]TBidQ6rx:0B7l/yZPkU)@f#<DOxjDhVmWmbf*;UUP<vb:.[6~ehDa~{Rb8 u`' );
define( 'NONCE_SALT',       'rZn,3[PusXN^g}YV>-StauOc~vYjmX&mt~DqSEZQUT4ZG)Na#i.:kPcM03wrqltv' );

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
