<?php

namespace CedricZiel\MattermostPhp\Client\Model;

class SharedChannel
{
    public function __construct(
        /** Channel id of the shared channel */
        public ?string $id = null,
        public ?string $team_id = null,
        /** Is this the home cluster for the shared channel */
        public ?bool $home = null,
        /** Is this shared channel shared as read only */
        public ?bool $readonly = null,
        /** Channel name as it is shared (may be different than original channel name) */
        public ?string $name = null,
        /** Channel display name as it appears locally */
        public ?string $display_name = null,
        public ?string $purpose = null,
        public ?string $header = null,
        /** Id of the user that shared the channel */
        public ?string $creator_id = null,
        /** Time in milliseconds that the channel was shared */
        public ?int $create_at = null,
        /** Time in milliseconds that the shared channel record was last updated */
        public ?int $update_at = null,
        /** Id of the remote cluster where the shared channel is homed */
        public ?string $remote_id = null,
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
        /** @var string $data['team_id'] */
            if (isset($data['team_id'])) $this->team_id = $data['team_id'];
        /** @var bool $data['home'] */
            if (isset($data['home'])) $this->home = $data['home'];
        /** @var bool $data['readonly'] */
            if (isset($data['readonly'])) $this->readonly = $data['readonly'];
        /** @var string $data['name'] */
            if (isset($data['name'])) $this->name = $data['name'];
        /** @var string $data['display_name'] */
            if (isset($data['display_name'])) $this->display_name = $data['display_name'];
        /** @var string $data['purpose'] */
            if (isset($data['purpose'])) $this->purpose = $data['purpose'];
        /** @var string $data['header'] */
            if (isset($data['header'])) $this->header = $data['header'];
        /** @var string $data['creator_id'] */
            if (isset($data['creator_id'])) $this->creator_id = $data['creator_id'];
        /** @var int $data['create_at'] */
            if (isset($data['create_at'])) $this->create_at = $data['create_at'];
        /** @var int $data['update_at'] */
            if (isset($data['update_at'])) $this->update_at = $data['update_at'];
        /** @var string $data['remote_id'] */
            if (isset($data['remote_id'])) $this->remote_id = $data['remote_id'];
        return $this;
    }
}
