<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SharedChannel
{
    /** Channel id of the shared channel */
    public ?string $id;
    public ?string $team_id;

    /** Is this the home cluster for the shared channel */
    public ?bool $home;

    /** Is this shared channel shared as read only */
    public ?bool $readonly;

    /** Channel name as it is shared (may be different than original channel name) */
    public ?string $name;

    /** Channel display name as it appears locally */
    public ?string $display_name;
    public ?string $purpose;
    public ?string $header;

    /** Id of the user that shared the channel */
    public ?string $creator_id;

    /** Time in milliseconds that the channel was shared */
    public ?int $create_at;

    /** Time in milliseconds that the shared channel record was last updated */
    public ?int $update_at;

    /** Id of the remote cluster where the shared channel is homed */
    public ?string $remote_id;

    public function hydrate(
        /** @param array<string, mixed> $data */
        array $data,
    ): static
    {
        $this->id = $data['id'];
        $this->team_id = $data['team_id'];
        $this->home = $data['home'];
        $this->readonly = $data['readonly'];
        $this->name = $data['name'];
        $this->display_name = $data['display_name'];
        $this->purpose = $data['purpose'];
        $this->header = $data['header'];
        $this->creator_id = $data['creator_id'];
        $this->create_at = $data['create_at'];
        $this->update_at = $data['update_at'];
        $this->remote_id = $data['remote_id'];
        return $this;
    }
}
