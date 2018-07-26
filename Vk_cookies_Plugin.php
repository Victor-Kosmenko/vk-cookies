<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once('Vk_cookies_LifeCycle.php');

class Vk_cookies_Plugin extends Vk_cookies_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            'Image' => array(__('Image (Icon)', 'vk_cookies') => 'image'),
            'Link' => array(__('Link to the full version of terms and conditions', 'vk_cookies') => 'input'),
            'BannerColor' => array(__('Banner color', 'vk_cookies') => 'color'),
            'ButtonsColor' => array(__('Buttons color', 'vk_cookies') => 'color'),
            
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'vk_cookies';
    }

    protected function getMainPluginFileName() {
        return 'vk_cookies.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
    }

    public function addActionsAndFilters() {

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/assets/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/assets/css/my-style.css', __FILE__));
        //        }


        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37
        add_action('admin_enqueue_scripts', array(&$this, 'loadAdminScripts'));


        // Adding scripts & styles to all pages
        wp_register_style('vk-cookies-style', plugin_dir_url(__FILE__) . 'assets/css/styles.css', array(), filemtime($this->getPluginDir() . '/assets/css/styles.css'), 'all');
        wp_enqueue_style('vk-cookies-style');

        wp_register_script('vk-cookies-script', plugin_dir_url(__FILE__) . 'assets/js/scripts.min.js', array('jquery'), filemtime($this->getPluginDir() . '/assets/js/scripts.min.js'));
        wp_localize_script('vk-cookies-script', 'vk_cookies_global_data', array('ajaxurl' => admin_url('admin-ajax.php')));
        wp_enqueue_script('vk-cookies-script');

        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39


        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41

    }

    public function loadAdminScripts() {
        wp_enqueue_media();
        wp_enqueue_script( 'wp-media-uploader', plugin_dir_url(__FILE__) . 'assets/js/wp_media_uploader.js', array( 'jquery' ), 1.0 );
        wp_enqueue_style( 'wp-color-picker');
        wp_enqueue_script( 'wp-color-picker');
    }

}
