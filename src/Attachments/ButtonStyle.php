<?php

namespace CedricZiel\MattermostPhp\Attachments;

/**
 * @see https://developers.mattermost.com/integrate/plugins/interactive-messages/#message-buttons
 */
enum ButtonStyle : string
{
    case primary = 'primary';
    case danger = 'danger';
    case default = 'default';
    case success = 'success';
}
