<?php
namespace App;

/**
 * @package contact_db
 */

use App\RenderData;

class Controller
{
    public static function run()
    {
        add_action('admin_menu', array(__CLASS__,'register_menu'));
        add_action('wpcf7_posted_data', array(__CLASS__,'posted_data'));
    }

    public static function register_menu()
    {
        add_menu_page(
            'Contact Form DB',
            'Contact Form DB',
            'manage_options',
            'contact_form_db',
            array(__CLASS__,'render_menu_page'),
            'dashicons-chart-line',
        );
    }

    public static function render_menu_page()
    {
        $obj = RenderData::run();
        echo '<div class="wrap"><h2>Contact Form Submitted Data</h2>';
        echo '<form id="contact_form_db" action="" method="get">';
        echo '<input type="hidden" name="page" value="'.$_REQUEST["page"].'" />';
        $obj->prepare_items();
        $obj->display();
        echo '</form>';
        echo '</div>';
    }

    public static function posted_data($data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix.TABLE_NAME;
        $wpcf7 = \WPCF7_ContactForm::get_current();
        $form_id = $wpcf7->id;
        $wpdb->insert($table_name, array(
            'form_id' =>  $form_id,
            'form_data' => serialize($data)
        ));
    }
}
