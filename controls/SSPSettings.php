<?php

    /**
     * Class SettingsFactory
     * Creates Syteg SSP services settings structure from default settings template
     *
     */
    abstract class SSPSettings
    {

        /**
         * Returns instance of SSP services setup module
         *
         *
         * @param $module string
         * @param $databaseOptions array
         *
         * @return SSPSettings
         */
        public static function showSettings($module, $databaseOptions = null)
        {
            require_once 'modules/' . $module . '.php';

            return new $module($module, $databaseOptions);
        }

        /**
         * Get module settings if database settings not set, render settings dialogue
         *
         * @param $module string Filename with defaults module settings
         * @param $databaseOptions array
         *
         */
        function __construct($module, $databaseOptions)
        {

            $this->defaultSettings = require('defaults/' . $module . '.php');
            $savedSettings   = $databaseOptions;
            $settings        = $savedSettings ? $savedSettings :  $this->defaultSettings;
            $this->render($settings);

        }

        /**
         * Render HTML markup of settings dialogue
         *
         *
         * @param $settings
         *
         * @return mixed
         *
         */
        abstract function render($settings);


    }

