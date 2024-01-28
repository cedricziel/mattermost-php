<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class UpdateOutgoingWebhookRequest
{
    public function __construct(
        /** Outgoing webhook GUID */
        public string $id,
        /** The ID of a public channel or private group that receives the webhook payloads. */
        public string $channel_id,
        /** The display name for this incoming webhook */
        public string $display_name,
        /** The description for this incoming webhook */
        public string $description,
    ) {
    }
}
