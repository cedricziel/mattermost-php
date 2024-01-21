<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class CreateOutgoingWebhookRequest
{
    public function __construct(
        /** The ID of the team that the webhook watchs */
        public ?string $team_id = null,
        /** The ID of a public channel that the webhook watchs */
        public ?string $channel_id = null,
        /** The ID of the owner of the webhook if different than the requester. Required in [local mode](https://docs.mattermost.com/administration/mmctl-cli-tool.html#local-mode). */
        public ?string $creator_id = null,
        /** The description for this outgoing webhook */
        public ?string $description = null,
        /** The display name for this outgoing webhook */
        public ?string $display_name = null,
        /** List of words for the webhook to trigger on */
        public ?array $trigger_words = null,
        /** When to trigger the webhook, `0` when a trigger word is present at all and `1` if the message starts with a trigger word */
        public ?int $trigger_when = null,
        /** The URLs to POST the payloads to when the webhook is triggered */
        public ?array $callback_urls = null,
        /** The format to POST the data in, either `application/json` or `application/x-www-form-urlencoded` */
        public ?string $content_type = null,
    ) {
    }
}
