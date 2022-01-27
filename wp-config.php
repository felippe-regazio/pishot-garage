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
define( 'DB_NAME', 'pishot_garage' );

/** Database username */
define( 'DB_USER', 'felippe' );

/** Database password */
define( 'DB_PASSWORD', 'Trufasazuis' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Allow automatic installations */
define( 'FS_METHOD', 'direct' );


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
define( 'AUTH_KEY',         'z<<17v3]#,67moSIweki]P[y/8cz>TKNXTb0]]uyQy5`D~7%/;!Y7Z Fmq>,F5o6' );
define( 'SECURE_AUTH_KEY',  '4Kd$tAMg<#Iv4[6xrr4hqSI HPA$Os{Ubp3k$S4RyGzLOny9H-dBVA/1.~+dFEA~' );
define( 'LOGGED_IN_KEY',    '-@u(7)J)(<kpU`{Mbe<SFQm8m6o}/NL]LSlH~3|,Z5(AH13R#$Io`LeNzp_6e}0K' );
define( 'NONCE_KEY',        'v2xT]^v5iDv1>/ZK{w7>4rJcB?~d.a%K~J ^oKjEk]%Isae $G$iQE 7|w`8cDaz' );
define( 'AUTH_SALT',        'FoWyrqs@i9FEHIbpBFlcHlogIn7Fu*.db%1{@uqPI^X75beU:D@(!RKQ]@$3h5C1' );
define( 'SECURE_AUTH_SALT', '[+7yp,| 56fzEYE6F$`I[cKt*-0G=5HFV. >jh%tZ`Q _F:n9ts4WGD_Z)xcBpW%' );
define( 'LOGGED_IN_SALT',   '|]r_Mt?,Z.8R4x1sLo/#uBwOm.R%[bscC,oWRh_MI+wx@M&.1;qN:4}pbYYOYL]A' );
define( 'NONCE_SALT',       'McP,^kuez[rTs@!u4/D?Stz>2$Hqmq-qaRaHQk=?;*<ZMXFG,:d8bX{Net}+!yoq' );

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
