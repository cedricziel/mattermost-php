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
}
