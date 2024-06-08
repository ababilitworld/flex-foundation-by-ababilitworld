<?php

namespace Ababilitworld\FlexFoundationByAbabilitworld\Package;

(defined('ABSPATH') && defined('WPINC')) || die();

use Ababilitworld\FlexTraitByAbabilitworld\Standard\Standard;

use const Ababilitworld\FlexFoundationByAbabilitworld\{
    PLUGIN_NAME,
    PLUGIN_FILE,
    PLUGIN_DIR,
    PLUGIN_URL,
    PLUGIN_VERSION
};

if (!class_exists(__NAMESPACE__.'\Package')) 
{
    /**
     * Class Package
     *
     * @package Ababilitworld\FlexFoundationByAbabilitworld\Package\Package
     */
    class Package
    {
        use Standard;

        /**
         * Object wp_error
         *
         * @var object
         */
        private $wp_error;

        /**
         * Object wp_function
         *
         * @var object
         */
        private $wp_function;

        /**
         * Package version
         *
         * @var string
         */
        public $version = '1.0.0';

        /**
         * Constructor
         */
        public function __construct()
        {
            register_uninstall_hook(PLUGIN_FILE, array('self', 'uninstall'));
        }

        /**
         * Run the installer
         * 
         * @return void
         */
        public static function run()
        {
            $installed = get_option(PLUGIN_NAME . '-installed');

            if (!$installed) {
                update_option(PLUGIN_NAME . '-installed', time());
            }

            update_option(PLUGIN_NAME . '-version', PLUGIN_VERSION);
        }

        /**
         * Activate the class
         *
         * @return void
         */
        public static function activate(): void
        {
            flush_rewrite_rules();
            self::run();
        }

        /**
         * Deactivate the class
         *
         * @return void
         */
        public static function deactivate(): void
        {
            flush_rewrite_rules();
        }

        /**
         * Uninstall the plugin
         *
         * @return void
         */
        public static function uninstall(): void
        {
            delete_option(PLUGIN_NAME . '-installed');
            delete_option(PLUGIN_NAME . '-version');
            flush_rewrite_rules();
        }
    }

    /**
     * Return the instance
     *
     * @return Ababilitworld\FlexFoundationByAbabilitworld\Package\Package
     */
    function package()
    {
        return Package::instance();
    }
}


?>
