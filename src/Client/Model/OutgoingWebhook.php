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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new self(
            id: isset($data['id']) ? $data['id'] : null,
            create_at: isset($data['create_at']) ? $data['create_at'] : null,
            update_at: isset($data['update_at']) ? $data['update_at'] : null,
            delete_at: isset($data['delete_at']) ? $data['delete_at'] : null,
            creator_id: isset($data['creator_id']) ? $data['creator_id'] : null,
            team_id: isset($data['team_id']) ? $data['team_id'] : null,
            channel_id: isset($data['channel_id']) ? $data['channel_id'] : null,
            description: isset($data['description']) ? $data['description'] : null,
            display_name: isset($data['display_name']) ? $data['display_name'] : null,
            trigger_words: isset($data['trigger_words']) ? $data['trigger_words'] : null,
            trigger_when: isset($data['trigger_when']) ? $data['trigger_when'] : null,
            callback_urls: isset($data['callback_urls']) ? $data['callback_urls'] : null,
            content_type: isset($data['content_type']) ? $data['content_type'] : null,
        );
        return $object;
    }
}
