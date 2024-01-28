<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateIncomingWebhookRequest
{
    public function __construct(
        /** Incoming webhook GUID */
        public string $id,
        /** The ID of a public channel or private group that receives the webhook payloads. */
        public string $channel_id,
        /** The display name for this incoming webhook */
        public string $display_name,
        /** The description for this incoming webhook */
        public string $description,
        /** The username this incoming webhook will post as. */
        public ?string $username = null,
        /** The profile picture this incoming webhook will use when posting. */
        public ?string $icon_url = null,
    ) {
    }
}
