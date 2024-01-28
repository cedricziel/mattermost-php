<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class Channel
{
    public ?string $id;

    /** The time in milliseconds a channel was created */
    public ?int $create_at;

    /** The time in milliseconds a channel was last updated */
    public ?int $update_at;

    /** The time in milliseconds a channel was deleted */
    public ?int $delete_at;
    public ?string $team_id;
    public ?string $type;
    public ?string $display_name;
    public ?string $name;
    public ?string $header;
    public ?string $purpose;

    /** The time in milliseconds of the last post of a channel */
    public ?int $last_post_at;
    public ?int $total_msg_count;

    /** Deprecated in Mattermost 5.0 release */
    public ?int $extra_update_at;
    public ?string $creator_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->delete_at = $data['delete_at'];
        $this->team_id = $data['team_id'];
        $this->type = $data['type'];
        $this->display_name = $data['display_name'];
        $this->name = $data['name'];
        $this->header = $data['header'];
        $this->purpose = $data['purpose'];
        $this->last_post_at = $data['last_post_at'];
        $this->total_msg_count = $data['total_msg_count'];
        $this->extra_update_at = $data['extra_update_at'];
        $this->creator_id = $data['creator_id'];
        return $this;
    }
}
