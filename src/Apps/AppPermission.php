<?php

namespace CedricZiel\MattermostPhp\Apps;

enum AppPermission: string
{
    case act_as_bot = 'act_as_bot';
    case act_as_user = 'act_as_user';
    case remote_oauth2 = 'remote_oauth2';
    case remote_webhooks = 'remote_webhooks';
}
