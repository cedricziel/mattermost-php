<?php

namespace CedricZiel\MattermostPhp;

use Symfony\Component\Serializer\Attribute\SerializedName;

class App
{
    public function __construct(
        #[SerializedName('app_id')]
        protected readonly ?string $app_id = null,
        #[SerializedName('bot_user_id')]
        protected readonly ?string $bot_user_id = null,
        #[SerializedName('bot_username')]
        protected readonly ?string $bot_username = null,
        #[SerializedName('deploy_type')]
        protected readonly ?string $deploy_type = null,
        #[SerializedName('disabled')]
        protected readonly ?bool $disabled = null,
        #[SerializedName('secret')]
        protected readonly ?string $secret = null,
        #[SerializedName('webhook_secret')]
        protected readonly ?string $webhook_secret = null,
    ) {
    }
}
