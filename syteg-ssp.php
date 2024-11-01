<?php
    /**
     * @package Syteg_SSP
     * @version 1.0.1
     * Plugin Name: Syteg SSP
     * Plugin URI: http://wordpress.org/plugins/syteg-ssp/
     * Description: Syteg SSP services Wordpress integration
     * Author: Syteg SSP.
     * Version: 1.0.1
     * Author URI: https://syteg.com/
     * Text Domain: syteg-ssp
     *
     */


    require(dirname(__FILE__) . '/plugin_functions.php');

    class SytegSSP
    {

        private $options;

        /**
         * Start up
         */
        public function __construct()
        {
            $this->options = get_option('syteg_ssp_chat_options');

            add_action('admin_menu', array($this, 'add_plugin_page'));
            add_action('admin_init', array($this, 'page_init'));

            function add_admin_iris_scripts()
            {

                wp_enqueue_script('wp-color-picker');
                wp_enqueue_style('wp-color-picker');


                wp_enqueue_style('syteg-plugin-script', plugins_url('css/ssp_style.min.css', __FILE__));
                wp_enqueue_script('plugin-script', plugins_url('js/plugin-script.js', __FILE__),
                    array('wp-color-picker'), false, 1);
            }

            add_action('admin_enqueue_scripts', 'add_admin_iris_scripts');
        }

        public function add_plugin_page()
        {
            // This page will be under "Settings"
            add_options_page(
                'Syteg SSP Services',
                'Syteg SSP',
                'manage_options',
                'syteg_ssp_services',
                array($this, 'create_admin_page')
            );
        }

        /**
         * Options page callback
         */
        public function create_admin_page()
        {
            // Set class property

            ?>
            <h2><?php _e('Setup Syteg SSP settings', 'syteg-ssp') ?></h2>


            <div class="inside">
                <?php settings_errors(); ?>

                <?php
                    if (isset($_GET['tab'])) {
                        $active_tab = $_GET['tab'];
                    } else {
                        $active_tab = 'syteg_ssp_chat_options';
                    }
                    $this->options = get_option($active_tab);

                ?>

                <h2 class="nav-tab-wrapper">
                    <a href="?page=syteg_ssp_services&tab=syteg_ssp_chat_options"
                       class="nav-tab <?php echo $active_tab == 'syteg_ssp_chat_options' ? 'nav-tab-active' : ''; ?>"><?php _e('Chat
                        setup', 'syteg-ssp') ?></a>
                    <a href="?page=syteg_ssp_services&tab=syteg_ssp_support"
                       class="nav-tab <?php echo $active_tab == 'syteg_ssp_support' ? 'nav-tab-active' : ''; ?>"><?php _e('Support', 'syteg-ssp') ?></a>
                </h2>
                <form method="post" action="options.php">


                    <?php

                        // This prints out all hidden setting fields
                        if ($active_tab == 'syteg_ssp_chat_options') {
                            SSPSettings::showSettings('syteg_ssp_chat_options', $this->options);
                            settings_fields('syteg_ssp_group');
//                          do_settings_sections( 'syteg_ssp_services' );

                        } elseif ($active_tab == 'syteg_ssp_tickets_options') {

                            settings_fields('syteg_ssp_group');
                            do_settings_sections('syteg_ssp_services');

                        } elseif ($active_tab == 'syteg_ssp_support') {

                            SSPSettings::showSettings('syteg_ssp_support');
                            settings_fields('syteg_ssp_group');
                        }


                    ?>
                </form>
            </div>
            <?php
        }

        /**
         * Register and add settings
         */
        public function page_init()
        {
            register_setting(
                'syteg_ssp_group', // Option group
                'syteg_ssp_chat_options', // Option name
                array($this, 'sanitize') // Sanitize
            );

            add_settings_section(
                'syteg_ssp_chat_section', // ID
                '', // Title
                array($this, 'print_section_info'), // Callback
                'syteg_ssp_services' // Page
            );



        }

        /**
         * Sanitize each setting field as needed
         *
         * @param array $input Contains all settings fields as array keys
         *
         * @return array
         */
        public function sanitize($input)
        {
            $new_input = array();

            foreach ($input as $key => $value) {

                if (isset($value)) {

                    if (is_array($value)) {

                        $new_input[$key] = $this->sanitize($value);

                    } elseif (is_string($value)) {


                        if($key == 'z-index') {
                            if( (int) $input[$key] == 0 ) {
                                $new_input[$key] = 'auto';
                            } else {
                                $new_input[$key] = (int) $value;
                            }
                        } else {
                            $new_input[$key] = preg_replace('/^(#)*/', '', $value);
                        }

                    } else {

                        $new_input[$key] = $value;

                    }

                }
            }


            return  $new_input;
        }


        /**
         * Print the Section text
         */
        public function print_section_info()
        {
            print '';  // Nothing to say here
        }

    }

    if (is_admin()) {
        $syteg = new SytegSSP();
    }


    add_action('wp_head', 'show_syteg_ssp_chat');


