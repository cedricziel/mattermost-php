<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OutgoingWebhook
{
    public function __construct(
        /** The unique identifier for this outgoing webhook */
        public ?string $id = null,
        /** The time in milliseconds a outgoing webhook was created */
        public ?int $create_at = null,
        /** The time in milliseconds a outgoing webhook was last updated */
        public ?int $update_at = null,
        /** The time in milliseconds a outgoing webhook was deleted */
        public ?int $delete_at = null,
        /** The Id of the user who created the webhook */
        public ?string $creator_id = null,
        /** The ID of the team that the webhook watchs */
        public ?string $team_id = null,
        /** The ID of a public channel that the webhook watchs */
        public ?string $channel_id = null,
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
        public ?string $content_type = 'application/x-www-form-urlencoded',
    ) {
    }

    public function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        if ($data === null) return $this;
        /** @var string $data['id'] */
            if (isset($data['id'])) $this->id = $data['id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var int $data['delete_at'] */
            if (isset($data['delete_at'])) $this->delete_at = $data['delete_at'];
        /** @var string $data['creator_id'] */
            if (isset($data['creator_id'])) $this->creator_id = $data['creator_id'];
        /** @var string $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var string $data['channel_id'] */
            if (isset($data['channel_id'])) $this->channel_id = $data['channel_id'];
        /** @var string $data['description'] */
            if (isset($data['description'])) $this->description = $data['description'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var array $data['trigger_words'] */
            if (isset($data['trigger_words'])) $this->trigger_words = $data['trigger_words'];
        /** @var int $data['trigger_when'] */
            if (isset($data['trigger_when'])) $this->trigger_when = $data['trigger_when'];
        /** @var array $data['callback_urls'] */
            if (isset($data['callback_urls'])) $this->callback_urls = $data['callback_urls'];
        /** @var string $data['content_type'] */
            if (isset($data['content_type'])) $this->content_type = $data['content_type'];
        return $this;
    }
}
