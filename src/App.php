<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class App
{
    public function __construct(
        #[SerializedName('deploy_type')]
        protected readonly string $deploy_type,
        #[SerializedName('disabled')]
        protected readonly bool $disabled,
        #[SerializedName('secret')]
        protected readonly string $secret,
        #[SerializedName('webhook_secret')]
        protected readonly string $webhook_secret,
        #[SerializedName('bot_user_id')]
        protected readonly string $bot_user_id,
        #[SerializedName('bot_access_token')]
        protected readonly string $bot_username,
    ) {
    }
}
