<?php
namespace App\Base;

use App\Controller;

/**
 * @package contact_db
 */

class Activate
{
    public static function run()
    {
        self::create_table();
    }

    public static function create_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix.TABLE_NAME;
        $collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE {$table_name}(
            `id` INT(10) NOT NULL AUTO_INCREMENT,
            `form_id` INT(10) NOT NULL,
            `form_data` longtext,
            `created_at` timestamp NOT NULL,
            PRIMARY KEY (id)
        ) $collate;";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
