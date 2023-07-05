<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
require_once(COMPONENTS_DIR."/header.php");
?>
<?php
class MessageHandler
{
    private $messages = [];

    public function addMessage($type, $message)
    {
        $this->messages[] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public function getMessages()
    {
        return $this->messages;
    }

    public function getMessagesJSON()
    {
        return json_encode($this->messages);
    }
}
?>
<style>
    /* Alert Message */
    .container {

        margin-top: 100px;
    }



    .alert.alert-general {
        background: #d9d9d9
    }

    .alert.alert-help {
        background: #91e3fd
    }

    .alert.alert-error {
        background: #f6bcc3
    }

    .alert .close,
    .info-box .close {
        filter: alpha(opacity=100);
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        -moz-opacity: 1;
        -khtml-opacity: 1;
        opacity: 1;
        font-weight: normal;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        text-shadow: none;
        float: none;
        position: absolute;
        top: 8px;
        right: 8px
    }

    .close:before {
        content: "\f00d";
        font-family: FontAwesome
    }

    .fa {
        color: #fff;
    }

    /* End Alert Message */
</style>
<script>
    class MessageHandlerJSON {
        constructor(jsonMessages) {
            this.messages = JSON.parse(jsonMessages);
        }

        displayMessages(containerId) {
            const container = document.getElementById(containerId);
            
            this.messages.forEach((message) => {
                const alert = document.createElement('div');
                const icon = document.createElement('i');
                const close = document.createElement('span');

                switch (message.type) {
                    case 'general':
                        alert.className = 'alert alert-general';
                        icon.className = 'fa fa-info';
                        break;
                    case 'error':
                        alert.className = 'alert alert-error';
                        icon.className = 'fa fa-columns';
                        break;
                    case 'help':
                        alert.className = 'alert alert-help';
                        icon.className = 'fa fa-columns';
                        break;
                    default:
                        break;
                }

                close.className = 'close';
                alert.appendChild(icon);
                alert.innerHTML += ` ${message.message}`;
                alert.appendChild(close);
                container.appendChild(alert);
            });
        }
    }

    // Delete message when clicking .close button
    $(document).ready(function() {
        $('#errorMessageContainer').on('click', '.close', function() {
            $(this).parent().remove();
        });
    });
</script>