<?php


    /**
     * Class syteg_ssp_chat_options
     * Crates contents of chat options tab
     *
     */
    class syteg_ssp_chat_options extends SSPSettings
    {
        /**
         * @var array Available positions fo c
         */
        protected $chatPositions = array(
            'bottom',
            'left',
            'right'
       );

        /**
         * Echoes input tag with name and saved parameter with options
         *
         * @param $name string Key of settings table
         * @param $value string Value of that key
         *
         * @return void
         */
        protected function renderColorPicker($name, $value)
        {
            echo "<input type=\"text\" name=\"syteg_ssp_chat_options[theme][{$name}]\" value=\"#{$value}\" class=\"syteg-color-picker\" data-target=\"{$name}\" />";
        }

        /**
         * Rendering chat settings form
         *
         * @param $settings mixed Default module settings or settings from database
         *
         * @return void
         */
        public function render($settings)
        {
            ?>
            <table class="ssp-chat-wordpress-setup">
                <tbody>
                <tr>
                    <td><?php _e('Enable', 'syteg-ssp') ?></td>
                    <td><input type="checkbox" name="syteg_ssp_chat_options[enable]" <?= array_key_exists('enable',
                            $settings) ? 'checked ' : '' ?>/></td>
                    <td rowspan="13">
                        <style type="text/css">
                            .ssp-chat-main {
                                background: #49576b;
                                padding: 0px 10px;
                                font: normal 14px Arial, Helvetica, sans-serif;
                                width: 290px;
                            }

                            .ssp-chat-main,
                            .ssp-chat-main *,
                            .ssp-chat-main *:before,
                            .ssp-chat-main *:after {
                                box-sizing: content-box;
                            }

                            .ssp-chat-main label {
                                display: inline;
                                font-weight: inherit;
                                margin: 0px;
                            }

                            .ssp-chat-rounded {
                                position: relative;
                            }

                            .ssp-chat-minimized,
                            .ssp-chat-floating {
                                display: inline-block;
                                vertical-align: bottom;
                                margin-left: 0;
                                width: 270px;
                                border-radius: 9px 9px 0px 0px;
                                box-shadow: 0px 1px 4px 0px #565656;
                            }

                            .ssp-chat-attach-left.ssp-chat-minimized,
                            .ssp-chat-attach-left.ssp-chat-floating {
                                left: 0px;
                                top: 100px;
                                border-radius: 0px 9px 9px 0px;
                            }

                            .ssp-chat-attach-left.ssp-chat-minimized {
                                -ms-transform: rotate(90deg);
                                -ms-transform-origin: 0% 100%;
                                transform: rotate(90deg);
                                transform-origin: 0% 100%;
                                border-radius: 9px 9px 0px 0px;
                            }

                            .ssp-chat-attach-right.ssp-chat-minimized,
                            .ssp-chat-attach-right.ssp-chat-floating {
                                right: 0px;
                                top: 100px;
                                border-radius: 9px 0px 0px 9px;
                            }

                            .ssp-chat-attach-right.ssp-chat-minimized {
                                -ms-transform: rotate(270deg);
                                -ms-transform-origin: 100% 100%;
                                transform: rotate(270deg);
                                transform-origin: 100% 100%;
                                border-radius: 9px 9px 0px 0px;
                            }

                            .ssp-chat-attach-bottom.ssp-chat-minimized,
                            .ssp-chat-attach-bottom.ssp-chat-floating {
                                right: 100px;
                                bottom: 0px;
                            }

                            .ssp-chat-window-title {
                                height: 64px;
                            }

                            .ssp-chat-window-title-line {
                                height: 3px;
                                background-color: #00aeef;
                            }

                            .ssp-chat-title-buttons {
                                float: right;
                                margin: 17px 10px 0px 0px;
                            }

                            .ssp-chat-title-buttons a {
                                opacity: 0.3;
                                margin: 0px 0px 0px 5px;
                            }

                            .ssp-chat-title-buttons a:hover {
                                opacity: 1;
                            }

                            .ssp-chat-title-buttons .ssp-chat-enabled .ssp-chat-disabled {
                                display: none;
                            }

                            .ssp-chat-title-buttons .ssp-chat-disabled .ssp-chat-enabled {
                                display: none;
                            }

                            .ssp-chat-title-buttons a {
                                display: none;
                            }

                            .ssp-chat-floating .ssp-chat-title-buttons a.ssp-chat-floating-only {
                                display: inline;
                            }

                            .ssp-chat-active .ssp-chat-title-buttons a.ssp-chat-active-only {
                                display: inline;
                            }

                            .ssp-chat-agent-avatar {
                                float: left;
                                margin: 9px 0px 0px 2px;
                                width: 40px;
                                height: 40px;
                                border-radius: 20px;
                                background: url(https://call-center.syteg.com/new/img/av2.png) center center no-repeat;
                                background-size: cover;
                            }

                            .ssp-chat-agent-name {
                                margin: 16px 95px 0px 52px;
                                color: #ffffff;
                                font-size: 14px;
                                overflow: hidden;
                                min-width: 123px;
                            }

                            .ssp-chat-agent-status {
                                position: absolute;
                                margin: 38px 0px 0px 32px;
                                font-size: 14px;
                                width: 7px;
                                height: 7px;
                                border-radius: 4px;
                                padding: 1px;
                                background-color: #ffffff;
                            }

                            .ssp-chat-offline .ssp-chat-agent-status {
                                display: none;
                            }

                            .ssp-chat-agent-status-online {
                                background: url('https://call-center.syteg.com/new/img/widgets/online.png') left center no-repeat;
                                width: 7px;
                                height: 7px;
                            }

                            .ssp-chat-agent-status-offline {
                                background: url('https://call-center.syteg.com/new/img/widgets/offline.png') left center no-repeat;
                                width: 7px;
                                height: 7px;
                            }

                            .ssp-chat-agent-status-online,
                            .ssp-chat-agent-status-offline {
                                display: none;
                            }

                            .ssp-chat-online .ssp-chat-agent-status-online {
                                display: block;
                            }

                            .ssp-chat-offline .ssp-chat-agent-status-offline {
                                display: block;
                            }

                            .ssp-chat-loading {
                                display: none;
                                background: transparent url(https://call-center.syteg.com/new/img/widgets/transparent.png) repeat;
                                z-index: 10000;
                            }

                            .ssp-chat-login-form,
                            .ssp-chat-message-form {
                                margin: 0px auto;
                                max-width: 300px;
                                padding: 22px 15px;
                                background-color: #ffffff;
                                border-radius: 0px 9px 0px 0px;
                            }

                            .ssp-chat-login-info {
                                margin-bottom: 8px;
                                padding: 0px 2px 15px 2px;
                                border-bottom: 1px solid #e2e2e2;
                                color: #7d7d7d;
                                font-size: 15px;
                            }

                            .ssp-chat-login-field {
                                padding: 5px 6px 5px 3px;
                                min-height: 30px;
                            }

                            .ssp-chat-login-field-label {
                                float: left;
                                text-align: left;
                                line-height: 30px;
                            }

                            .ssp-chat-login-input {
                                float: right;
                                background-color: #e6e6e6;
                                background: linear-gradient(to bottom, #d9d9d9 0%, #ececec 100%) !important;
                                padding: 1px;
                                border-radius: 4px;
                            }

                            .ssp-chat-login-input input {
                                border-width: 1px 0px 0px 0px;
                                border-style: solid;
                                border-color: #f3f3f3;
                                background-color: #fafafa;
                                border-radius: 4px;
                                width: 131px;
                                height: 25px;
                                padding: 1px 5px;
                            }

                            .ssp-chat-login-input .error {
                                background-color: #ffdddd;
                            }

                            .ssp-chat-login-textarea {
                                background-color: #e6e6e6;
                                background: linear-gradient(to bottom, #d9d9d9 0%, #ececec 100%) !important;
                                padding: 1px;
                                border-radius: 4px;
                            }

                            .ssp-chat-login-textarea textarea {
                                border-width: 1px 0px 0px 0px;
                                border-style: solid;
                                border-color: #f3f3f3;
                                background-color: #fafafa;
                                border-radius: 4px;
                                box-sizing: border-box;
                                margin: 0px;
                                width: 100%;
                                height: 100px;
                                padding: 1px 5px;
                            }

                            .ssp-chat-login-button {
                                margin: 15px auto;
                                text-align: center;
                            }

                            .ssp-chat-login-button input {
                                width: 230px;
                                height: 48px;
                                padding: 0px;
                                border-width: 1px;
                                border-style: solid;
                                border-color: #62b306;
                                border-radius: 5px;
                                background-color: #62b306;
                                box-shadow: #cccccc 0px 1px 3px;
                                font-size: 15px;
                                font-weight: bold;
                                color: #ffffff;
                                /*text-transform: uppercase;*/
                                cursor: pointer;
                            }

                            .ssp-chat-login-button input:hover {

                            }

                            .ssp-chat-login-button input:active {

                            }

                            .ssp-chat-dialog {
                                position: relative;
                                border-radius: 0px 9px 0px 0px;
                                background-color: #ffffff;
                                padding-bottom: 1px;
                            }

                            .ssp-chat-messages {
                                height: 234px;
                                overflow: auto;
                                padding: 5px;
                            }

                            .ssp-chat-messages a {
                                color: inherit;
                                text-decoration: underline;
                            }

                            .ssp-chat-message,
                            .ssp-chat-file {
                                margin: 8px 0px;
                            }

                            .ssp-chat-incoming-message {
                                text-align: left;
                            }

                            .ssp-chat-incoming-message .ssp-chat-message-cloud {
                                margin: 0px 6px;
                                border-radius: 12px;
                                padding: 12px;
                                background-color: #00aeef;
                                text-align: left;
                                color: #ffffff;
                                display: inline-block;
                                *display: inline;
                                zoom: 1;
                                max-width: 85%;
                                position: relative;
                            }

                            .ssp-chat-incoming-message .ssp-chat-message-cloud-tail {
                                position: absolute;
                                left: -6px;
                                border-radius: 0px 0px 8px 0px;
                                background-color: #00aeef;
                                width: 12px;
                                height: 12px;
                            }

                            .ssp-chat-incoming-message .ssp-chat-message-cloud-tail div {
                                border-radius: 0px 0px 12px 0px;
                                background-color: #ffffff;
                                width: 6px;
                                height: 12px;
                            }

                            .ssp-chat-outgoing-message {
                                text-align: right;
                            }

                            .ssp-chat-outgoing-message .ssp-chat-message-cloud {
                                margin: 0px 6px;
                                border-radius: 12px;
                                padding: 12px;
                                background-color: #f1f1f1;
                                text-align: left;
                                color: #363636;
                                display: inline-block;
                                *display: inline;
                                zoom: 1;
                                max-width: 85%;
                                position: relative;
                            }

                            .ssp-chat-outgoing-message .ssp-chat-message-cloud-tail {
                                position: absolute;
                                right: -6px;
                                border-radius: 0px 0px 0px 8px;
                                background-color: #f1f1f1;
                                width: 12px;
                                height: 12px;
                            }

                            .ssp-chat-outgoing-message .ssp-chat-message-cloud-tail div {
                                margin-left: 6px;
                                border-radius: 0px 0px 0px 12px;
                                background-color: #ffffff;
                                width: 6px;
                                height: 12px;
                            }

                            .ssp-chat-time {
                                margin-top: 15px;
                                color: #c2c5cb;
                                font-size: 12px;
                            }

                            .ssp-chat-incoming-message .ssp-chat-time {
                                float: right;
                            }

                            .ssp-chat-outgoing-message .ssp-chat-time {
                                float: left;
                            }

                            .ssp-chat-info {
                                font-style: italic;
                                color: #363636;
                            }

                            .ssp-chat-info .ssp-chat-time {
                                margin-top: 0px;
                                font-style: normal;
                                text-align: right;
                            }

                            .ssp-chat-typing {
                                position: absolute;
                                margin: -8px 0px 0px 16px;
                                font-size: 12px;
                                color: #363636;
                            }

                            .ssp-chat-input-buttons {
                                position: absolute;
                                right: 0px;
                                margin: 20px 20px 0px 0px;
                            }

                            .ssp-chat-input-buttons a {
                                opacity: 0.3;
                            }

                            .ssp-chat-input-buttons a:hover {
                                opacity: 1;
                            }

                            .ssp-chat-file-upload {
                                position: relative;
                            }

                            .ssp-chat-file-upload-form {
                                margin: 0px;
                                position: absolute;
                                bottom: -10px;
                                right: 1px;
                                border: 1px solid #d0d0da;
                                border-radius: 10px;
                                padding: 20px;
                                background-color: #ffffff;
                                box-shadow: 0px 1px 3px 0px #cccccc;
                            }

                            .ssp-chat-file-upload-form-corner {
                                position: absolute;
                                bottom: -20px;
                                right: 19px;
                            }

                            .ssp-chat-file-upload-title {
                                padding: 5px 6px 5px 3px;
                                line-height: 20px;
                                font-size: 15px;
                                color: #7d7d7d;
                            }

                            .ssp-chat-file-upload-field {
                                padding: 5px 6px 5px 3px;
                                width: 217px;
                                height: 30px;
                                line-height: 30px;
                            }

                            .ssp-chat-file-upload-field-label {
                                float: left;
                                text-align: left;
                            }

                            .ssp-chat-file-upload-input {
                                float: right;
                                width: 130px;
                                overflow: hidden;
                            }

                            .ssp-chat-file-upload-input label {
                                color: #1ec0ec;
                                text-decoration: underline;
                                display: block;
                                overflow: hidden;
                                height: 30px;
                                cursor: pointer;
                            }

                            .ssp-chat-file-upload-input select {
                                box-sizing: border-box;
                                width: 130px;
                                height: 24px;
                                margin: 3px 0px;
                            }

                            .ssp-chat-file-upload-input input {
                                width: 1px;
                                height: 1px;
                                visibility: hidden;
                            }

                            .ssp-chat-progressbar {
                                margin: 5px 0px;
                                background-color: #ffffff;
                                border-radius: 2px;
                            }

                            .ssp-chat-progressbar div {
                                height: 5px;
                                border-radius: 2px;
                                background-color: #007ce8;
                                background: linear-gradient(to bottom, #0082f3 0%, #0073d8 100%) !important;
                            }

                            .ssp-chat-buttons {
                                text-align: right;
                            }

                            .ssp-chat-button-cancel,
                            .ssp-chat-button-download {
                                display: inline-block;
                                padding: 5px;
                                overflow: hidden;
                            }

                            .ssp-chat-button-download div {
                                position: absolute;
                                opacity: 0;
                                min-width: 64px;
                                min-height: 16px;
                                cursor: pointer;
                            }

                            .ssp-chat-outgoing-file .ssp-chat-button-download {
                                display: none;
                            }

                            .ssp-chat-message-input {
                                position: static !important;
                                margin: 11px;
                                background-color: #e6e6e6;
                                background: linear-gradient(to bottom, #d9d9d9 0%, #ececec 100%) !important;
                                padding: 1px;
                                border-radius: 4px;
                                overflow: hidden;
                            }

                            .ssp-chat-message-input textarea {
                                position: static !important;
                                margin: 0px !important;
                                border-width: 1px 0px 0px 0px;
                                border-style: solid;
                                border-color: #f3f3f3;
                                background-color: #fafafa;
                                border-radius: 4px;
                                padding: 5px 30px 5px 5px;
                                box-sizing: border-box;
                                width: 100%;
                                height: 30px;
                                line-height: 17px;
                                resize: vertical;
                                overflow: hidden;
                            }

                            .ssp-chat-end {
                                position: relative;
                                border-radius: 0px 9px 0px 0px;
                                background-color: #ffffff;
                                padding: 1px;
                            }

                            .ssp-chat-rate,
                            .ssp-chat-transcript {
                                margin: 20px;
                                text-align: center;
                            }

                            .ssp-chat-rate form,
                            .ssp-chat-transcript form {
                                margin-top: 5px;
                                text-align: center;
                            }

                            .ssp-chat-window-minimized {
                                height: 34px;
                            }

                            .ssp-chat-minimized .ssp-chat-title-buttons,
                            .ssp-chat-minimized .ssp-chat-agent-avatar,
                            .ssp-chat-minimized .ssp-chat-agent-name,
                            .ssp-chat-minimized .ssp-chat-agent-status,
                            .ssp-chat-minimized .ssp-chat-content,
                            .ssp-chat-maximized .ssp-chat-title-caption,
                            .ssp-chat-floating .ssp-chat-title-caption {
                                display: none;
                            }

                            .ssp-chat-minimized .ssp-chat-window-title {
                                height: 34px;
                            }

                            .ssp-chat-title-caption {
                                display: block;
                                margin-left: 4px;
                                color: #ffffff;
                                font-size: 14px;
                                line-height: 31px;
                                background: url(https://call-center.syteg.com/new/img/widgets/logo.png) right center no-repeat;
                                cursor: pointer;
                            }
                        </style>
                        <div class="ssp-item-embed ssp-chat-main ssp-chat-rounded ssp-chat-floating ssp-chat-online"
                             data-name-background="main-bg"
                        >
                            <div class="ssp-chat-window-title">
                                <div class="ssp-chat-window-title-line" data-name-background="title-line"
                                ></div>
                                <div class="ssp-chat-title-buttons"><a
                                            href="#sound" class="ssp-chat-active-only ssp-chat-enabled"
                                    ><img class="ssp-chat-enabled"
                                          src="https://call-center.syteg.com/new/img/widgets/sound-on.png"
                                          alt=""
                                        ><img
                                                class="ssp-chat-disabled"
                                                src="https://call-center.syteg.com/new/img/widgets/sound-off.png" alt=""
                                        ></a><a href="#print"
                                                class="ssp-chat-active-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/print.png" alt=""
                                        ></a><a href="#minimize"
                                                class="ssp-chat-floating-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/minimize.png" alt=""
                                        ></a><a href="#detach"
                                                class="ssp-chat-floating-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/detach.png" alt=""
                                        ></a><a href="#close"
                                                class="ssp-chat-floating-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/close.png" alt=""
                                        ></a></div>
                                <div class="ssp-chat-agent-avatar"></div>
                                <div class="ssp-chat-agent-status">
                                    <div class="ssp-chat-agent-status-online"
                                    ></div>
                                    <div class="ssp-chat-agent-status-offline"
                                    ></div>
                                </div>
                                <div class="ssp-chat-agent-name" data-name-color="agent-name"><?php $current_user = wp_get_current_user(); echo $current_user->user_login; ?>
                                </div>
                                <div class="ssp-chat-title-caption">online
                                    chat
                                </div>
                            </div>
                            <div class="ssp-chat-content">
                                <div class="ssp-chat-login-form ssp-chat-rounded"
                                >
                                    <div class="ssp-chat-login-info">
                                        <?php _e('Please enter your name and chat title', 'syteg-ssp') ?>
                                    </div>
                                    <div class="ssp-chat-login-field">
                                        <label>
                                            <div class="ssp-chat-login-field-label"
                                            ><?php _e('Your name', 'syteg-ssp') ?>:
                                            </div>
                                            <div class="ssp-chat-login-input ssp-chat-rounded"
                                            ><input
                                                        class="ssp-chat-rounded" type="text" name="name" value=""
                                                ></div>
                                        </label></div>
                                    <div class="ssp-chat-login-field">
                                        <label>
                                            <div class="ssp-chat-login-field-label"
                                            ><?php _e('E-Mail', 'syteg-ssp') ?>:
                                            </div>
                                            <div class="ssp-chat-login-input ssp-chat-rounded"
                                            ><input
                                                        class="ssp-chat-rounded" type="text" name="email" value=""
                                                ></div>
                                        </label></div>
                                    <div class="ssp-chat-login-field">
                                        <label>
                                            <div class="ssp-chat-login-field-label"
                                            ><?php _e('Subject', 'syteg-ssp') ?>:
                                            </div>
                                            <div class="ssp-chat-login-input ssp-chat-rounded"
                                            ><input
                                                        class="ssp-chat-rounded" type="text" name="title" value=""
                                                ></div>
                                        </label></div>
                                    <div class="ssp-chat-login-button">
                                        <input class="ssp-chat-rounded" type="submit" value="<?php _e('START CHAT', 'syteg-ssp') ?>"
                                               data-name-background="start-bg" data-name-color="start" data-name-border="start-border"
                                        ></div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="ssp-item-embed ssp-chat-main ssp-chat-rounded ssp-chat-floating ssp-chat-online" data-name-background="main-bg">
                            <div class="ssp-chat-window-title">
                                <div class="ssp-chat-window-title-line"  data-name-background="title-line"
                                ></div>
                                <div class="ssp-chat-title-buttons"><a
                                            href="#sound" class="ssp-chat-active-only ssp-chat-enabled"
                                    ><img class="ssp-chat-enabled"
                                          src="https://call-center.syteg.com/new/img/widgets/sound-on.png"
                                          alt=""
                                        ><img
                                                class="ssp-chat-disabled"
                                                src="https://call-center.syteg.com/new/img/widgets/sound-off.png" alt=""
                                        ></a><a href="#print"
                                                class="ssp-chat-active-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/print.png" alt=""
                                        ></a><a href="#minimize"
                                                class="ssp-chat-floating-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/minimize.png" alt=""
                                        ></a><a href="#detach"
                                                class="ssp-chat-floating-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/detach.png" alt=""
                                        ></a><a href="#close"
                                                class="ssp-chat-floating-only"
                                    ><img
                                                src="https://call-center.syteg.com/new/img/widgets/close.png" alt=""
                                        ></a></div>
                                <div class="ssp-chat-agent-avatar"></div>
                                <div class="ssp-chat-agent-status">
                                    <div class="ssp-chat-agent-status-online"
                                    ></div>
                                    <div class="ssp-chat-agent-status-offline"
                                    ></div>
                                </div>
                                <div class="ssp-chat-agent-name" data-name-color="agent-name"><?php echo $current_user->user_login; ?>
                                </div>
                                <div class="ssp-chat-title-caption">online
                                    chat
                                </div>
                            </div>
                            <div class="ssp-chat-content">
                                <div class="ssp-chat-dialog">
                                    <div class="ssp-chat-messages">
                                        <div class="ssp-chat-info ssp-chat-rounded"
                                        >
                                            <div class="ssp-chat-time"
                                            >16:17
                                            </div>
                                            <div>User entered the
                                                chat
                                            </div>
                                        </div>
                                        <div class="ssp-chat-message ssp-chat-incoming-message ssp-chat-rounded"
                                        >
                                            <div class="ssp-chat-time"
                                            >16:17
                                            </div>
                                            <div class="ssp-chat-message-cloud ssp-chat-rounded"  data-name-background="message-in-bg" data-name-color="message-in"
                                            >
                                                <div><?php _e('Hello!', 'syteg-ssp') ?></div>
                                                <div>
                                                    <div class="ssp-chat-message-cloud-tail ssp-chat-rounded"  data-name-background="message-in-bg" data-name-color="message-in"
                                                    >
                                                        <div class="ssp-chat-rounded"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ssp-chat-message ssp-chat-outgoing-message ssp-chat-rounded"
                                        >
                                            <div class="ssp-chat-time"
                                            >16:17
                                            </div>
                                            <div class="ssp-chat-message-cloud ssp-chat-rounded"  data-name-background="message-out-bg" data-name-color="message-out"
                                            >
                                                <div><?php _e('Welcome to our site! How can I help you?', 'syteg-ssp') ?>
                                                </div>
                                                <div>
                                                    <div class="ssp-chat-message-cloud-tail ssp-chat-rounded"  data-name-background="message-out-bg" data-name-color="message-out"
                                                    >
                                                        <div class="ssp-chat-rounded"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ssp-chat-message ssp-chat-incoming-message ssp-chat-rounded"
                                        >
                                            <div class="ssp-chat-time"
                                            >16:17
                                            </div>
                                            <div class="ssp-chat-message-cloud ssp-chat-rounded"  data-name-background="message-in-bg" data-name-color="message-in"
                                            >
                                                <div><?php _e('I want to buy some cookies', 'syteg-ssp') ?>
                                                </div>
                                                <div>
                                                    <div class="ssp-chat-message-cloud-tail ssp-chat-rounded"  data-name-background="message-in-bg" data-name-color="message-in"
                                                    >
                                                        <div class="ssp-chat-rounded"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ssp-chat-message ssp-chat-outgoing-message ssp-chat-rounded"
                                        >
                                            <div class="ssp-chat-time"
                                            >16:17
                                            </div>
                                            <div class="ssp-chat-message-cloud ssp-chat-rounded"   data-name-background="message-out-bg" data-name-color="message-out"
                                            >
                                                <div><?php _e('Check out our gift packs - they are the #1 choice for holidays!', 'syteg-ssp') ?>
                                                </div>
                                                <div>
                                                    <div class="ssp-chat-message-cloud-tail ssp-chat-rounded"   data-name-background="message-out-bg" data-name-color="message-out"
                                                    >
                                                        <div class="ssp-chat-rounded"
                                                        ></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ssp-chat-typing"></div>
                                    <div class="ssp-chat-input-buttons"><a
                                                href="#send-file"><img
                                                    src="https://call-center.syteg.com/new/img/widgets/send-file.png"
                                                    alt=""
                                            ></a></div>
                                    <div class="ssp-chat-message-input ssp-chat-rounded"
                                    ><textarea
                                                class="ssp-chat-input ssp-chat-rounded"
                                        ></textarea></div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Chatline ID', 'syteg-ssp') ?></td>
                    <td><input type="text" name="syteg_ssp_chat_options[chatline]"
                               value="<?= ! empty($settings['chatline']) ? $settings['chatline'] : '' ?>" required aria-required="true" /></td>
                </tr>
                <tr>
                    <td><?php _e('Chat widget alignment', 'syteg-ssp') ?></td>
                    <td><select name="syteg_ssp_chat_options[theme][align]" id="">
                            <?php foreach ($this->chatPositions as $position) {

                                echo "<option value=\"{$position}\" " . ($settings['theme']['align'] == $position ? " selected aria-selected='true'" : "") . ">" . __( ucfirst($position) ) . "</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td><?php _e('Chat z-index (layer position)', 'syteg-ssp') ?><abbr title="<?php _e('(auto/number) Use this setting, if your widget is overlapped by other page elements.') ?>" class="dashicons dashicons-info"></abbr></td>
                    <td><input name="syteg_ssp_chat_options[theme][z-index]" value="<?php echo array_key_exists('z-index', $settings['theme']) ? $settings['theme']['z-index'] :  $this->defaultSettings['theme']['z-index'] ?>" id="" /></td>
                </tr>
                <tr>`
                    <td><?php _e('Chat frame color', 'syteg-ssp') ?></td>
                    <td>
                        <?php
                            $this->renderColorPicker('main-bg',
                                array_key_exists('main-bg', $settings['theme']) ? $settings['theme']['main-bg'] : $this->defaultSettings['theme']['main-bg']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Top line color', 'syteg-ssp') ?></td>
                    <td>
                        <?php

                            $this->renderColorPicker('title-line',
                                array_key_exists('title-line', $settings['theme']) ? $settings['theme']['title-line'] : $this->defaultSettings['theme']['title-line']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Agent name color', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('agent-name',
                            array_key_exists('agent-name', $settings['theme']) ? $settings['theme']['agent-name'] : $this->defaultSettings['theme']['agent-name']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Button background', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('start-bg',
                            array_key_exists('start-bg', $settings['theme']) ? $settings['theme']['start-bg'] : $this->defaultSettings['theme']['start-bg']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Button border', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('start-border',
                            array_key_exists('start-border', $settings['theme']) ? $settings['theme']['start-border'] : $this->defaultSettings['theme']['start-border']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Button text', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('start',
                            array_key_exists('start', $settings['theme']) ? $settings['theme']['start'] : $this->defaultSettings['theme']['start']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Incoming message background', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('message-in-bg',
                            array_key_exists('message-in-bg', $settings['theme']) ? $settings['theme']['message-in-bg'] : $this->defaultSettings['theme']['message-in-bg']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Incoming message text color', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('message-in',
                            array_key_exists('message-in', $settings['theme']) ? $settings['theme']['message-in'] : $this->defaultSettings['theme']['message-in']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Outgoing message background', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('message-out-bg',
                            array_key_exists('message-out-bg', $settings['theme']) ? $settings['theme']['message-out-bg'] : $this->defaultSettings['theme']['message-out-bg']) ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Outgoing message text color', 'syteg-ssp') ?></td>
                    <td>
                        <?php $this->renderColorPicker('message-out',
                            array_key_exists('message-out', $settings['theme']) ? $settings['theme']['message-out'] : $this->defaultSettings['theme']['message-out']) ?>
                    </td>
                </tr>
                </tbody>
            </table>

            <?php
            wp_nonce_field("syteg_settings_group-options");
            submit_button();
        }
    }