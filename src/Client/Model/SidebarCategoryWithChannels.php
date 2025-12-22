<?php

namespace CedricZiel\MattermostPhp\Client\Model;

/**
 * User's sidebar category with it's channels
 */
class SidebarCategoryWithChannels
{
    public function __construct(
        public ?string $id = null,
        public ?string $user_id = null,
        public ?string $team_id = null,
        public ?string $display_name = null,
        public ?string $type = null,
        public ?array $channel_ids = null,
    ) {
    }

    /**
     * Hydrate a new instance from an array of data.
     *
     * @param array<string, mixed>|null $data The data to hydrate from
     * @return SidebarCategoryWithChannels The hydrated instance
     */
    public static function hydrate(?array $data): SidebarCategoryWithChannels
    {
        $data ??= [];

        return new self(
            id: $data['id'] ?? null,
            user_id: $data['user_id'] ?? null,
            team_id: $data['team_id'] ?? null,
            display_name: $data['display_name'] ?? null,
            type: $data['type'] ?? null,
            channel_ids: $data['channel_ids'] ?? null,
        );
    }
}
