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

    public static function hydrate(
        /** @param array<string, mixed> $data */
        ?array $data,
    ): static
    {
        $object = new static(
            id: $data['id'] ?? null,
            team_id: $data['team_id'] ?? null,
            home: $data['home'] ?? null,
            readonly: $data['readonly'] ?? null,
            name: $data['name'] ?? null,
            display_name: $data['display_name'] ?? null,
            purpose: $data['purpose'] ?? null,
            header: $data['header'] ?? null,
            creator_id: $data['creator_id'] ?? null,
            create_at: $data['create_at'] ?? null,
            update_at: $data['update_at'] ?? null,
            remote_id: $data['remote_id'] ?? null,
        );
        return $object;
    }
}
