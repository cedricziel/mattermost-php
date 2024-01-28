<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class OutgoingWebhook
{
    /** The unique identifier for this outgoing webhook */
    public ?string $id;

    /** The time in milliseconds a outgoing webhook was created */
    public ?int $create_at;

    /** The time in milliseconds a outgoing webhook was last updated */
    public ?int $update_at;

    /** The time in milliseconds a outgoing webhook was deleted */
    public ?int $delete_at;

    /** The Id of the user who created the webhook */
    public ?string $creator_id;

    /** The ID of the team that the webhook watchs */
    public ?string $team_id;

    /** The ID of a public channel that the webhook watchs */
    public ?string $channel_id;

    /** The description for this outgoing webhook */
    public ?string $description;

    /** The display name for this outgoing webhook */
    public ?string $display_name;

    /** List of words for the webhook to trigger on */
    public ?array $trigger_words;

    /** When to trigger the webhook, `0` when a trigger word is present at all and `1` if the message starts with a trigger word */
    public ?int $trigger_when;

    /** The URLs to POST the payloads to when the webhook is triggered */
    public ?array $callback_urls;

    /** The format to POST the data in, either `application/json` or `application/x-www-form-urlencoded` */
    public ?string $content_type;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->creator_id = $data['creator_id'];
        $this->team_id = $data['team_id'];
        $this->channel_id = $data['channel_id'];
        $this->description = $data['description'];
        $this->display_name = $data['display_name'];
        $this->trigger_words = $data['trigger_words'];
        $this->trigger_when = $data['trigger_when'];
        $this->callback_urls = $data['callback_urls'];
        $this->content_type = $data['content_type'];
        return $this;
    }
}
