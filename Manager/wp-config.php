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
define( 'DB_NAME', 'i6929554_wp1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'JwHFH75xmwOTBcgRvvyasBQ1VKrqaD1m1EllqkMGwPwphLGXds2iHkpaEqOH3b27');
define('SECURE_AUTH_KEY',  'mRNqnBYoFyYX4oFNCdo3iBQt18MnvbMcgORXl8O3LJRsjnXaNvwWCm5coPYxhHMF');
define('LOGGED_IN_KEY',    'CJLtICErtKGnuU8crhKEHR05EL1sJ9JYH7SKtefUv7z5eaKNtYVSfclbAPh9eROl');
define('NONCE_KEY',        'FlC5WjkpmTME8MHEfa5m9mv3q32bUAvAcRGAGufc5B7Pzra5oeNQGAPPp3P3zqBT');
define('AUTH_SALT',        'hogwS4wAFsVJcslgxuuI04isiRDNBYzVYDG3KKIbLJY6quYlHmFoHl1govPJ5yV0');
define('SECURE_AUTH_SALT', 'lUOtUPOn4dqiiCvngFQN2sAOrGWxdo0X8WuiJLoVnNeYwF2IWg06B0rKBrgt3vlZ');
define('LOGGED_IN_SALT',   '31AqUjfRmHmwMedTRhxtPTDJNyaCIqqWsLVxDng0a5CgdiopflXfHHH0g0CQ3DaY');
define('NONCE_SALT',       'nfSu7YTNyRlJsy2smZtwSQdVd5gKO8PbU1LCB2WSoh2PHRloSpB7awUbhdvZ7o2g');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
