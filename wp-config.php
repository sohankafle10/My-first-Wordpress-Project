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
define( 'DB_NAME', 'FirstProject' );

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
define( 'AUTH_KEY',         'n*>uqL|1QC/nJdnE>a.`PZD|qrRC/3MF%x<o4Kk4Mt6rYF%U7xr/ZvTw6FnK?]aP' );
define( 'SECURE_AUTH_KEY',  '5NA!_]Q`41S#d$/]TTyKh)exDP2vRwI15vVfl`+Xn(!I3]{AIes[vfr`BeI2Mv>/' );
define( 'LOGGED_IN_KEY',    '=9C!GC2q?/>p_$)[v_8gObcHK55`vqx!R$O`@9eWb%Rl[ GX[KrS;`Q*=rVwrW^[' );
define( 'NONCE_KEY',        '1[$,T:`d6#c]zw(cQbi}$PZP;J%?Nb1Oexe_?M@clR[w-%2!5?z`,_H^>A;tx9V=' );
define( 'AUTH_SALT',        'm3[a%gQC?3rdig|8 ;WGQ>oYf$`}.gK f<`UT1$W/sT:XW8NjaB!F4Zst.$w}EtL' );
define( 'SECURE_AUTH_SALT', 'KaHm;xMfK,;`_Hvbp-&BIL4~5naFmpnc9=f*md/?~nFX;My&bM(4K5FP:fqj`64Y' );
define( 'LOGGED_IN_SALT',   '{bKHW|Q44!h3Sg)Kn}LGT32>%M=7HAL1)&FZ>C(8p5*Uz7<!O18]w~@S9~S$ k=U' );
define( 'NONCE_SALT',       'Y,Szk/OND`8HqBh4$8F`G?1l7/.F#_IU<y?ZB5McaEPdHOg0yZty)%J$P=H7/ruT' );

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
