<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'terra_sitio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3Rm}6]5W4J8zQ_pC{zNg; cqk`p$f:wy?N~_f;hx;:`Y5zDoe(ts;h8#eLP#= yA' );
define( 'SECURE_AUTH_KEY',  'lz%Becg7/<_j^u|PG-g0v3BmjZ.[vZ&mi%Ii;:EKoXisG?[;Wu[t2`_> A0zVl{p' );
define( 'LOGGED_IN_KEY',    '^ju3U3IhL[J2o7ym Zy*f@a<E@qh> 5U{*tmNRj-}PV:a7[f8?5Dv8.D2=NV4.iJ' );
define( 'NONCE_KEY',        'B:X!#/wr4O^HO?5{li:LS_Bf3g_&BD#@Gl8a_IO?O0t2=UI=Bum&u*W%J.[y2v;3' );
define( 'AUTH_SALT',        '{^*qnPVnX[6~fFgdKbw8EqjB%oa5SDh-ZzT3wF9,zw$Z2>[GCR)nBat$BT4zeL~E' );
define( 'SECURE_AUTH_SALT', '%B|!e>=l{i|gnX5;{$<EkF@0qW%PL/Wea*%0~[(u4dKF-I6e{bqD~MPnix.VK~([' );
define( 'LOGGED_IN_SALT',   'Dx1xWaBPL)5y3w]1*(37}k5se)hf0MU(<N5]K2tC*{X!2BY2Lf{@=)1z[Eb3ti),' );
define( 'NONCE_SALT',       'I59ev6UDtLWI5YTQy-O?B&W0Ewja=`c;&$ufD7x|&Xv)CRT>Ff/x9(dmMNB1u1V0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
