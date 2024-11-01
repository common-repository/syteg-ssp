<?php
    require_once 'controls/SSPSettings.php';


    /**
     *
     * Add chat code before wp_head()
     * @uses wp_head()
     *
     */
    function show_syteg_ssp_chat()
    {

        $my_options = get_option('syteg_ssp_chat_options');

        if ($my_options && array_key_exists('enable', $my_options)) {

            $my_options = json_encode($my_options);
            $my_options = trim($my_options, '{}') . '}';
            echo <<<CHAT_WIDGET
<script type="text/javascript" src="https://call-center.syteg.com/chat-plugin.js"></script>

<script type="text/javascript">
(function() {
window.chat = new SSPChatPlugin({
    "lang": {
        "enter-your-name": "Please enter your name and chat title",
        "support-not-available": "Online Support is currently not available. Please leave a message",
        "name-label": "Your name:",
        "email-label": "E-Mail:",
        "subject-label": "Subject:",
        "start-chat": "START CHAT",
        "send": "SEND",
        "conversation-end": "Was this conversation helpful?",
        "send-transcript": "You can receive a copy of this chat session to your e-mail address"
    },
    $my_options
    
});

chat.onDetach = function () {
    chat.hide(true);
};

chat.onClose = function () {
    chat.show();
    chat.minimize(true);
};
})();
</script>
CHAT_WIDGET;

        }

    }