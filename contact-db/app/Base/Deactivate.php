<?php
namespace App\Base;

/**
 * @package contact_db
 */

class Deactivate
{
    public static function run()
    {
        self::remove_table();
    }

    public static function remove_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix.TABLE_NAME;
        $sql = "DROP TABLE {$table_name}";
        $wpdb->query($sql);
    }
}
