<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}

class Woo_Enhanced_Coupons_Discounts {
    protected $loader;
    protected $plugin_name;
    protected $version;

    // We add the rules object
    protected $rules;

    public function __construct() {
        if ( defined( 'WOO_ENHANCED_COUPONS_DISCOUNTS_VERSION' ) ) {
            $this->version = WOO_ENHANCED_COUPONS_DISCOUNTS_VERSION;
        } else {
            $this->version = '1.0.0';
        }
        $this->plugin_name = 'woo-enhanced-coupons-discounts';

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woo-enhanced-coupons-discounts-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woo-enhanced-coupons-discounts-i18n.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-woo-enhanced-coupons-discounts-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-woo-enhanced-coupons-discounts-public.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woo-enhanced-coupons-discounts-rules.php';

        $this->loader = new Woo_Enhanced_Coupons_Discounts_Loader();
        $this->i18n = new Woo_Enhanced_Coupons_Discounts_i18n();
        $this->admin = new Woo_Enhanced_Coupons_Discounts_Admin( $this->get_plugin_name(), $this->get_version() );
        $this->public = new Woo_Enhanced_Coupons_Discounts_Public( $this->get_plugin_name(), $this->get_version() );
        $this->rules = new Woo_Enhanced_Coupons_Discounts_Rules();
    }

    private function set_locale() {
        $this->loader->add_action( 'plugins_loaded', $this->i18n, 'load_plugin_textdomain' );
    }

    private function define_admin_hooks() {
        $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'enqueue_scripts' );
    }

    private function define_public_hooks() {
        $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $this->public, 'enqueue_scripts' );
    }

    public function run() {
        $this->loader->run();
    }

    public function get_plugin_name() {
        return $this->plugin_name;
    }

    public function get_loader() {
        return $this->loader;
    }

    public function get_version() {
        return $this->version;
    }
}
