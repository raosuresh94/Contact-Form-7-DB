<?php
/**
 * @package contact_db
 * Plugin Name:  Contact Form 7 Database
 * Plugin URI: https://github.com/raosuresh94/
 * Description: Plugin for testing purpose
 * textdomain:contact_db
 */

!defined(ABSPATH) or die('You are not allowed to access');



if (file_exists(__DIR__.'/vendor/autoload.php')) {
    require_once __DIR__.'/vendor/autoload.php';
}



define('TABLE_NAME', 'contact_db_table');

use App\Base\Activate;
use App\Base\deactivate;
use App\Controller;

//Setup menu and listing page
Controller::run();
register_activation_hook(__FILE__, function () {
    Activate::run();
});
register_deactivation_hook(__FILE__, function () {
    Deactivate::run();
});
