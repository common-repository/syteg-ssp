<?php

    /**
     * Created by PhpStorm.
     * User: user
     * Date: 16.11.2017
     * Time: 13:13
     */
    class syteg_ssp_support extends SSPSettings
    {
        public function __construct($module, $databaseOptions)
        {
            parent::__construct($module, $databaseOptions);
        }

        public function render($settings)
        {
            // empty
        }

    }