<?php
define( 'WP_CACHE', true );

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
define('DB_NAME', 'sttci_j1wh1');

/** Database username */
define('DB_USER', 'sttci_j1wh1');

/** Database password */
define('DB_PASSWORD', 'R.Zr0CxXhBJjPGJAPcf13');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'BJuyjqNTNqHQTJN9WsQHzXXNLuuieLwy2UXM12OuIluTaUYQbEr3aW89xmd4Hqwu');
define('SECURE_AUTH_KEY',  'Q22blQ2u8XopIMZrMTv1UsaQzdqE6ERsnYXaYcaOuj3pDO0lA8KBn9RzQaPlvd61');
define('LOGGED_IN_KEY',    'tMzkJZlSssLXbM3dRFeQgsvdpRQ4bobZSAQjM3sIsZmwNdIWIb9YzmGsSKQzTNBn');
define('NONCE_KEY',        'bVvR2TZF518r7vy1XMLqp6vJGKSd54pbOQ07E6bn0uaR7NSWGYgrF0kOl6TBWPRc');
define('AUTH_SALT',        's6t4josW7zSsW14lo8fEjYZ6PJfiZ9vkOfULsBJSgiEVWXHKe8qbRIwwf1xkZ11L');
define('SECURE_AUTH_SALT', 'UrifQlKjD3yqU4DiFCdVjUPDt7yBj3lIjkhoR19vvdamQSv2SUwquLHrSn3OpzgX');
define('LOGGED_IN_SALT',   't19tHcDmeA9mioVM5lqeJSIiCjFEuYBt4sgj29Bo7RKVyu4I81dCh8ttsrhkJPMC');
define('NONCE_SALT',       '1QO2lGggwv2KV3XFYEAe9mnPwnRMeDkihyjtgJf9yu1sYQ7dJG464mGdHl1U6YqQ');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR', dirname(__FILE__) . '/wp-content/uploads');


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
$table_prefix = 'zqyp_';

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
