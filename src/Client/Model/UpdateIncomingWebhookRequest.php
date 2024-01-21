<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateIncomingWebhookRequest
{
    public function __construct(
        /** Incoming webhook GUID */
        public ?string $id = null,
        /** The ID of a public channel or private group that receives the webhook payloads. */
        public ?string $channel_id = null,
        /** The display name for this incoming webhook */
        public ?string $display_name = null,
        /** The description for this incoming webhook */
        public ?string $description = null,
        /** The username this incoming webhook will post as. */
        public ?string $username = null,
        /** The profile picture this incoming webhook will use when posting. */
        public ?string $icon_url = null,
    ) {
    }
}
